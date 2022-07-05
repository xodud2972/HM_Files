<?php
namespace App\Controllers\Report;
use App\Controllers\BaseController;

use App\Models\ShipmentModal;

ini_set('display_errors', '1');

class Status extends BaseController {
  private $modalShipment = null;
  private $data = [];

  public function __construct() {
    $this->modalShipment = new ShipmentModal();
  }

  public function index() {
    $session = session();

    // 광고주 리포트 발송 현황 가져오긴
    $this->data['status_cus'] = $this->modalShipment->getCustmoreStatus()[0];

    echo view('/include/view_header.php');
    echo view('/include/view_side_menu.php');
    echo view('view_shipment_status', $this->data);
    echo view('/include/view_footer.php');
  }
}