<?php
  namespace App\Models;

  use CodeIgniter\Model;

  class ShipmentModal extends Model {
    public function __construct() {
      parent::__construct();

      $this->dbLocal = \Config\Database::connect('default', true);
      $this->dbRms = \Config\Database::connect('rms', true);
      $this->dbDev = \Config\Database::connect('dev', true);
      $this->dbMaster = \Config\Database::connect('master', true);
      $this->session = session();
    }

    /**
     * 광고주 발송현황 가져오기
     */
    public function getCustmoreStatus() {
      $query = sprintf('
      SELECT 
        COUNT(DISTINCT if(status.create_type IS NOT NULL, cus.cs_seq, NULL)) AS cnt_send_cus,
        COUNT(if(status.create_type IS NOT NULL, cus.matching_id, NULL)) AS cnt_send_id,
        COUNT(DISTINCT if(status.create_type IS NULL, cus.cs_seq, NULL)) AS cnt_not_sned_cus,
        COUNT(if(status.create_type IS NULL, cus.cs_seq, NULL)) AS cnt_not_send_id
      FROM (
        SELECT cs_seq, cs_nm, media_code, matching_id
        FROM t_report_month
        WHERE pay_date >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), \'%%Y-%%m\') AND
            pay_date <= DATE_FORMAT(CURDATE(), \'%%Y-%%m\') AND
              cost > 0 AND
              em_seq = 26 AND
              media_code != 81
        GROUP BY media_code, matching_id
      ) AS cus
      LEFT JOIN (
        SELECT 
          cs_seq, matching_id, create_type
        FROM (
          SELECT cs_seq, matching_id, create_type 
          FROM t_report_sent_mailing_list 
          WHERE del_date IS NULL AND
                reg_emp = %d
          GROUP BY cs_seq, media_code, matching_id 
        ) AS temp_status
      ) AS status
      ON cus.cs_seq = status.cs_seq
      ', 1161);
      return $this->dbLocal->query($query)->getResultObject();
    }

    /**
     * 광고주 발송현황 리스트 가져오기
     */
    public function getCustmoreStatusList() {

    }
  }
?>