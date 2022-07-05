<?php
  $session = session();
?>

<!--
  리포트 수동 생성 요청 페이지
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
  .download > label:hover, .sent > label:hover {
    color: #0061F2;
    cursor: pointer;
  }

  .dataTables_paginate {
    padding-top:10px;
  }

</style>

<main>
  <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid">
      <div class="page-header-content">
        <div class="row align-items-center justify-content-between pt-3">
          <div class="mb-3" style='padding-left:24px;'>
            <h1 class="page-header-title"> Home > REPORT > 수동 발송 </h1>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container mt-4">
    <div class="row">
      <div style="text-align:right;">
        <button type="button" class="btn btn-sm btn-primary" style="width:auto; height:35px;" onClick="openModal()"> 리포트 발송 </button>
      </div>
      <div class="card col-xl-12 shadow mt-4" style="padding: 0px;">
        <div class="card-header row align-items-center justify-content-between" style="margin:0;">
          <div class="font-weight-bolder text-lg text-black-75 ml-2"> 리포트 생성 요청 </div>
        </div>

        <div class="card-body">
          <div>
            <div style="float:left; width:50%; padding-top:4px;">
              <font style="font-size: 18px; font-weight: bold;"> 광고주 </font>
              <font style="font-size: 13px; font-weight: bold;">(최대 1개의 광고주 선택이 가능 합니다.)</font>
            </div>
            <div style="float:right; width:auto">
              <input type="text" id="iptCusNm" class="form-control form-control-sm" placeholder="광고주명" style="width:74%; float: left;">
              <button type="button" class="btn btn-sm btn-primary" style="width:auto; height:35px; margin-left:10px;" id="btnSearch">검색</button>
            </div>
          </div>
          <div style="clear: both;"></div>
          <table id="tableCusList" class="table table-striped table-bordered text-sm font-weight-bold" style="width:100%; font-size:14px; margin-top:50px;">
            <thead>
              <tr style='text-align:center;'>
                <th style="width:60px;"> 선택 </th>
                <th> 광고주명(회사명) </th>
                <th> 광고주명(리포트용) </th>
                <th> 광고주 사업자 번호 </th>
              </tr>
            </thead>
            <tbody>
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
        </div>
        <hr/>
        <div style="padding: 0 12px 0 12px; ">
          리포트 계정 선택
          <font style="font-size: 11px; font-weight: bold;">(복수의 계정 선택이 가능 합니다.)</font>
          <div id="divAccountList" style='padding-top:10px;'> 
            <div style="text-align:center;">광고주를 선택해주세요.</div> 
          </div>
        </div>
        <hr/>
        <div style="padding: 0 12px 0 12px; ">
          <div style="width:200px; float:left;">
            리포트 주기
            <i id="tooltipCycle" class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right"
              style="font-size:15px;color: gray;" 
              title="&middot; 일별, 주별, 월별 리포트를 다운로드 할 수 있습니다.<br/>
                      &middot; 일별은 전 날 부터 리포트 다운로드 가능합니다.<br/>
                      &middot; 주별은 전 주 부터 리포트 다운로드 가능하며 조회기간은 1주일입니다.<br/>
                      &middot; 월별은 전 월 부터 리포트 다운로드 가능하며 조회기간은 1달입니다.">
            </i>
            <br/>
            <select class="form-select form-select-sm" id="selReportCycle" style="width:120px; height:35px; margin-top:10px; font-size:14px;">
              <option value="">선택</option>
              <option value="1">일간</option>
              <option value="2">주간</option>
              <option value="3">월간</option>
            </select>
          </div>
          <div>
            리포트 기간
            <br/>
            <!-- <div class="input-group" style='width:200px; margin-top:10px;'>
              <input type="text" id="datePicker" class="form-control form-control-sm date-input" value="2022-02-02"/>
              <span class="input-group-text fas fa-chart-area"></span>
            </div> -->
            <div class="btn btn-white line-height-normal ml-2 border-gray-400" id="datePicker" style='height:36px; margin-top:10px; border-radius: 0.25rem;'>
              <i class="text-primary fa fa-calendar mr-2"></i>
              <span style="padding-left:10px;"><?= date('Y-m-d', strtotime(date('Y-m-d'), '-1 day')); ?></span>
              <i class="fa fa-caret-down"></i>
            </div>
          </div>
        </div>
        <hr/>
        <div style="padding: 0 12px 12px 12px; text-align:center;">
          <button type="button" class="btn btn-sm btn-primary" style="width:auto; height:35px;" id="btnCreateReport">생성요청</button>
        </div>
      </div>
    </div>

    <!-- 리포트 생성 요청 리스트 -->
    <div class="row">
      <div class="card col-xl-12 shadow mt-4" style="padding: 0px;">
        <div class="card-header row align-items-center justify-content-between" style="margin:0;">
          <div class="font-weight-bolder text-lg text-black-75 ml-2"> 리포트 다운로드 </div>
        </div>

        <div class="card-body">
          <table id="tableManualList" class="table table-striped table-bordered text-sm font-weight-bold" style="width:100%; font-size:14px;">
            <thead>
              <tr style='text-align:center;'>
                <th> 리포트 주기 </th>
                <th> 리포트 기간 </th>
                <th> 리포트 생성 요청 날짜 </th>
                <th> 광고주명 </th>
                <th> 리포트 매체 </th>
                <th> 리포트 발송 </th>
                <th> 다운로드 </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($manual_list as $item) { ?>
                <tr style='text-align:center;'>
                  <td> <?= $item->cycle ?> </td>
                  <td> <?= sprintf('%s ~ %s', $item->start_date, $item->end_date) ?> </td>
                  <td> <?= $item->reg_date ?> </td>
                  <td> <?= $item->cs_nm ?> </td>
                  <td> <?= $item->media_name ?> </td>
                  <td class=<?= $item->status == 'scuess' ? 'sent' : '' ?>> 
                    <input type='hidden' value="<?= $item->idx ?>" />
                    <input type='hidden' value="<?= $item->cs_seq ?>" />
                    <input type='hidden' value="<?= $item->cs_nm ?>" />
                    <input type='hidden' value="<?= $item->media_code ?>" />
                    <input type='hidden' value="<?= $item->matching_id ?>" />
                    <label><?= empty($item->file_name) ? '-' : ($item->status == 'failed' ? '리포트 생성 실패' : '[리포트 발송]') ?> </td> </label>
                  <td class=<?= $item->status == 'scuess' ? 'download' : '' ?>>
                    <input type='hidden' value="<?= $item->file_name ?>" /> 
                    <label> <?= $item->status == 'scuess' ? '[리포트 다운로드]' : '-' ?> </label>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <form id="fromSentReport" enctype="multipart/form-data">
    <div class="modal fade" id="modalSentManual" tabindex="-1" aria-labelledby="modalSentManual" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="madelAddMialLabel"> 리포트 발송 </h5>
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
            <table id="tableModalCusList" class="table table-striped table-bordered text-sm font-weight-bold" style="width:100%; padding: 0 12px 0 12px; font-size:14px;">
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
                  <td style="width:10px"> <input class="form-check-input custmoer" type="radio" id="cbModal<?= $item['cs_seq'] ?>" name="radioCustmoer" value="<?= $item['cs_seq'] ?>"> </td>
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
              <div id="divModalAccountList" style='padding-top:10px;'> 
                <div style="text-align:center;">광고주를 선택해주세요.</div> 
              </div>
            </div>
            <hr/>
            <div style="padding: 0 12px 0 12px; ">
              <label for="formFileSm" class="form-label"> 리포트 등록 </label>
              <input class="form-control form-control-sm" id="formFileSm" type="file">
            </div>
            <hr/>
            <div id="divAddEmail" style="padding: 0 12px 0 12px;">
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
                      <button type="button" class="btn btn-sm btn-primary edit" onClick="changeView('edit')">수정</button>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr style="text-align: center;">
                    <td>
                      <select class="custom-selectbox" id="selReceive" style="width:auto; height:38px; font-size:14px;">
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
                      <button type="button" class="btn btn-sm btn-primary" onClick="addEmailTableRow();"> 추가 </button>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-primary" id="btnSent">발송</button>
            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">닫기</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>

<script>
  const listAccount = JSON.parse('<?php echo json_encode($custmoer['account']) ?>');  // 광고주별 광고 계정 정보
  const listMedia = JSON.parse('<?php echo json_encode($media) ?>');  // 매체 정보 
  let CUSTMOER_ID = null;

  const modalSentManual = new bootstrap.Modal(document.querySelector('#modalSentManual'),{backdrop: 'static'});

  const tableModalCusList = $('#tableModalCusList').DataTable({
    searching: true, 
    info: false,
    lengthChange: false,
    paging: false,
    autoWidth: false,
    scrollY: "250px",
    scrollCollapse: true,
    columnDefs: [{
      'targets': [0],
      'orderable': false
    }],
    order: [[ 1, 'asc' ]]
  });

  $('#tableManualList').DataTable({
    searching: false, 
    info: false,
    lengthChange: false,
    paging: true,
    autoWidth: false,
    scrollY: '340px',
    scrollCollapse: true,
    columnDefs: [
      { targets: 0, width: '10%', orderable: false }
    ],
    order: [[ 2, 'asc' ]]
  });

  const tableCusList = $('#tableCusList').DataTable({
    searching: true, 
    info: false,
    lengthChange: false,
    paging: false,
    autoWidth: false,
    scrollY: '340px',
    scrollCollapse: true,
    columnDefs: [
      { targets: 0, width: '10%', orderable: false }
    ],
    order: [[ 1, 'asc' ]]
  });

  $('#tableCusList_filter').hide();

  $('#tableCusList > tbody > tr > td > input').change(event => {
    CUSTMOER_ID = event.target.value;
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
      document.querySelector('#divAccountList').innerHTML = htmlAccountList;
  });

  /**
   * 검색 버튼 클릭 이벤트
   */
  document.querySelector('#btnSearch').addEventListener('click', () => {
    tableCusList.search(document.querySelector('#iptCusNm').value).draw();
  })

  /**
   * 달력
   */
  let startDate = null;
  let endDate = null;
  const TODAY = moment();
  const datePicker = $('#datePicker').daterangepicker({
    singleDatePicker: true,
    autoApply: true,
    maxDate: moment().subtract(1, 'day'),
    drops: 'up',
    showDropdowns: true,
    format: 'YYYY-MM-DD'
  }, function(start, end) {
    if(document.querySelector('#selReportCycle').value == 1 || document.querySelector('#selReportCycle').value == '') {
      startDate = start;
      endDate = end;
      $('#datePicker span').html(startDate.format('YYYY-MM-DD'));
    } else if(document.querySelector('#selReportCycle').value == 2) {
      startDate = moment(start).isoWeekday(1);
      endDate = moment(end).isoWeekday(7);
      if(TODAY.diff(endDate, 'days') < 0) {
        endDate = moment().subtract(1, 'day');
      }
      $('#datePicker span').html(startDate.format('YYYY-MM-DD') + ' ~ ' + endDate.format('YYYY-MM-DD'));
    } else {
      startDate = moment(start).startOf('month');
      endDate = moment(start).endOf('month');
      if(TODAY.diff(endDate, 'days') < 0) {
        endDate = moment().subtract(1, 'day');
      }
      $('#datePicker span').html(startDate.format('YYYY-MM-DD') + ' ~ ' + endDate.format('YYYY-MM-DD'));
    }
    updateDatePicker(startDate, endDate);
  });
  

  function updateDatePicker(startDate, endDate) {
    $('#datePicker').data('daterangepicker').setStartDate(startDate);
    $('#datePicker').data('daterangepicker').setEndDate(endDate);
  }

  /**
   * 리포트 생성 요청 버튼
   */
  document.querySelector('#btnCreateReport').addEventListener('click', () => {
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

    if(document.querySelector('#selReportCycle').value == '') {
      openAlert('warning', '리포트 주기를 선택하세요.', 2000);
      return false;
    }

    const tempReportDate = document.querySelector('#datePicker > span').innerHTML.replace(' ~ ', '~');
    const reportDate = tempReportDate.split('~');

    const reportName = document.querySelector(`#report${CUSTMOER_ID}`).innerHTML;
    const orignalName = document.querySelector(`#orignal${CUSTMOER_ID}`).innerHTML;

    let reportCreateInfo = [];
    reportAccount.forEach(accountItem => {
      const mTempAccount = accountItem.split(',');
      reportCreateInfo.push({
        'cs_seq': CUSTMOER_ID,
        'cs_nm': reportName != '' ? reportName : orignalName,
        'startDate': reportDate[0],
        'endDate': reportDate.length > 1 ? reportDate[1] : reportDate[0],
        'media_code': mTempAccount[0],
        'matching_id': mTempAccount[1],
        'cycle': document.querySelector('#selReportCycle').value
      });
    });
    $.ajax({
      url: 'manual/add',
      dataType: 'json',
      type: 'post',
      data: {
        param: JSON.stringify(reportCreateInfo)
      },
      success: function(data, status, xhr) {
        if(data.status === 'success') {
          createReport(data.msg)
          location.reload();
        } else if(data === 'failed') {
          openAlert('danger', data.msg, 2000);
        }
      }
    });
  })

  /**
   * 리포트 파일 생성하기
   * @param id: 수동 리포트 생성 요청 코드  ID
   * @type id: int
   */
  function createReport(id) {
    $.ajax({
      url: 'manual/create',
      dataType: 'json',
      type: 'post',
      data: {
        id: id
      },
      success: function(data, status, xhr) {
        console.log(data);
      }
    });
  }

  /**
   * 다운로드 버튼 클릭 이벤트
   */
  document.querySelectorAll('.download').forEach(element => {
    element.childNodes[3].addEventListener('click', event => {
      const link = document.createElement('a');
      link.download = element.childNodes[1].value;
      link.href = `http://localhost:8083/media-specific-data/generalreport/file/${element.childNodes[1].value}`;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });
  });

  /**
   * 리포트 수동 발송 버튼 클릭 이벤트 
   */
  let historyId = 0;
  let custmoreName = null;
  let custmoreNo = 0;
  let matchingId = null
  document.querySelectorAll('.sent').forEach(element => {
    element.childNodes[11].addEventListener('click', event => {
      historyId = element.childNodes[1].value;
      custmoreName = element.childNodes[5].value;
      custmoreNo = element.childNodes[3].value;
      matchingId = element.childNodes[9].value;
      openModal();
    })
  })

  function openModal() {
    modalSentManual.show(); // 모달창 열기
    setTimeout(() => {
      tableModalCusList.columns.adjust().draw();
      $('#tableModalCusList_filter').hide();
      if(custmoreName != null && custmoreName != '') {
        tableModalCusList.search(custmoreName).draw();
        setTimeout(() => {
          
          document.querySelector(`#cbModal${custmoreNo}`).click();
          matchingId.split('|').forEach(item => {
            $(`input:checkbox[value='${item}']`).attr("checked", true);
          });
        }, 100);
      }
      

      $('#tableModalCusList > tbody > tr > td > input').change(event => {
        CUSTMOER_ID = event.target.value;
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
        document.querySelector('#divModalAccountList').innerHTML = htmlAccountList;

        $.ajax({
          url: 'util/custmoer/get/mail',
          dataType: 'json',
          type: 'get',
          data: {
            csSeq: CUSTMOER_ID
          },
          success: function(data, status, xhr) {
            document.querySelector('#custmoerEmail').textContent = data.email;
          }
        });
      });
    }, 160);
  }

  /**
   * 광고주 검색 이벤트 
   */
  function searchCustomer() {
    tableModalCusList.search($('#iptModalCusNm').val()).draw();
  }

  /**
   * 리포트 발송 버튼 클릭 이벤트
   */
  document.querySelector('#btnSent').addEventListener('click', event => {

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

    if(document.querySelector('#formFileSm').value == '') {
      openAlert('warning', '첨부파일을 선택하세요', 2000);
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
        let mTempData = new Array();
        const mTempAccount = accountItem.split(',');
        resultMailInfo.push({
          'idx': historyId,
          'cs_seq': CUSTMOER_ID,
          'cs_nm': reportName != '' ? reportName : orignalName,
          'media_code': mTempAccount[0],
          'matching_id': mTempAccount[1],
          'email': $('#custmoerEmail').text(),
          'receive_type': $('#sleRmsMailCycle  option:selected').val(),
          'file': document.querySelector('#formFileSm').value
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
        let mTempData = new Array();
        const mTempAccount = accountItem.split(',');
        resultMailInfo.push({
          'idx': historyId,
          'cs_seq': CUSTMOER_ID,
          'cs_nm': reportName != '' ? reportName : orignalName,
          'media_code': mTempAccount[0],
          'matching_id': mTempAccount[1],
          'email': emailItem.innerHTML,
          'receive_type': changeReceiveTypeStringToCode(receiveType[index].innerHTML),
          'file': document.querySelector('#formFileSm').value
        });
      });
    });

    if(isEmptyCC == true) {
      openAlert('warning', '수신 구분이 수신인 메일이 최소1개 이상이어야 합니다', 2000);
      resultMailInfo.splice(0);
      return false;
    }


    const fileData = $('#formFileSm')[0];
    const formData = new FormData();
    formData.append('file', fileData.files[0]);

    formData.append('info', JSON.stringify(resultMailInfo));
    // 메일 발송 요청
    $.ajax({
      url: 'manual/sent',
      dataType: 'json',
      type: 'post',
      contentType: 'multipart/form-data',
      mimeType: 'multipart/form-data',
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      success: function(data, status, xhr) {
        console.log(data);
        if(data.status == 'success') {
          openAlert('success', '리포트 발송 완료!', 2000);
          setTimeout(() => {
            location.reload();
          }, 2010);
        } else {
          openAlert('danger', data.msg, 2000);
        }
      }
    });
  });

  /**
   * 메일 리스트 테이블에 Row 추가
   */
  let tableEmailList = null;
  function addEmailTableRow() {
    if(tableEmailList == null) {
      tableEmailList = $('#tableEmailList');
    }

    if($('#selReceive option:selected').val() == '') {
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
        <td class='clsType'>${$("#selReceive option:selected").text()}</td>
        <td class='clsEmail'>${$('#iptEmail').val()}</td>
        <td><button class="btn btn-sm btn-danger" onClick="removeEmail('mailTr${mailList.length}')" > 삭제 </button></td>
      </tr>
    `);

    document.querySelector('#iptEmail').value = '';
    $('#selReceive option:eq(0)').prop('selected', true);
  }

    /**
   * 등록 메일 Row 삭제하기
   * @param index: 삭제할 Row ID
   * @type index: string
   */
  function removeEmail(id) {
    $(`#${id}`).remove();

  }

  document.querySelector('#modalSentManual').addEventListener('hidden.bs.modal', event => {
    initModal();
  });

  /**
   * 모달창 초기화
   */
  function initModal() {
    $('input[name=radioCustmoer]').prop('checked', false);
    $('input[name=reportCycle]').prop('checked', false);
    $('.clsType').parent().remove();
    $('#iptEmail').val('');
    $('#selReceive option:eq(0)').prop('selected', true);
    $('#sleRmsMailCycle option:eq(0)').prop('selected', true);
    document.querySelector('#custmoerEmail').innerHTML = '';
    document.querySelector('#divModalAccountList').innerHTML = '<div style="text-align:center;">광고주를 선택해주세요.</div>';
    $('#iptModalCusNm').val('');
    historyId = 0;
    custmoreName = null;
    custmoreNo = 0;
    matchingId = null
    tableModalCusList.search('').draw();
    document.querySelector('#formFileSm').value = '';
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
   * 특수문자 제거
   * @param text: 특수문자를 제거할 문자
   * @type text: string
   * @return string
   */
  function removeSpecialCharacters(text) {
    const regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/gi
    return text.replace(regExp, '');
  }

</script>