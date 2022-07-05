<?php
  namespace App\Controllers\Report;
  use App\Controllers\BaseController;

  use App\Models\MailModal;

  class Mail extends BaseController {
    public function __construct() {
      $this->model = new MailModal();
    }

    public function index() {
      echo 1;
    }

    /**
     * 리포트 자동 발송 메일 등록
     */
    public function insertMail() {
      if($this->request->isAJAX()) {
        $overlapCycle = $this->model->checkEmail(json_decode($this->request->getPost('param')));
        if($overlapCycle != '') {
          $resultData = array('status'=> 'overlap', 'msg'=> sprintf('%s으로 중복 등록된 자동 발송 설정이 있습니다.', $overlapCycle == 1 ? '일간' : ($overlapCycle == 2 ? '주간' : '월간')));
        } else {
          $returnData = $this->model->insertMail(json_decode($this->request->getPost('param')));
          if($returnData == 1) {
            $resultData = array('status'=> 'success', 'msg'=> null);
          } else {
            $resultData = array('status'=> 'failed', 'msg'=> null);
          }
        }
        return $this->response->setJSON($resultData);
      } else {
        die('누구냐 너!?');
      }
    }

    public function updateMail() {
      if($this->request->isAJAX()) {
        $resultData = $this->model->updateMail($this->request->getPost('idx'), json_decode($this->request->getPost('param')));
        if($resultData == 'success') {
          return $this->response->setJSON(array('status'=> 'success', 'msg'=> null));
        }
      } else {
        die('누구냐 너!?');
      }
    }


    /**
     * 등록된 메일 리스트 조회
     */
    public function getMailList() {
      if($this->request->isAJAX()) {
        if($this->request->getGet('idx') == '') {
          if((!empty($this->request->getGet('cycle')) && $this->request->getGet('cycle') != '1,2,3') || !empty($this->request->getGet('name'))) {
            return $this->response->setJSON($this->model->selectMailList($this->request->getGet('cycle'), $this->request->getGet('name')));
          } else {
            return $this->response->setJSON($this->model->selectMailAll(null));
          }
        } else {
          // 수정 버튼 클릭시 메일 정보 가져오기 
          return $this->response->setJSON($this->model->getMail($this->request->getGet('idx')));
        }
      } else {
        die('누구냐 너!?');
      }
    }

    /**
     * 리포트 수신 사용 설정 업데이트
     */
    public function updateStatus() {
      if($this->request->isAJAX()) {
        $resultData = $this->model->updateStatus($this->request->getPost('idx'), $this->request->getPost('status'));
        if($resultData == 1) {
          return $this->response->setJSON(array('status'=> 'success', 'msg'=> null));
        } else {
          return $this->response->setJSON(array('status'=> 'failed', 'msg'=> '리포트 자동 발송 상태변경이 실패 했습니다.<br/>관리자에게 문의하세요.'));
        }
      } else {
        die('누구냐 너!?');
      }
    }

    /**
     * 등록 메일 삭제 하기
     */
    public function deleteMail() {
      if($this->request->isAJAX()) {
        $resultData = $this->model->deleteMail($this->request->getPost('idx'));
        if($resultData == 1) {
          return $this->response->setJSON(array('status'=> 'success', 'msg'=> null));
        } else {
          return $this->response->setJSON(array('status'=> 'failed', 'msg'=> '메일이 삭제되지 않았습니다.<br/>관리자에게 문의하세요.'));
        }
      } else {
        die('누구냐 너!?');
      }
    }

    /**
     * 메일 등록 현황 가져오기
     */
    public function getStatus() {
      if($this->request->isAJAX()) {
        return $this->response->setJSON($this->model->getStatus('1,2,3', $this->request->getGet('name')));
      } else {
        die('누구냐 너!?');
      }
    }
  }
?>
