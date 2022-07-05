<?php
  $session = session();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=1920, height=1080">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HM AMS</title>
    <link href="../css/styles.css" rel="stylesheet" />
 

    
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />

    <link defer rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>

    
    <!-- Load DataTable Lib -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    
    <!-- 날짜 관련 라이브러리 -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <!-- 달력 라이브러리 -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>s


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SP6TWDPZ5S"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-SP6TWDPZ5S');
    </script>

    <style>
      label {
        font-size: 14px;
      }

      .col-auto{
        padding: 0; 
        margin-right: 0.5rem !important
      }

      .custom-selectbox{
        display: block;
        width: 100%;
        height: calc(1.5em + 1rem + 2px);
        padding: 0.5rem 1rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #687281;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      }

      .pagination {
        font-size:  14px;
      }
    </style>

  </head>
  <body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">

      <!-- Logo margin-top:0px; margin-left:40px; margin-right:-41px;-->
      <div class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.html" style='margin: 0px -41px 0px 40px'>
        <img src="../../images/logo_hm.png" style="width: 100px"/>
      </div>

      <!-- SideMenu On/Off 버튼 -->
      <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>

      <ul class="navbar-nav align-items-center ms-auto">
        <!-- 잔액조회 아이콘 -->
        <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
          <a class="btn btn-icon btn-transparent-dark" role="button" onClick="openBizMoney(this)">
            <i class="fas fa-search-dollar"></i>
          </a>
        </li>

        <!-- 작업히스토리 알럿 아이콘 -->
        <li class="nav-item dropdown no-caret mr-3 dropdown-notifications" style="margin-right:16px;">
          <a class="btn btn-icon btn-transparent-dark dropdown-toggle" role="button" href="javascript:void(0);">
            <i data-feather="bell"></i>
          </a>
          <button class="btn btn-red btn-icon btn-alert-cnt-total text-xs" type="button" style="margin-bottom: 15px; margin-left:-15px">
            <div>10+</div>
          </button>                
        </li>
        
        <!-- 사용자 이름 및 로그아웃 -->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
          <a class="dropdown-toggle" id="navbarDropdownUserImage"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
              <?= $session->em_nm; ?>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
            <h6 class="dropdown-header d-flex align-items-center">
              <div class="dropdown-user-details">
                <div class="dropdown-user-details-name"><?= $session->em_nm; ?></div>
                <div class="dropdown-user-details-email"><?= sprintf('%s %s', $session->division_name, $session->team_name); ?></div>
              </div>
            </h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)" onClick="logout()">
              <div class="dropdown-item-icon">
                <i data-feather="log-out"></i>
              </div>
              Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>