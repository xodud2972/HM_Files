<?php
  namespace App\Models;

  use CodeIgniter\Model;

  class MailModal extends Model {
    private $dbLocal = null;
    private $session = null;

    public function __construct() {
      parent::__construct();

      $this->dbLocal = \Config\Database::connect('default', true);
      $this->dbRms = \Config\Database::connect('rms', true);
      $this->session = session();
    }

    /**
     * 리포트 자동 발송 메일 등록
     * @param param 등록 메일 배열
     * @return int
     */
    public function insertMail(array $param) {
      $maxId = $this->dbLocal->query('SELECT MAX(idx) AS max_row FROM t_report_sent_mailing_list')->getRow()->max_row;

      $query = 'INSERT INTO t_report_sent_mailing_list(cs_seq, cs_nm, idx, media_code, matching_id, email, cycle, receive_type, reg_date, reg_time, reg_emp) VALUES';
      $COUNT = count($param);
      foreach ($param as $index => $item) {
        $query .= sprintf(
          '(%d, \'%s\', %d, %d, \'%s\', \'%s\', %d, \'%s\', CURDATE(), CURTIME(), %d)%s', 
          $item->cs_seq, $item->cs_nm, ($maxId+1), $item->media_code, $item->matching_id, $item->email, $item->cycle, $item->receive_type, 1161, ($index < ($COUNT-1) ? ',': '')
        );
      }

      $resultData = $this->dbLocal->simpleQuery($query);
      if($resultData) {
        return 1;
      } else {
        return -1;
      }
    }

    public function selectMailAll($emSeq) {
      if($emSeq == null) {
        $emSeq = 1161;
      }

      $query = sprintf('
        SELECT 
          mail.idx, mail.cs_seq, mail.cs_nm, GROUP_CONCAT(DISTINCT mail.media_code) AS media_code, GROUP_CONCAT(DISTINCT common.product_kr_name) AS media_name, 
          GROUP_CONCAT(DISTINCT mail.cycle) AS cycle , mail.email, mail.status, mail.reg_date, mail.upd_date 
        FROM (
          SELECT idx, sub_mail.cs_seq, mapping.cs_nm, sub_mail.media_code, sub_mail.cycle, sub_mail.email, sub_mail.status, sub_mail.reg_date, sub_mail.upd_date FROM ( 
            SELECT 
              idx, cs_seq, media_code, matching_id, (case when CYCLE = 1 then \'일간\' when CYCLE = 2 then \'주간\' ELSE \'월간\' END) AS cycle, email, 
              (case when STATUS = 1 then \'ON\' ELSE \'OFF\' END) AS status, reg_date, upd_date 
            FROM t_report_sent_mailing_list 
            WHERE del_date IS NULL AND
                  reg_emp = %d AND
                  create_type = 1
          ) AS sub_mail
          INNER JOIN t_media_mapping_latest AS mapping
          ON sub_mail.media_code = mapping.media_code AND sub_mail.matching_id = mapping.cs_m_id
        ) AS mail
        INNER JOIN (
          SELECT increment_id, product_kr_name
          FROM t_media_common
          WHERE parent_id = 1
        ) common
        ON mail.media_code = common.increment_id
        GROUP BY mail.idx
        ORDER BY mail.reg_date desc
      ', $emSeq);

      return $this->dbLocal->query($query)->getResultObject();
    }

    /**
     * 주기, 광고주명으로 메일 리스트 가져오기
     * @param cycle 리포트 발송 주기
     * @param name 광고주명
     * @return Array
     */
    public function selectMailList(string $cycle, string $name) {
      $querySelectCsSeq = sprintf('SELECT cs_seq FROM t_customer WHERE cs_nm LIKE \'%%%s%%\' AND del_date IS NULL', $name);

      $exceSelectCsSeq = $this->dbRms->query($querySelectCsSeq)->getResultObject();

      $csSeq = null;
      foreach ($exceSelectCsSeq as $index => $item) {
        $csSeq .= ($item->cs_seq.($index < count($exceSelectCsSeq)-1 ? ',' : ''));
      }
      
      $mailIdx = $this->dbLocal->query(sprintf('
        SELECT GROUP_CONCAT(DISTINCT idx) AS idx FROM t_report_sent_mailing_list WHERE cycle in(%s) AND '.(empty($name) ? '' : 'cs_seq in ('.$csSeq.') AND').' del_date IS NULL
      ', (empty($cycle) ? '1,2,3' : $cycle), $name))->getRow()->idx;

      $querySelectMail = sprintf('
        SELECT 
          mail.idx, mail.cs_seq, mail.cs_nm, GROUP_CONCAT(DISTINCT mail.media_code) AS media_code, GROUP_CONCAT(DISTINCT common.product_kr_name) AS media_name, 
          GROUP_CONCAT(DISTINCT mail.cycle) AS cycle , mail.email, mail.status, mail.reg_date, mail.upd_date
        FROM (
          SELECT idx, sub_mail.cs_seq, mapping.cs_nm, sub_mail.media_code, sub_mail.cycle, sub_mail.email, sub_mail.status, sub_mail.reg_date, sub_mail.upd_date FROM (
            SELECT
              idx, cs_seq, media_code, matching_id, (case when CYCLE = 1 then \'일간\' when CYCLE = 2 then \'주간\' ELSE \'월간\' END) AS cycle, email,
              (case when STATUS = 1 then \'ON\' ELSE \'OFF\' END) AS status, reg_date, upd_date 
            FROM t_report_sent_mailing_list 
            WHERE idx in(%s) AND
                  reg_emp = %d AND
                  del_date IS NULL AND
                  create_type = 1
          ) AS sub_mail
          INNER JOIN t_media_mapping_latest AS mapping
          ON sub_mail.media_code = mapping.media_code AND sub_mail.matching_id = mapping.cs_m_id
        ) AS mail
        INNER JOIN (
          SELECT increment_id, product_kr_name
          FROM t_media_common
          WHERE parent_id = 1
        ) common
        ON mail.media_code = common.increment_id
        GROUP BY mail.idx
        ORDER BY mail.reg_date desc
      ', $mailIdx, 1161);

      $resultData = $this->dbLocal->query($querySelectMail)->getResultObject();
      return $resultData;
    }

    /**
     * idx에 해당하는 메일 주소 가져오기
     * @param idx 등록 이메일 고유번호
     */
    public function getMail(int $idx) {
      $query = sprintf('
        SELECT 
          mail.idx, mail.cs_seq, mail.cs_nm, mail.media_code, mail.matching_id, common.product_kr_name as media_name, 
          mail.cycle, mail.receive_type, mail.email, mail.status, mail.reg_date, mail.upd_date
        FROM (
          SELECT idx, sub_mail.cs_seq, mapping.cs_nm, sub_mail.media_code, sub_mail.matching_id, sub_mail.cycle, sub_mail.receive_type, sub_mail.email, sub_mail.status, sub_mail.reg_date, sub_mail.upd_date FROM (
            SELECT
              idx, cs_seq, media_code, matching_id, (case when CYCLE = 1 then \'일간\' when CYCLE = 2 then \'주간\' ELSE \'월간\' END) AS cycle, receive_type, email,
              (case when STATUS = 1 then \'ON\' ELSE \'OFF\' END) AS status, reg_date, upd_date 
            FROM t_report_sent_mailing_list 
            WHERE idx = %d AND
                  del_date IS NULL AND
                  create_type = 1
          ) AS sub_mail
          INNER JOIN t_media_mapping_latest AS mapping
          ON sub_mail.media_code = mapping.media_code AND sub_mail.matching_id = mapping.cs_m_id
        ) AS mail
        INNER JOIN (
          SELECT increment_id, product_kr_name
          FROM t_media_common
          WHERE parent_id = 1
        ) common
        ON mail.media_code = common.increment_id
      ', $idx);
      return $this->dbLocal->query($query)->getResultObject();
    }

    /**
     * 리포트 발신 메일 상태 업데이트
     * @param idx 등록된 메일의 고유 번호
     * @param status 변경할려는 상태 코드(1:on, 2:off)
     */
    public function updateStatus(string $idx, int $status) {
      $resultData = $this->dbLocal->simpleQuery(sprintf('
        UPDATE t_report_sent_mailing_list
        SET status = %d
        WHERE idx in(%s) 
      ', $status, $idx));

      if($resultData) {
        return 1;
      } else {
        return -1;
      }
    }

    /**
     * 등록 메일 수정 하기
     * @param idx 수정할 메일 고유번호
     * @param param 수정할 메일 정보 배열
     * @return int
     */
    public function updateMail(int $idx, array $param) {
      // 기존에 등록된 메일 리스트 가져오기
      $arrMailList = $this->dbLocal->query(sprintf('
        SELECT * 
        FROM t_report_sent_mailing_list 
        WHERE del_date IS NULL AND
              idx = %d
      ', $idx))->getResultObject();

      $arrUpdateMail = array();
      $arrInsertMail = array();
      $arrDeleteMail = array();

      $csName = $param[0]->cs_nm;

      foreach ($param as $index => $item) {
        foreach ($arrMailList as $mail) {          
          if(($mail->cs_seq == $item->cs_seq) && ($mail->media_code == $item->media_code) && ($mail->matching_id == $item->matching_id) && 
          ($mail->email == $item->email) && ($mail->receive_type == $item->receive_type) && ($mail->cycle == $item->cycle)) {
            array_push($arrUpdateMail, $mail);
            unset($param[$index]);                            // 신규 등록 메일 리스트(전달 받은 메일 리스트중에서 기존에 등록된 메일 제거하고 남은 메일은 신규등록건임)
            array_push($arrDeleteMail, $mail->increment_id);  // 저장된 번호를 제외하고 모두 삭제
          }
        }
      }

      $arrInsertMail = array_values($param);
      // 메일 삭제 진행
      if(!empty($arrDeleteMail)) {
        $this->dbLocal->simpleQuery(sprintf('
          UPDATE t_report_sent_mailing_list
          SET del_date = CURDATE(),
              del_time = CURTIME(),
              del_emp = %d
          WHERE idx = %d AND
                increment_id NOT IN(%s)
        ', 1161, $idx, implode( ',', $arrDeleteMail)));
      }
      
      // 메일 업데이트 진행
      if(!empty($arrUpdateMail)) {
        print_r($param[0]);
        foreach ($arrUpdateMail as $item) {
          $this->dbLocal->simpleQuery(sprintf('
            UPDATE t_report_sent_mailing_list
            SET cs_seq = %d,
                cs_nm = \'%s\',
                media_code = %d,
                matching_id = \'%s\',
                email = \'%s\',
                cycle = %d,
                receive_type = \'%s\',
                upd_date = CURDATE(),
                upd_time = CURTIME(),
                upd_emp = %d
            WHERE increment_id = %d
          ', $item->cs_seq, $csName, $item->media_code, $item->matching_id, $item->email, $item->cycle, $item->receive_type, 1161, $item->increment_id));
        }
      }

      // 신규 메일 등록
      if(!empty($arrInsertMail)) {
        $mailStatus = $this->dbLocal->query(sprintf('SELECT status FROM t_report_sent_mailing_list where idx = %d LIMIT 1', $idx))->getRow()->status;
        $queryMailInsert = 'INSERT INTO t_report_sent_mailing_list(cs_seq, cs_nm, idx, media_code, matching_id, email, cycle, receive_type, status, reg_date, reg_time, reg_emp) VALUES';
        $COUNT = count($arrInsertMail);
        foreach ($arrInsertMail as $index => $item) {
          $queryMailInsert .= sprintf(
            '(%d, \'%s\', %d, %d, \'%s\', \'%s\', %d, \'%s\', %d, CURDATE(), CURTIME(), %d)%s', 
            $item->cs_seq, $csName, $idx, $item->media_code, $item->matching_id, $item->email, $item->cycle, $item->receive_type, $mailStatus, 1161, ($index < ($COUNT-1) ? ',': '')
          );        
        }

        $this->dbLocal->simpleQuery($queryMailInsert);
      }
      
      return 'success';
    }

    /**
     * 리포트 발신 메일 삭제
     * @param idx 삭제할 메일 고유 번호
     */
    public function deleteMail(string $idx) {
      $resultData = $this->dbLocal->simpleQuery(sprintf('
        UPDATE t_report_sent_mailing_list
        SET del_date = CURDATE(),
            del_time = CURTIME(),
            del_emp = %d
        WHERE idx in(%s)
      ', 1161, $idx));

      if($resultData) {
        return 1;
      } else {
        return -1;
      }
    }

    /**
     * 중복 이메일 체크
     * @param param: 등록 메일 리스트 데이터
     * @return string
     */
    public function checkEmail(array $param) {
      $overlapCycle = null;
      foreach ($param as $item) {
        $query = sprintf('
          SELECT count(*) as cnt
          FROM t_report_sent_mailing_list
          WHERE cs_seq = %d AND 
                media_code = %d AND 
                matching_id = \'%s\' AND 
                t_report_sent_mailing_list.cycle = %d', $item->cs_seq, $item->media_code, $item->matching_id, $item->cycle
        );
        
        $cntEmail = $this->dbLocal->query($query)->getRow()->cnt;
        if($cntEmail > 0) {
          $overlapCycle = $item->cycle;
          break;
        }
      }
      return $overlapCycle;
    }

    /**
     * 메일 등록 현황 가져오기
     */
    public function getStatus(string $cycle = null, string $name = null) {
      $querySelectCsSeq = sprintf('SELECT cs_seq FROM t_customer WHERE cs_nm LIKE \'%%%s%%\' AND del_date IS NULL', $name);

      $exceSelectCsSeq = $this->dbRms->query($querySelectCsSeq)->getResultObject();


      $csSeq = null;
      foreach ($exceSelectCsSeq as $index => $item) {
        $csSeq .= ($item->cs_seq.($index < count($exceSelectCsSeq)-1 ? ',' : ''));
      }

      $mailIdx = $this->dbLocal->query(sprintf('
        SELECT GROUP_CONCAT(DISTINCT idx) AS idx FROM t_report_sent_mailing_list WHERE cycle in(%s) AND '.(empty($name) ? '' : 'cs_seq in ('.$csSeq.') AND').' del_date IS NULL
      ', (empty($cycle) ? '1,2,3' : $cycle), $name))->getRow()->idx;


      $query = sprintf('
        SELECT 
          COUNT(DISTINCT cs_seq) AS cnt_cus, 
          COUNT(matching_id) AS cnt_account, 
          COUNT(DISTINCT case when STATUS = 1 then cs_seq END) AS cnt_on_cus,
          count(case when STATUS = 1 then matching_id END)  as cnt_on_account
        FROM (
          SELECT cs_seq, matching_id, STATUS 
          FROM t_report_sent_mailing_list 
          WHERE del_date IS NULL AND
                idx in(%s) AND
                reg_emp = %d AND
                create_type = 1
          GROUP BY cs_seq, media_code, matching_id 
        ) AS status;
      ', (empty($mailIdx) ? 0 : $mailIdx), 1161);
      return $this->dbLocal->query($query)->getRow();
    }
  }

?>