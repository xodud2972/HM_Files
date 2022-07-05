<?php

  namespace App\Controllers\Util;

  use App\Controllers\BaseController;
  use App\Models\UtilModal;

  ini_set('display_errors', '1');

  class Custmoer extends BaseController {
    public function __construct() {
      $this->model = new UtilModal();
    }

    public function getMail() {
      if($this->request->isAJAX()) {
        $csSeq = $this->request->getGet('csSeq');
        return $this->response->setJSON($this->model->getCustmoereEmail($csSeq));
      } else {
        die('누구냐 너!?');
      }
    }

    public function updateMail() {
      if($this->request->isAJAX()) {
        $csSeq = $this->request->getPost('csSeq');
        $mail = $this->request->getPost('mail');

        if($this->model->updateCustmoerEmail($csSeq, $mail) === 'success') {
          echo 1;
        } else {
          echo -1;
        }
      } else {
        die('누구냐 너!?');
      }
    }    
  }
?>