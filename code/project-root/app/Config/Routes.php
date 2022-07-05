<?php
// URL Routing은 사용자가 접근 한 URI에 따라서 Controller의 메소드를 호출 해준다.
// 해당파일은 URL Routing 을 하기 위한 규칙을 지정하는 파일이다.

namespace Config; // 각파일마다 클래스명이 동일한 것이 있을 때, 설정한 namespace로 동일한 이름을 가진 클래스들을 구분할 수 있다.
                  // amespace 키워드가 모든 php 구문보다 제일 먼저 와야 하고 그게 아니라면 컴파일 에러가 난다.

// namespace 예시 ) libfoo.php 에 Class DB 와 libbar.php에 class DB를 동시에 include하여
                  // $db = new DB()를 해버리면 어느 파일의 DB라는 클래스를 불러와야하는지 모르기때문에
                  // namespace foo; 혹은 namespace bar; 라고 지정을 해놓는다면
                  // $db = new foo\DB() 로 libfoo.php 파일의 DB라는 클래스를 가져올 수 있다.
                
                  

// Create a new instance of our RouteCollection class.
// RouteCollection 클래스의 새 인스턴스를 만듭니다.
$routes = Services::routes(); // Calls the $Services -> routes()

// 시스템의 라우팅 파일을 먼저 로드하여 앱과 환경 ENVIRONMENT
// 필요에 따라 재정의할 수 있습니다.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) { //config 폴더 안에 routies.php 파일이 존재하면
    require SYSTEMPATH . 'Config/Routes.php';        // 해당 파일을 require 한다.
// include()는 include가 호출될 때 지정한 파일을 삽입하여 특정 조건일 때 지정한 파일이 삽입되게 처리할 수 있다.
// 조건을 만족하지 않는다면 파일 삽입 안됨
// 반면에 require()는 무조건 파일을 삽입하기 때문에 특정 조건에 만족하지 않아도 지정한 파일을 삽입한다.
// require()는 조건에 따라 수행하는 것이 아니라 파일을 무조건 삽입해야 할 때 사용한다.
// 조건을 만족하지 않아도 파일 삽입
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * 라우터 설정
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers'); // App/Controller 안에 있는 
$routes->setDefaultController('Home');           // Home.php 라는 컨트롤러에서
$routes->setDefaultMethod('index');              // index 라는 이름의 public function을 가져온다. (라우팅한다)
$routes->setTranslateURIDashes(false);           //컨트롤러 및 메소드 URI 세그먼트에서 대시 (‘-‘)를 밑줄(‘_’)로 자동 대체할 수 있다.
$routes->set404Override();                       // 404 뷰대신 컨트롤러 클래스/메소드 또는 클로저(Closure)로 변경할 수 있습니다. ex) echo view('my_errors/not_found.html')
$routes->setAutoRoute(true);                     // false로 설정하면 자동 일치 기능을 비활성화하여 사용자가 정의한 경로로만 접근하도록 제한할 수 있다.

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * 경로 정의
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// 기본값을 지정하여 성능 향상을 얻습니다.
// 디렉토리를 스캔할 필요가 없기 때문에 라우팅합니다.
$routes->get('/', 'Home::index');
// 이중콜론은 컨트롤러와 메소드를 구분한다 ( 정적메소드를 사용하는 것과 동일한 방식 )
// 타겟레퍼런스 :: 메소드명
// 타겟레퍼런스 라는 클래스에 정의된 메소드명에 대한 메소드를 찾고 실행.

$routes->get('/autoReport', 'Report::index');
$routes->get('/manualReport', 'Report/Manual::index');
$routes->get('/shipmentStatus', 'Report/Status::index');

$routes->group('util', function($routes) {
    $routes->get('custmoer/get/mail', 'Util/Custmoer::getMail');
    $routes->post('custmoer/update/mail', 'Util/Custmoer::updateMail');
});

$routes->group('mail', function($routes) {
    $routes->post('add', 'Report/Mail::insertMail');
    $routes->post('edit', 'Report/Mail::updateMail');
    $routes->get('get', 'Report/Mail::getMailList');
    $routes->post('update/status', 'Report/Mail::updateStatus');
    $routes->post('delete', 'Report/Mail::deleteMail');
    $routes->get('status', 'Report/Mail::getStatus');
});

$routes->group('manual', function($routes) {
    $routes->post('add', 'Report/Manual::add');
    $routes->post('create', 'Report/Manual::create');
    $routes->post('sent', 'Report/Manual::sent');
    $routes->get('receive/update', 'Report/Manual::update');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * 추가 라우팅
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 * 종종 추가 라우팅이 필요하고
 * 이 파일의 모든 기본값을 무시할 수 있어야 합니다. 환경
 * 기반 경로는 그러한 시간 중 하나입니다. 여기에서 추가 경로 파일을 요구하십시오()
 * 그렇게 하기 위해.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 * 해당 파일 내에서 $routes 개체에 액세스할 수 있습니다.
 * 다시 로드해야 합니다.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
