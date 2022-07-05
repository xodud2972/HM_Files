          <footer class="footer-admin mt-auto footer-light">
            <div class="container-xl px-4">
              <div class="row">
                <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                <div class="col-md-6 text-md-end small">
                  <a href="#!">Privacy Policy</a>
                  &middot;
                  <a href="#!">Terms &amp; Conditions</a>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>

      <!-- Alert 시작 -->
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>
      <div id="divAlert">
      </div>
      <!-- Alert 끝 -->

      <style>
        #divAlert {
            position:absolute; 
            top: 50px; 
            left: 50%; 
            width: auto;
            margin: auto;
            z-index: 9999; 
        }
        
        /* 데이터 테이블 border 변경 */
        table.table-bordered.dataTable thead tr:first-child th, table.table-bordered.dataTable thead tr:first-child td {
          border-top-width: 2px;
          border-bottom-width: 2px;
        }
      </style>

      <script src="/project-root/public/js/scripts.js"></script>
      <script>
        const ROOT_PATH = '../../'; // 최상위 경로
        
        if('<?= $_SESSION["position2"] ?>' == '81'  || '<?= $_SESSION["position2"] ?>' == '955') {
          console.log(1);
        }

        window.addEventListener('DOMContentLoaded', (event) => {
          if('<?= $_SESSION["level"] ?>' == '40') {
            navWorkDesk =  document.querySelector('.marketer');
            navWorkDesk.style.display = '';
          } else {
            navWorkDesk =  document.querySelector('.admin');
            navWorkDesk.style.display = '';
            }
        });

        /**
         * 잔액조회 팝업창 띄우기
         * @param obj: 함수를 호출한 Element
         * @type obj: Element
         * @return Void
         **/
        function openBizMoney(obj) {
          let defaultType = "money";
          let url = `/data/money/show?type=` + defaultType;
          window.open(url, "b", "width=1200,height=900, scrollbars=1");
        }
        
        /**
         * 로그아웃
         * @return Void
         **/
        function logout() {
          $.get(`${ROOT_PATH}auth/logout`)
          .done(function(data) {
            console.log(data);
          })
          .fail(function(error) {
            console.error(error.responseText);
          })
          .always(function(data) {
            location.replace('../../')
          });
        }

        /**
         * AMS 가이드 파일 다운로드
         * @return Void
         **/
        function downloadGuide() {
          const hiddenElement = document.createElement('a');
          hiddenElement.href= '/file/ams_r_guide.pdf'
          hiddenElement.target = '_blank';
          hiddenElement.click();
        }

        const divAlert = document.querySelector('#divAlert');
        let elementAlert = document.querySelector('#alert');
        let bsAlert = null;
        let scrollY = 0;
        /**
         * Alert창 띄우기
         * @param type: AlertType(info, success, warning, danger)
         * @type type: string
         * @param msg: Alert에 노출한 내용
         * @type msg: string
         * @param time: Alert 노출 시간(1000 = 1초)
         * @type time: int
         */
        function openAlert(type, msg, time) {
          divAlert.innerHTML = getAlertHtml(type, msg);
          elementAlert = document.querySelector('#alert');
          elementAlert.style.marginTop = `${scrollY}px`;
          bsAlert = new bootstrap.Alert(elementAlert);
          setTimeout(() => {
            bsAlert.close();
          }, time);
        }

        // 스크롤시 팝업창 내리기 위한 스크롤 한 길이 체크
        window.addEventListener('scroll', e => {
          scrollY = window.scrollY;
        })

        /** Alert창 만들기 */
        function getAlertHtml(type, msg) {
          const alertHtml = {
            'info': `
              <div class="alert alert-primary d-flex align-items-center alert-dismissible fade show" id="alert" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"data-bs-dismiss="alert"><use xlink:href="#info-fill"/></svg>
                <div> ${msg} </div>
              </div>`,
            'success': `
              <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" id="alert" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"data-bs-dismiss="alert"><use xlink:href="#check-circle-fill"/></svg>
                <div> ${msg} </div>
              </div>`,
            'warning': `
              <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" id="alert" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"data-bs-dismiss="alert"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div> ${msg} </div>
              </div>`,
            'danger': `
              <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" id="alert" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"data-bs-dismiss="alert"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div> ${msg} </div>
              </div>`,
          }
          return alertHtml[type];
        }
      </script>
  </body>
</html>
