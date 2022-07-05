<?php

  namespace App\Models;

  use CodeIgniter\Model;

  class UtilModal extends Model {
    private $dbLocal = null;
    private $dbRms = null;
    private $dbDev = null;
    private $dbMaster = null;

    public function __construct() {
      parent::__construct();

      $this->dbLocal = \Config\Database::connect('default', true);
      $this->dbRms = \Config\Database::connect('rms', true);
      $this->dbDev = \Config\Database::connect('dev', true);
      $this->dbMaster = \Config\Database::connect('master', true);
    }

    /**
     * 마케터에게 매핑된 광고주 정보 가져오기
     * @param emSeq 사원 고유 코드번호
     * @return Array
     */
    public function getCustmoerList(int $emSeq) {
      $queryMapping = $this->dbMaster->query(sprintf('
        SELECT cs_seq, cs_nm, media_code, matching_id
        FROM t_report_month
        WHERE pay_date >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), \'%%Y-%%m\') AND
              pay_date <= DATE_FORMAT(CURDATE(), \'%%Y-%%m\') AND
              cost > 0 AND
              em_seq = %d AND
              media_code != 81
        GROUP BY media_code, matching_id
        ORDER BY media_code*1 ASC, matching_id asc
      ', $emSeq));
      $mappingData = $queryMapping->getResultArray();

      $resultData = array();

      $arrCustmoer = array();


      foreach ($mappingData as $index => $item) {
        if(!in_array($item['cs_seq'], array_column($arrCustmoer, 'cs_seq'))) {
          $arrCustmoer[$index] = $mappingData[$index];
        }
        $resultData['account'][$item['cs_seq']][$item['media_code']] .= (','.$item['matching_id']);
      }

      $resultData['cus'] = $arrCustmoer;
      
      return $resultData;
    }

    public function getMediaList() {
      $resultData = $this->dbLocal->query('SELECT increment_id as media_code, product_kr_name FROM t_media_common WHERE parent_id = 1 and increment_id != 81 ')->getResultObject();
      return $resultData;
    }

    /**
     * 광고주 이메일주소 가져오기
     * @param csSeq 광고주 고유 코드 번호
     * @return Dict
     */
    public function getCustmoereEmail(int $csSeq) {
      $resultData = $this->dbLocal->query(sprintf('SELECT mg_email as email FROM t_customer WHERE cs_seq = %d', $csSeq))->getRow();
      return $resultData;      
    }

    public function updateCustmoerEmail(int $csSeq, string $email) {
      $resultData = $this->dbLocal->simpleQuery(sprintf('UPDATE t_customer SET mg_email = \'%s\' WHERE cs_seq = %d', $email, $csSeq));
      if($resultData) {
        return 'success';
      } else {
        return 'failed';
      }
    }
  }
?>