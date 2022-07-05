<?php
  namespace App\Models;

  use CodeIgniter\Model;

  class ManualModal extends Model {
    private $dbLocal = null;
    private $session = null;

    public function __construct() {
      parent::__construct();

      $this->dbLocal = \Config\Database::connect('default', true);
      $this->session = session();
    }

    /**
     * 수동 생성 요청 리스트 가져오기
     * @param emSeq 직원 코드 번호
     * @return array
     */
    public function getManualList(int $emSeq) {
      $query = sprintf('
        SELECT 
          mail.idx, mail.cs_seq, mail.cs_nm, GROUP_CONCAT(DISTINCT mail.media_code) AS media_code, GROUP_CONCAT(DISTINCT mail.matching_id SEPARATOR \'|\') AS matching_id, GROUP_CONCAT(DISTINCT common.product_kr_name) AS media_name,
          GROUP_CONCAT(DISTINCT mail.cycle) AS cycle, mail.file_name, mail.start_date, mail.end_date, mail.status, mail.reg_date
        FROM (
          SELECT idx, sub_mail.cs_seq, mapping.cs_nm, sub_mail.media_code, CONCAT(sub_mail.media_code, \',\', sub_mail.matching_id) AS matching_id, sub_mail.cycle, file.file_name, sub_mail.start_date, sub_mail.end_date, file.status, sub_mail.reg_date 
          FROM (
            SELECT
              idx, cs_seq, media_code, matching_id, (case when CYCLE = 1 then \'일간\' when CYCLE = 2 then \'주간\' ELSE \'월간\' END) AS CYCLE, start_date, end_date, reg_date
            FROM t_report_sent_mailing_list
            WHERE del_date IS NULL AND
                reg_emp = %d AND
                create_type = 2     
          ) AS sub_mail
          INNER JOIN t_media_mapping_latest AS mapping
          ON sub_mail.media_code = mapping.media_code AND sub_mail.matching_id = mapping.cs_m_id
          LEFT JOIN (
            SELECT list_id, file_name, status FROM t_report_sent_mailing_file
          ) AS file
          ON sub_mail.idx = file.list_id
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
     * 리포트 자동 발송 메일 등록
     * @param param 등록 메일 배열
     * @return int(수동 다운로드 등록 고유 ID)
     */
    public function insertManual(array $param) {
      $maxId = $this->getListMaxId()+1;
      $queryInsertManual = 'INSERT INTO t_report_sent_mailing_list(idx, cs_seq, cs_nm, media_code, matching_id, cycle,  start_date, end_date, create_type, reg_date, reg_time, reg_emp) VALUES';
      $COUNT = count($param);
      foreach ($param as $index => $item) {
        $queryInsertManual .= sprintf(
          '(%d, %d, \'%s\', %d, \'%s\', %d, \'%s\', \'%s\', 2, CURDATE(), CURTIME(), %d)%s', 
          ($maxId), $item->cs_seq, $item->cs_nm, $item->media_code, $item->matching_id, $item->cycle, $item->startDate, $item->endDate, 1161, ($index < ($COUNT-1) ? ',': '')
        );
      }

      $resultData = $this->dbLocal->simpleQuery($queryInsertManual);
      if($resultData) {
        return $this->getListMaxId();
      } else {
        return -1;
      }
    }

    /**
     * 수동 리포트 생성 요청건 파일 생성하기
     * @param id: 리포트 요청 고유 ID 
     * @return string
     */
    public function createReport(int $id) {
      // local, dev, live
      $serverName = 'local';

      if($serverName === 'local') {
        $url = 'http://localhost:8083/media-specific-data/generalreport/createReport.php?id='.$id;
      } else if($serverName === 'dev') {
        $url = 'http://220.230.117.171/test_bizmoney.php?id='.$id;
      } else if($serverName === 'live') {
        $url = 'http://183.111.205.149/bizmoney/start_python.php?id='.$id;
      }

      $ch = curl_init();                                 //curl 초기화
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3600);      //connection timeout 10초 
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
      $response = curl_exec($ch);
      curl_close($ch);
      print_r($response);
    }

    /**
     * 리포트 메일 발송 하기
     * @param file: 첨부파일
     * @param param: 리포트 발송 대상 정보
     */
    public function sentReport($file, array $param) {
      $isAddMaliList = true; # 수동 발송시 
      $savedPath = $file->store();
      $clientFileName = $file->getClientName();
      $basePath = $_SERVER['DOCUMENT_ROOT'].'/ci_ams/writable/uploads/';

      $url = 'https://apis.worksmobile.com/r/kr1PJfhaEwIzv/mail/v2/sendMail';
      $header = array(
        'Content-Type:multipart/form-data',
        'consumerKey:bjBKrU5hSMwL8jyb78rV',
        'Authorization:Bearer AAAAx6HBAJ0aum0qXDkmM+AdCU0eToUtKhE76fE64pchCg1G9kvQdjBYokrvtFK60yyP26KBjLI/0mksMUNXwMTvnx3lPPZcVwv5x5j6uH4xzS2rRx2bzUDgKYjW7+58fmhxwWGOOs4lMKqoJyIw0o5J4TkDVkwr49j+/tlA63kxGpjAPJ7Fsp0U6aSLgGLC08HgRgkm4C2s6jdPJkimnyWjM8BAbeLJoH/mKRalRRrU1WtUYCMkZXmy1ZDXTKJapx8KwaHjSAefRISTyWJOU2KKl+A='
      );

      $to = '';
      $cc = '';
      $bcc = '';


      $maxId = $this->dbLocal->query('SELECT MAX(idx) AS max_row FROM t_report_sent_mailing_list')->getRow()->max_row;
      $queryInsertMailList = 'INSERT INTO t_report_sent_mailing_list(cs_seq, cs_nm, idx, media_code, matching_id, email, receive_type, create_type, reg_date, reg_time, reg_emp) VALUES';
      $COUNT = count($param);

      foreach ($param as $index => $item) {
        if($item->idx == 0) {
          $isAddMaliList = false;
        }
        if($item->receive_type === 'to') {
          $to .= ($item->email.';');
        }
        if($item->receive_type === 'cc') {
          $cc .= ($item->email.';');
        }
        if($item->receive_type === 'bcc') {
          $bcc .= ($item->email.';');
        }
        $queryInsertMailList .= sprintf(
          '(%d, \'%s\', %d, %d, \'%s\', \'%s\', \'%s\', 3, CURDATE(), CURTIME(), %d)%s', 
          $item->cs_seq, $item->cs_nm, ($maxId+1), $item->media_code, $item->matching_id, $item->email, $item->receive_type, 1161, ($index < ($COUNT-1) ? ',': '')
        );
      }
      
      // mailing_list 테이블에 등록된 데이터가 아니면 등록하기
      if(!$isAddMaliList) {
        $this->dbLocal->simpleQuery($queryInsertMailList);
      }

      $historyMaxId = $this->getHistoryMaxId();
      
      $data = array(
        'contentType' => 'html',
        'userName' => '트리플하이엠',
        'to' => $to,
        'cc' => $cc,
        'bcc' => $bcc,
        'subject' => '첨부파일 테스트 입니다.',
        'text' => sprintf('<font style=\'font-size:100px\'>안녕하세요</font><br>첨부파일 테스트 입니다.<br>감사합니다.!
                  <img src="http://localhost:8081/ci_ams/public/manual/receive/update?id=%d" style="visibility:hidden;">', $historyMaxId+1),
        urlencode($clientFileName) => curl_file_create($basePath.$savedPath)
      );
      
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3600);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      $response = curl_exec($ch);
      curl_close($ch);
      $result = json_decode($response);

      # 다중 매체시 중복 제거
      $reportFileName = array();
      if(count($result->successList) > 0) {
        $queryInsertHistory = 'INSERT INTO t_report_sent_mailing_history(list_id, idx, send_date, send_time) VALUES';
        foreach ($param as $index => $item) {
          if(!in_array($item->file, $reportFileName)) {
            array_push($reportFileName, $item->file);
            $queryInsertHistory .= sprintf(
              '(%d, %d, CURDATE(), CURTIME())', ($item->idx > 0 ? $item->idx : ($maxId+1)), $historyMaxId+1
            );
          }
        }
        $this->dbLocal->simpleQuery($queryInsertHistory);

        // 보낸 메일 파일 삭제하기 
        unlink($basePath.$savedPath);
        return array('status'=> 'success', 'msg'=> null);
      } else {
        return array('status'=> 'failed', 'msg'=> '리포트가 발송 실패, 관리자에게 문의 하세요');
      }
    }

    /**
     * 이메일 수신 시간 업데이트
     * @param id: 메일 전송 히스토리 고유 ID
     */
    public function updateReceiveDate(int $id) {
      $resultData = $this->dbLocal->simpleQuery(sprintf('
        UPDATE t_report_sent_mailing_history
        SET receive_date = CURDATE(), receive_time = CURTIME()
        WHERE increment_id = %d
      ', $id));
    }

    /**
     * t_report_sent_mailing_list 최근 idx 가져오기
     * @return int(idx)
     */
    public function getListMaxId() {
      $maxId = $this->dbLocal->query('SELECT MAX(idx) AS max_row FROM t_report_sent_mailing_list')->getRow()->max_row;
      return $maxId;
    }

    /**
     * t_report_sent_mailing_history 최근 idx 가져오기
     * @return int(idx)
     */
    public function getHistoryMaxId() {
      $maxId = $this->dbLocal->query('SELECT MAX(idx) AS max_row FROM t_report_sent_mailing_history')->getRow()->max_row;
      return $maxId;
    }
  }