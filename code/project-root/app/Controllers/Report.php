<?php
namespace App\Controllers;

use App\Models\MailModal;
use App\Models\UtilModal;

ini_set('display_errors', '1');

class Report extends BaseController {

  private $model = null;
  private $modelMail = null;
  private $data = [];

  public function __construct() {
    $this->model = new UtilModal();
    $this->modelMail = new MailModal();
  }

  public function index() {
    $secret_key = "tripleHM"; 
    $param = openssl_decrypt(urldecode($_SERVER['QUERY_STRING']), 'aes-256-cbc', $secret_key, true, str_repeat(chr(0), 16));

    parse_str($param, $results);

    $session = session();

    foreach ($results as $key => $value) {
      $session->set($key, $value);
    }

    $this->data['custmoer'] = $this->model->getCustmoerList(26);
    $this->data['media'] = $this->model->getMediaList();
    $this->data['mail'] = $this->modelMail->selectMailAll(1161);
    $this->data['status'] = $this->modelMail->getStatus();

    echo view('/include/view_header.php');
    echo view('/include/view_side_menu.php');
    echo view('view_report', $this->data);
    echo view('/include/view_footer.php');    
    //return view('view_report');
  }
}
