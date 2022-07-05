<?php
  $session = session();
?>

<!--
  리포트 자동 발송 설정 리스트 밑 등록 페이지
-->

<style>
  .tooltip-inner {
    border: 1px solid;
    border-color: #c9cbcf;
    color: black;
    background-color: white;
    max-width: 1480px;
    text-align: left;
  }
   #divAlert {
      position:absolute; 
      top: 50px; 
      left: 50%; 
      width: 300px;
      margin: auto;
      z-index: 9999; 
  }
</style>

<main>
  <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid">
      <div class="page-header-content">
        <div class="row align-items-center justify-content-between pt-3">
          <div class="mb-3" style='padding-left:24px;'>
            <h1 class="page-header-title"> Home > REPORT > 자동 설정 </h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- 조회 조건 설정 폼  -->
  <div class="container mt-4">
    <div class="row">
      <div class="card col-xl-12 shadow mt-4">
        <div class="card-body">
          <div class="row no-gutters">
            <div class="col-10 col-md-12">
              <div class="row">
                <div class="col-auto">
                  <label for="date_range">리포트주기</label> 
                  <select class="custom-selectbox" id="selSearchReportCycle" style="width:120px; margin-top:10px;">
                    <option value="">전체</option>
                    <option value="1">일간</option>
                    <option value="2">주간</option>
                    <option value="3">월간</option>
                  </select>
                </div>
                <div class="col-auto">
                  <label for="date_range">광고주명</label> 
                  <input class="custom-selectbox" id="iptCustomreNm" type="text" placeholder="광고주명" style="margin-top:10px;">
                </div>
                <div style="flex:1; bottom: 0;">
                  <div class="col-auto">
                    <div style='height:32px'></div>
                  </div>
                  <div class="col-auto" align="right">
                    <button class="btn btn-primary" type="button" id="btnSearchMail">검색</button>
                  </div>                  
                </div>                
              </div>              
            </div>
          </div>
        </div>        
      </div>
    </div>
    <!-- 데이터 테이블 시작 -->
    <div class="row">
      <div class="card col-xl-12 shadow mt-4">
        <div class="card-header row align-items-center justify-content-between">
          <div class="font-weight-bolder text-lg text-black-75 ml-2">
            자동 발송 리스트
            <i id="test" class="far fa-question-circle" 
              data-bs-toggle="tooltip" 
              data-bs-html="true" 
              data-bs-placement="right" 
              style="font-size:15px;color: gray;" 
              title='- 자동 발송 등록: 자동 발송 등록한 광고 계정수(광고주수)<br/>- 자동발송 ON: 자동 발송 등록중 사용 설정이 ON인 광고 계정수(광고주수)<br/>- 중복 등록시 1개로 카운트'>
            </i>
            <font style='font-size:14px;'>
              월간은 다음 달부터 매월 1일에 전월 리포트를, 주간은 다음 주부터 매주 월요일에 전주리포트를, 일간은 내일부터 매일 전일 리포트를 발송합니다.
            </font>
          </div>
        </div>

        <div class="card-body" >
          <div style="width:100%; text-align:center">
            <font style="font-size: 18px; font-weight: bold; color: black;"> 
              자동 발송 등록: <font id="statusAdd"><?= $status->cnt_cus ?>(<?= $status->cnt_account ?>)</font>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              자동 발송 ON: <font id="statusOn"><?= $status->cnt_on_cus ?>(<?= $status->cnt_on_account ?>)</font>
            </font>
            <font style="font-size: 13px; font-weight: bold;">&#42; 광고계정수(광고주수)</font>
          </div>
          <div class="row" style="padding-top:20px;">
            <div class="col" style="text-align:left">
              <button type="button" class="btn btn-success changeStatus" value="on">ON</button>
              <button type="button" class="btn btn-warning changeStatus" value="off">OFF</button>
            </div>
            <div class="col-6">
            </div>
            <div class="col" style="text-align:right">
              <button type="button" class="btn btn-primary" id="btnAddMail">등록</button>
              <button type="button" class="btn btn-danger" id="brnDelMail">삭제</button>
            </div>
          </div>  
          <!-- 테이블 시작 -->
          <table id="dataTable" class="table table-striped table-bordered text-sm font-weight-bold" style="width:100%; font-size:14px;">
            <thead>
              <tr style='text-align:center;'>
                <th></th>
                <th> 광고주명 </th>
                <th> 리포트 매체 </th>
                <th> 리포트 주기 </th>
                <th> 수신 이메일 </th>
                <th> 사용 설정 </th>
                <th> 최초등록일 </th>
                <th> 최근수정일 </th>
                <th> 수정 </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($mail as $item) { ?>
                <tr style='text-align:center;'>
                  <td> <input class="form-check-input" type="checkbox" value="<?= $item->idx ?>" name="cbMail"> &nbsp </td>
                  <td> <?= $item->cs_nm ?> </td>
                  <td> <?= $item->media_name ?> </td>
                  <td> <?= $item->cycle ?> </td>
                  <td> <?= $item->email ?> </td>
                  <td> <?= $item->status ?> </td>
                  <td> <?= $item->reg_date ?> </td>
                  <td> <?= $item->upd_date ?> </td>
                  <td> <button type="button" class="btn btn-sm btn-info" value="<?= $item->idx ?>" onClick="editEmail(this);"> 수정 </button> </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>          
          <!-- 테이블 끝 -->

          <div class="modal fade" id="modelAddMail" tabindex="-1" aria-labelledby="madelAddMialLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="madelAddMialLabel">자동 발송 등록</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding:0px;">
                  <div class="row" style="padding: 12px 12px 0 12px;">
                    <div class="col">
                      광고주<font style="font-size: 11px; font-weight: bold;">(최대 1명의 광고주 선택이 가능 합니다.)</font>
                    </div>
                    <div class="col" style="text-align:right">
                      <input type="text" id="iptModalCusNm" class="form-control form-control-sm" placeholder="광고주명" aria-label="광고주명" aria-describedby="basic-addon1" style="width:84%; float: left;">
                      <button type="button" class="btn btn-sm btn-primary" style="width:14%; height:35px;" onClick='searchCustomer()'>검색</button>
                    </div>
                  </div>

                  <!-- 광고주 테이블 시작 -->
                  <table id="dtCustmoreList" class="table table-striped table-bordered text-sm font-weight-bold" style="width:100%; padding: 0 12px 0 12px; font-size:14px;">
                    <thead>
                      <tr style='text-align:center;'>
                        <th></th>
                        <th> 광고주명(회사명) </th>
                        <th> 광고주명(리포트용) </th>
                        <th> 사업자번호 </th>
                      </tr>
                    </thead>
                    <tbody id="bodyDtCustmoerList">
                      <?php foreach($custmoer['cus'] as $item) { ?>
                      <tr style='text-align:center;'>
                        <td style="width:10px"> <input class="form-check-input custmoer" type="radio" id="cb<?= $item['cs_seq'] ?>" name="radioCustmoer" value="<?= $item['cs_seq'] ?>"> </td>
                        <td id="orignal<?= $item['cs_seq'] ?>"><?= $item['cs_nm'] ?></td>
                        <td id="report<?= $item['cs_seq'] ?>"><?= $item['cs_nm'] ?></td>
                        <td> <?= $item['cs_num'] ?> </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>          
                  <!-- 광고주 테이블 끝 -->
                  <hr/>
                  <div style="padding: 0 12px 0 12px; ">
                    리포트 계정 선택<font style="font-size: 11px; font-weight: bold;">(복수의 계정 선택이 가능 합니다.)</font>
                    <div id="divAccountList" style='padding-top:10px;'> <div style="text-align:center;">광고주를 선택해주세요.</div> </div>
                  </div>
                  <hr/>
                  <div style="padding: 0 12px 0 12px; ">
                    리포트 주기<font style="font-size: 11px; font-weight: bold;">월간은 다음 달 부터 매월 1일에 전월 리포트를, 주간은 다음 주부터 매주 월요일에 전주 리포트를, 일간은 내일부터 매일 전일 리포트를 발송합니다.</font>
                    <div class="custom-control custom-checkbox mr-2">
                      <input class="from-control-input" id="cbDay" name="reportCycle" type="checkbox" value="1">
                      <label class="from-control-label" for="cbDay">일간</label>

                      <input class="from-control-input" id="cbWeek" name="reportCycle" type="checkbox" value="2" style="margin-left:10px;">
                      <label class="from-control-label" for="cbWeek">주간</label>

                      <input class="from-control-input" id="cbMonth" name="reportCycle" type="checkbox" value="3" style="margin-left:10px;">
                      <label class="from-control-label" for="cbMonth">월간</label>
                    </div>                   
                  </div>
                  <hr/>
                  <div id="divAddEmail" style="padding: 0 12px 0 12px; display: none;">
                    이메일<font style="font-size: 11px; font-weight: bold;">(이메일 중복 추가 불가, 수신, 참조, 숨은참조 중 1개 선택가능)</font>
                    <table class="table" style="font-size:14px;">
                      <thead>
                        <tr style='text-align:center; vertical-align: middle;'>
                          <th width="50px">수신구분</th>
                          <th>이메일</th>
                          <th>삭제</th>
                        </tr>
                      </thead>
                      <tbody id="tableEmailList">
                        <tr style='text-align:center; vertical-align: middle;'>
                          <td>
                            <select class="custom-selectbox" id="sleRmsMailCycle" style="width:auto; height:38px; font-size:14px;">
                              <option value="">선택</option>
                              <option value="to">수신</option>
                              <option value="cc">참조</option>
                              <option value="bcc">숨은참조</option>
                              <option value="ns">미발송</option>
                            </select>
                          </td>
                          <td>
                            <div class="edit" id="custmoerEmail"></div>
                            <input type="text" class="form-control form-control-sm update" style="display: none;">
                          </td>
                          <td>
                            <button class="btn btn-sm btn-primary edit" onClick="changeView('edit')">수정</button>
                            <button class="btn btn-sm btn-primary update" style="display: none;" onClick="changeView('update')">등록</i></button>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr style="text-align: center;">
                          <td>
                            <select class="custom-selectbox" id="selReportCycle" style="width:auto; height:38px; font-size:14px;">
                              <option value="">선택</option>
                              <option value="to">수신</option>
                              <option value="cc">참조</option>
                              <option value="bcc">숨은참조</option>
                            </select>
                          </td>
                          <td>
                            <input type="text" class="form-control form-control-sm" id="iptEmail">
                          </td>
                          <td>
                            <button class="btn btn-sm btn-primary" onClick="addEmailTableRow();"> 추가 </button>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                    
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-primary" id="btnSummit">저장</button>
                  <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">닫기</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
</main>

<script>
  const listAccount = JSON.parse('<?php echo json_encode($custmoer['account']) ?>');  // 광고주별 광고 계정 정보
  const listMedia = JSON.parse('<?php echo json_encode($media) ?>');  // 매체 정보 
  const btnOpenModal = document.querySelector('#btnAddMail');
  const modelAddMail = new bootstrap.Modal(document.querySelector('#modelAddMail'),{backdrop: 'static'});
  const divAccount = document.querySelector('#divAccountList');
  const rmsCusEmail = document.querySelector('#custmoerEmail')
  const divAddMail = document.querySelector('#divAddEmail');
  const divCusMail = document.querySelectorAll('.edit');
  const divEditCusMail = document.querySelectorAll('.update');

  let tableEmailList = null;
  let dtCusmoerList = null;  // 광고주 리스트 DataTable
  let dtMailList = null;     // 자동 발송 메일 등록 리스트 DataTable;
  let CUSTMOER_ID = null;
  let MAIL_IDX = null;

  initDataTalbe();

  btnOpenModal.addEventListener('click', event => {
    modelAddMail.show();

    setTimeout(function () {
      // DataTable의 tbody에 스크롤 설정시 헤더 UI 깨짐 방지를위해 0.16초뒤 테이블 새로그리기
      dtCusmoerList.columns.adjust().draw();
      $('#dtCustmoreList_filter').hide();
      // 광고주 리스트에서 라디오 박스 체크시 이벤트
      $('#dtCustmoreList > tbody > tr > td > input').change(event => {
        CUSTMOER_ID = event.target.value;
        divAddMail.style.display = '';
        const mKey = Object.keys(listAccount).filter(key => {
          return key == CUSTMOER_ID
        });

        let htmlAccountList = `<div class='row'>`;
        Object.keys(listAccount[mKey]).forEach(key => {
          // 미디어 코드의 한글명 가져오기
          const mediaName = listMedia.filter(item => {
            return item.media_code == key;
          })     

          htmlAccountList += `<div class="col-sm-3"><font style="font-size:14px; font-weight: bold;">${mediaName[0].product_kr_name}</font></div>`
          htmlAccountList += '<div class="col-sm-8">';
          let mediaAccount = listAccount[mKey][key].substring(1).split(',');
          mediaAccount.forEach(account => {
            htmlAccountList += `
              <div class="custom-control custom-checkbox mr-2" style="float:left; margin-right:10px;">
                <input class="form-check-input" id="cb${removeSpecialCharacters(account)}${key}" name="cbAccount" value="${key},${account}" type="checkbox">
                <label class="form-check-label" for="cb${removeSpecialCharacters(account)}${key}">${account}</label>
              </div>
            `;
          });
          htmlAccountList += '</div>';
            
          htmlAccountList += '<div class="w-100"></div>';
        })
        htmlAccountList += `</div>`;
        divAccount.innerHTML = htmlAccountList;

        $.ajax({
          url: 'util/custmoer/get/mail',
          dataType: 'json',
          type: 'get',
          data: {
            csSeq: CUSTMOER_ID
          },
          success: function(data, status, xhr) {
            rmsCusEmail.textContent = data.email;
          }
        });
        event.stopImmediatePropagation();
      });
    }, 160);
  });

  /**
   * 등록 메일 삭제 이벤트
   */
  document.querySelector('#brnDelMail').addEventListener('click', event => {
    let idxs = ''
    document.querySelectorAll('input[name=cbMail]:checked').forEach((checkbox, index, array) => {
      idxs += (index < array.length-1) ? `${checkbox.value},` : checkbox.value;
    })

    if(idxs == '') {
      openAlert('warning', '삭제 하려는 메일을 선택하세요', 2000);
      return false;
    }

    $.ajax({
      url: 'mail/delete',
      dataType: 'json',
      type: 'post',
      data: {
        idx: idxs,
      },
      success: function(data, status, xhr) {
        if(data.status == 'failed') {
          openAlert('danger', data.msg, 2000);
        } else {
          location.reload();
        }
      }
    });
  });

  document.querySelector('#modelAddMail').addEventListener('hidden.bs.modal', event => {
    initModal();
  });

  /**
   * RMS 광고주 이메일 주소 변경 From 변경
   * @param type: From Type(edit: 수정모드, update: 이메일 변경 및 수정모드 해제 )
   * @type type: string
   * @return Void
   */
  function changeView(type) {
    if(type == 'edit') {
      divCusMail.forEach((element, index) => {
        element.style.display = 'none'
      });
      divEditCusMail.forEach((element, index) => {
        element.style.display = ''
        if(index == 0) {
          element.value = divCusMail[0].innerHTML;
        }
      });
    } else {
      divCusMail.forEach(element => {
        element.style.display = ''
      });
      divEditCusMail.forEach(element => {
        element.style.display = 'none'
      });
      
      // RMS 광고주 이메일 변경
      $.ajax({
        url: 'util/custmoer/update/mail',
        dataType: 'json',
        type: 'post',
        data: { 
          csSeq: CUSTMOER_ID,
          mail: divEditCusMail[0].value
        },
        success: function(data, status, xhr) {
          if(data == 1) {
            divCusMail[0].innerHTML = divEditCusMail[0].value;
            openAlert('success', '이메일 변경 성공', 2000)
            //in890912@naver.com
          } else {
            openAlert('danger', '이메일 변경 실패! 관리자에게 문의하세요', 2000)
          }
        }
      });
    }
  }

  /**
   * 메일 리스트 테이블에 Row 추가
   */
  function addEmailTableRow() {
    if(tableEmailList == null) {
      tableEmailList = $('#tableEmailList');
    }

    if($('#selReportCycle option:selected').val() == '') {
      openAlert('warning', '수신 구분을 선택해주세요', 2000)
      return false;
    }

    if($('#iptEmail').val() == '') {
      openAlert('warning', '이메일을 입력하세요', 2000)
      $('#iptEmail').focus();
      return false;
    }
    const regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/;
    if($('#iptEmail').val() != '') {
      if ($('#iptEmail').val().match(regExp) == null) {
        openAlert('warning', '형식에 맞지 않은 이메일 입니다', 2000)
        return false;
      }
    }

    const mailList = document.querySelectorAll('.clsEmail');
    let isAddEmail = false;
    mailList.forEach(element => {
      if(element.innerHTML == $('#iptEmail').val()) {
        isAddEmail = true;
      }
    });
    if(isAddEmail == true) {
      openAlert('warning', '동일한 메일주소가 등록되어 있습니다', 2000)
      return false;
    }

    tableEmailList.append(`
      <tr id="mailTr${mailList.length}" style="text-align:center; vertical-align: middle;">
        <td class='clsType'>${$("#selReportCycle option:selected").text()}</td>
        <td class='clsEmail'>${$('#iptEmail').val()}</td>
        <td><button class="btn btn-sm btn-danger" onClick="removeEmail('mailTr${mailList.length}')" > 삭제 </button></td>
      </tr>
    `);
  }

  /**
   * 등록 메일 Row 삭제하기
   * @param index: 삭제할 Row ID
   * @type index: string
   */
  function removeEmail(id) {
    $(`#${id}`).remove();

  }

  // 이메일 검색 버튼 이벤트
  document.querySelector('#btnSearchMail').addEventListener('click', () => {
    const cycle = $('#selSearchReportCycle option:selected').val() == '' ? '1,2,3' : $('#selSearchReportCycle option:selected').val();
    const name = document.querySelector('#iptCustomreNm').value

    // 검색 결과에 맞는 메일 등록 현황 가져오기
    $.ajax({
      url: 'mail/status',
      dataType: 'json',
      type: 'get',
      data: {
        cycle: cycle,
        name: name
      },
      success: function(data, status, xhr) {
        document.querySelector('#statusAdd').innerHTML = `${data.cnt_cus}(${data.cnt_account})`;
        document.querySelector('#statusOn').innerHTML = `${data.cnt_on_cus}(${data.cnt_on_account})`;
      }
    });

    // 검색 결과 가져오기
    $.ajax({
      url: 'mail/get',
      dataType: 'json',
      type: 'get',
      //traditional: true,
      data: {
        cycle: cycle,
        name: name
      },
      success: function(data, status, xhr) {
        // 리포트 자동 발송 메일 리스트 업데이트
        let tbodyHtml = '';
        tbodyHtml = `
        <thead>
          <tr style='text-align:center;'>
            <th></th>
            <th> 광고주명 </th>
            <th> 리포트 매체 </th>
            <th> 리포트 주기 </th>
            <th> 수신 이메일 </th>
            <th> 사용 설정 </th>
            <th> 최초등록일 </th>
            <th> 최근수정일 </th>
            <th> 수정 </th>
          </tr>
        </thead>
        <tbody>`;

        data.forEach(item => {
          tbodyHtml += `<tr style='text-align:center;'>`;
          tbodyHtml += `<td> <input class="form-check-input" type="checkbox" value="${item.idx}" name="cbMail"> </td>`;
          tbodyHtml += `<td> ${item.cs_nm} </td>`;
          tbodyHtml += `<td> ${item.media_name} </td>`;
          tbodyHtml += `<td> ${item.cycle} </td>`;
          tbodyHtml += `<td> ${item.email} </td>`;
          tbodyHtml += `<td> ${item.status} </td>`;
          tbodyHtml += `<td> ${item.reg_date} </td>`;
          tbodyHtml += `<td> ${item.upd_date == null ? '' : item.upd_date} </td>`;
          tbodyHtml += `<td> <button type="button" class="btn btn-sm btn-info" value="${item.idx}" onClick="editEmail(this)"> 수정 </button> </td>`;
          tbodyHtml += `</tr>`;
        });
        tbodyHtml += `</tbody>`
        
        dtMailList.destroy();
        $('#dataTable').html(tbodyHtml);
        dtMailList = $('#dataTable').DataTable({
          searching: false, 
          info: false,
          lengthChange: false,
          autoWidth: false,
          columnDefs: [
            { targets: [0, 8], orderable: false }
          ],
          order: [[ 6, 'desc' ]]
        });
      }
    });
  })

  /**
   * 리포트 자동 발송 ON/OFF 설정
   */
  document.querySelectorAll('.changeStatus').forEach(element => {
    element.addEventListener('click', event => {
      let idxs = '';
      document.querySelectorAll('input[name=cbMail]:checked').forEach((checkbox, index, array) => {
        idxs += (index < array.length-1) ? `${checkbox.value},` : checkbox.value;
      })

      if(idxs == '') {
        openAlert('warning', '상태를 변경하려는 메일을 선택하세요', 2000);
        return false;
      }

      $.ajax({
        url: 'mail/update/status',
        dataType: 'json',
        type: 'post',
        data: {
          idx: idxs,
          status: element.value == 'on' ? 1 : 2
        },
        success: function(data, status, xhr) {
          if(data.status == 'failed') {
            openAlert('danger', ata.msg, 2000)
          } else {
            location.reload();
          }
        }
      });
    });
  });

  /**
   * 메일 등록 버튼
   */
  document.querySelector('#btnSummit').addEventListener('click', event => {
    if(document.querySelectorAll('input[name=radioCustmoer]:checked').length == 0) {
      openAlert('warning', '광고주를 선택하세요', 2000);
      return false;
    }


    let reportAccount = new Array();
    if(document.querySelectorAll('input[name=cbAccount]:checked').length == 0) {
      openAlert('warning', '광고 계정을 선택하세요', 2000);
      return false;
    }
    Array.from(document.querySelectorAll('input[name=cbAccount]:checked')).forEach(element => {
      reportAccount.push(element.value);
    });

    let reportCycle = new Array();
    document.querySelectorAll('input[name=reportCycle]:checked').forEach(element=> {
      reportCycle.push(element.value)
    });
    if(reportCycle.length == 0) {
      openAlert('warning', '리포트 발송 주기를 선택하세요', 2000);
      return false;
    }

    const mailList = document.querySelectorAll('.clsEmail');
    const receiveType = document.querySelectorAll('.clsType');
    let resultMailInfo = [];

    if($('#sleRmsMailCycle  option:selected').val() == '') {
      openAlert('warning', '광고주 메일 수신 구분을 선택하세요', 2000);
      return false;
    }

    let isEmptyCC = true; 
    if($('#sleRmsMailCycle  option:selected').val() == 'to') {
      isEmptyCC = false;
    }

    const reportName = document.querySelector(`#report${CUSTMOER_ID}`).innerHTML;
    const orignalName = document.querySelector(`#orignal${CUSTMOER_ID}`).innerHTML;
    // RMS 광고주 메일 수신구분이 미선택이거나, 미발송이 아니면 수신 대상에 추가
    if($('#sleRmsMailCycle  option:selected').val() != '' && $('#sleRmsMailCycle  option:selected').val() != 'ns') {
      reportAccount.forEach(accountItem => {
        reportCycle.forEach(cycleItem => {
          let mTempData = new Array();
          const mTempAccount = accountItem.split(',');
          resultMailInfo.push({
            'cs_seq': CUSTMOER_ID,
            'cs_nm': reportName != '' ? reportName : orignalName,
            'media_code': mTempAccount[0],
            'matching_id': mTempAccount[1],
            'email': $('#custmoerEmail').text(),
            'receive_type': $('#sleRmsMailCycle  option:selected').val(),
            'cycle': cycleItem,
          });
        });
      });
    }

    if(mailList.length > 20) {
      openAlert('warning', '최대 20개까지 메일을 등록할 수 있습니다', 2000);
      return false;      
    }
    if($('#sleRmsMailCycle  option:selected').val() == '' || $('#sleRmsMailCycle  option:selected').val() == 'ns') {
      if(mailList.length == 0) {
        openAlert('warning', '메일을 등록하세요', 2000);
        return false;
      }
    }

    reportAccount.forEach(accountItem => {
      mailList.forEach((emailItem, index) => {
        if($('#sleRmsMailCycle  option:selected').val() == 'to' || receiveType[index].innerHTML == '수신') {
          isEmptyCC = false;
        }
        reportCycle.forEach(cycleItem => {
          let mTempData = new Array();
          const mTempAccount = accountItem.split(',');
          resultMailInfo.push({
            'cs_seq': CUSTMOER_ID,
            'cs_nm': reportName != '' ? reportName : orignalName,
            'media_code': mTempAccount[0],
            'matching_id': mTempAccount[1],
            'email': emailItem.innerHTML,
            'receive_type': changeReceiveTypeStringToCode(receiveType[index].innerHTML),
            'cycle': cycleItem,
          });
        });
      });
    });

    if(isEmptyCC == true) {
      openAlert('warning', '수신 구분이 수신인 메일이 최소1개 이상이어야 합니다', 2000);
      resultMailInfo.splice(0);
      return false;
    }

    let url = null;
    if(event.target.innerHTML == '저장') {
      url = 'mail/add'
    } else {
      url = 'mail/edit'
    }

    // 리포트 자동 발송 설정 정보 디비 저장
    $.ajax({
      url: url,
      dataType: 'json',
      type: 'post',
      //traditional: true,
      data: {
        idx: MAIL_IDX,
        param: JSON.stringify(resultMailInfo)
      },
      success: function(data, status, xhr) {
        if(data.status === 'success') {
          openAlert('success', '리포트 자동 발송 설정 완료', 2000);
          initModal();
          location.reload();
        } else if(data === 'failed') {
          openAlert('danger', '리포트 자돌 발송 설정 실패<br/>관리자에게 문의하세요', 2000);
        } else {
          alert(data.msg);
        }
      }
    });
  });

  /**
   * 등록 이메일 수정 하기
   * @param obj: 수정 버튼 Element
   */
  function editEmail(obj) {
    btnOpenModal.click();
    MAIL_IDX = obj.value;
    $.ajax({
      url: 'mail/get',
      dataType: 'json',
      type: 'get',
      data: {
        idx: obj.value
      },
      success: function(data, status, xhr) {
        if(tableEmailList == null) {
          tableEmailList = $('#tableEmailList');
        }

        document.querySelector('#btnSummit').innerHTML = '수정';

        setTimeout(() => {
          document.querySelector(`#cb${data[0].cs_seq}`).click();
          dtCusmoerList.search(data[0].cs_nm).draw();          
        }, 160);
        setTimeout(() => {
          let tempEmail = new Array();
          data.forEach(item => {
            document.querySelector(`#cb${removeSpecialCharacters(item.matching_id)}${item.media_code}`).checked = true;
            document.querySelector(`#${item.cycle == '일간' ? 'cbDay' : (item.cycle == '주간' ? 'cbWeek' : 'cbMonth')}`).checked = true;
            tempEmail.push(rmsCusEmail.innerHTML);
            if(rmsCusEmail.innerHTML == item.email) {
              document.querySelector('#sleRmsMailCycle').value = item.receive_type;
            } else if(rmsCusEmail.innerHTML != item.email) {
              if(tempEmail.includes(item.email) == false) {
                tempEmail.push(item.email);
                tableEmailList.append(`
                  <tr id="mailTr${data.length}" style="text-align:center; vertical-align: middle;">
                    <td class='clsType'>${changeReceiveTypeCodeToString(item.receive_type)}</td>
                    <td class='clsEmail'>${item.email}</td>
                    <td><button class="btn btn-sm btn-danger" onClick="removeEmail('mailTr${data.length}')" > 삭제 </button></td>
                  </tr>
                `);
              }
            }
          });
        }, 500);        
      }
    });         
  }

  /**
   * 특수문자 제거
   * @param text: 특수문자를 제거할 문자
   * @type text: string
   * @return string
   */
  function removeSpecialCharacters(text) {
    const regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/gi
    return text.replace(regExp, '');
  }

  /**
   * DataTable 초기화
   */
  function initDataTalbe() {
    dtMailList = $('#dataTable').DataTable({
      searching: false, 
      info: false,
      lengthChange: false,
      autoWidth: false,
      columnDefs: [
        { targets: [0, 8], orderable: false }
      ],
      order: [[ 6, 'desc' ]]
    });

    dtCusmoerList = $('#dtCustmoreList').DataTable({
      searching: true, 
      info: false,
      lengthChange: false,
      paging: false,
      autoWidth: false,
      scrollY: "250px",
      scrollCollapse: true,
      columnDefs: [{
        "targets": [0],
        "orderable": false
      }],
      order: [[ 1, 'asc' ]]
    });
  }

  /**
   * 리포트 메일 수신 타입 코드로 변환
   * @param type: 코드로 변환할 메일 수신 타입
   * @type type: string
   * @return string
   */
  function changeReceiveTypeStringToCode(type) {
    const receiveType = {
      '수신': 'to',
      '참조': 'cc',
      '숨은참조': 'bcc',
      '미발송': 'ns'
    }

    return receiveType[type];
  }

  /**
   * 메일 수신 구분 코드 한글명으로 변환
   * @param type: 한글명으로 변환한 수신구분 코드
   * @type type: string
   * @return string
   */
  function changeReceiveTypeCodeToString(type) {
    const receiveType = {
      'to': '수신',
      'cc': '참조',
      'bcc': '숨은참조',
      'ns': '미발송'
    }

    return receiveType[type];
  }  
  
  /**
   * 이메일 등록 모달창 초기화
   */
  function initModal() {
    $('input[name=radioCustmoer]').prop('checked', false);
    $('input[name=reportCycle]').prop('checked', false);
    $('.clsType').parent().remove();
    $('#iptEmail').val('');
    $('#selReportCycle option:eq(0)').prop('selected', true);
    $('#sleRmsMailCycle option:eq(0)').prop('selected', true);
    divAddMail.style.display = 'none';
    divAccount.innerHTML = '<div style="text-align:center;">광고주를 선택해주세요.</div>';
    $('#iptModalCusNm').val('');
    dtCusmoerList.search($('#iptModalCusNm').val()).draw();
    document.querySelector('#btnSummit').innerHTML = '저장';
  }

  /**
   * 광고주 검색 이벤트 
   */
  function searchCustomer() {
    dtCusmoerList.search($('#iptModalCusNm').val()).draw();
  }
</script>
