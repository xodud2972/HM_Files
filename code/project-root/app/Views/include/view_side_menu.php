    <!-- 사이드 메뉴 -->
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
          <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
              <div class="sidenav-menu-heading">Wise View</div>
              <a class="nav-link" href="/">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                대시보드
              </a>
              
              <!-- Sidenav Accordion (매체(상품)SIDE)-->
              <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseMediaSide" aria-expanded="false" aria-controls="collapseMediaSide">
                <div class="nav-link-icon"><i data-feather="database"></i></div>
                매체(상품)SIDE
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseMediaSide" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                  <a class="nav-link" href="../../mediaSide"> 매체별 현황 </a>
                </nav>
              </div>

              <!-- Sidenav Accordion (Work)-->
              <div class="sidenav-menu-heading">Work</div>
              <!-- Sidenav Accordion (매체(상품)SIDE)-->
              <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseWorkDesk" aria-expanded="false" aria-controls="collapseWorkDesk">
                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                Work Desk
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseWorkDesk" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav marketer" style='display: none;'>
                  <a class="nav-link" href="/taskRegisterToAdvertiser"> 업무관리 등록 </a>
                  <a class="nav-link" href="/taskManageView"> 업무관리 조회 </a>
                </nav>
                <nav class="sidenav-menu-nested nav accordion admin" id="accordionSidenavTaskRegisterMenu" style='display: none;'>
                  <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseTaskRegister" aria-expanded="false" aria-controls="collapseTaskRegister">
                    업무관리 등록
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseTaskRegister" data-bs-parent="#accordionSidenavTaskRegisterMenu">
                    <nav class="sidenav-menu-nested nav">
                      <a class="nav-link" href="/taskRegisterToMarketer"> 마케터 업무관리 등록 </a>
                      <a class="nav-link" href="/taskRegisterToAdvertiser"> 광고주 업무관리 등록 </a>
                    </nav>
                  </div>
                  <a class="nav-link" href="/taskManageView"> 업무관리 조회 </a>
                </nav>
              </div>            
              <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">                    
                <div class="nav-link-icon"><i class="fas fa-chart-area"></i></div>
                REPORT
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseReport" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                  <a class="nav-link" href="./shipmentStatus"> 발송 현황 </a>
                </nav>
                <nav class="sidenav-menu-nested nav">
                  <a class="nav-link" href="./autoReport"> 자동 설정 </a>
                </nav>
                <nav class="sidenav-menu-nested nav">
                  <a class="nav-link" href="./manualReport"> 수동 발송 </a>
                </nav>
              </div>              

              <!-- Sidenav Accordion (Management)-->
              <div class="sidenav-menu-heading">MANAGEMENT</div>
              <a class="nav-link" href="/managementAccount">
                <div class="nav-link-icon"><i data-feather="airplay"></i></div>
                계정 관리
              </a>



              
              <a class="nav-link" href="./dailyWork">
                <div class="nav-link-icon"><i data-feather="airplay"></i></div>
                일일업무일지
              </a>
              <a class="nav-link" href="./dailyWorkList">
                <div class="nav-link-icon"><i data-feather="airplay"></i></div>
                일일업무통계
              </a>








              <a class="nav-link" href="/reportfile" style="display:<?= $session->level === '10' ? '' : 'none' ?>">
                <div class="nav-link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus" data-v-b8fab1e8=""><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                </div>
                리포트파일등록
              </a>
              




              


              <!-- Sidenav Accordion (Tool)-->
              <div class="sidenav-menu-heading">TOOL</div>
              <a class="nav-link" href="/downloadNaverReport">
                <div class="nav-link-icon"><i data-feather="download"></i></div>
                네이버 분석자료 다운로드
              </a>
              <a class="nav-link" href="/trendAnalysis">
                <div class="nav-link-icon"><i data-feather="trending-up"></i></div>
                트렌드 분석자료 다운로드
              </a>
            </div>
          </div>
          <!-- Sidenav Footer-->
          <div class="sidenav-footer" style="background-color: white; text-align:center">
            <div class="sidenav-footer-content">
              <p class="ml-2" style='visibility :<?= $_SESSION['division1'] === '6' ? 'hidden ' : '' ?>'>
                <a href="http://rms.hmcorp.co.kr/work/?nc=20&id=55&category=2" style='color: #687281;'>
                  <i class="fas fa-exclamation-circle"></i>
                  도움이 필요하세요?
                </a>
              </p>
              <a href="javascript:void(0)" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onClick='downloadGuide()'>
                <i class="fas fa-download fa-sm text-white-50"></i> 
                Guide Download
              </a>
            </div>
          </div>
        </nav>
      </div>
      <div id="layoutSidenav_content">      