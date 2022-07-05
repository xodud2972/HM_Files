<?php
namespace App\Controllers\Report;
use App\Controllers\BaseController;

use App\Models\MailModal;
use App\Models\UtilModal;
use App\Models\ManualModal;

ini_set('display_errors', '1');

class Manual extends BaseController {
  private $model = null;
  private $modelMail = null;
  private $modelManual = null;
  private $data = [];

  public function __construct() {
    $this->model = new UtilModal();
    $this->modelMail = new MailModal();
    $this->modelManual = new ManualModal();
  }

  public function index() {
    $session = session();

    $this->data['custmoer'] = $this->model->getCustmoerList(26);
    $this->data['media'] = $this->model->getMediaList();
    $this->data['manual_list'] = $this->modelManual->getManualList(1161);

    echo view('/include/view_header.php');
    echo view('/include/view_side_menu.php');
    echo view('view_manual_report', $this->data);
    echo view('/include/view_footer.php');
  }

  public function add() {
    if($this->request->isAJAX()) {
      $resultData = $this->modelManual->insertManual(json_decode($this->request->getPost('param')));
      if($resultData > 0) {
        return $this->response->setJSON(array('status'=> 'success', 'msg'=> $resultData));
      } else {
        return $this->response->setJSON(array('status'=> 'failed', 'msg'=> '리포트 수동 생성 요청 실패, 관리자에게 문의 하세요'));
      }
    } else {
      die('누구냐 너!?');
    }
  }
  
  public function create() {
    if($this->request->isAJAX()) {
      $this->modelManual->createReport($this->request->getPost('id'));
    } else {
      die('누구냐 너!?');
    }
  }

  public function sent() {
    if($this->request->isAJAX()) {
      $resultData = $this->modelManual->sentReport($this->request->getFile('file'), json_decode($this->request->getPost('info')));
      return $this->response->setJSON($resultData);
    } else {
      die('누구냐 너!?');
    }
  }

  public function update() {
    $this->modelManual->updateReceiveDate($this->request->getGet('id'));
  }
}