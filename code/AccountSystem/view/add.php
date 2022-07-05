<?php
include_once('../include/header.php');
?>
<div class="container-fluid" style="width:80%; margin:0px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 20px; font-weight:bold">내역등록</div>
                <div class="panel-body">
                    <div>
                        <form id="form1" role="form" method="post">
                        <input type="hidden" name="action" value="add">
                            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:auto">
                                <tr>
                                    <td>
                                        <table width="100%" height="100%" cellpadding="0" cellspacing="0" class="border_out">
                                            <tr height="50px" style="border:1px solid black">
                                                <td align="center">
                                                    <span style="font-size: 20px; font-weight:bold; color:black">거 래 명 세 서</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" class="border_in" style="border-left-style:none" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="45%">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                           
                                                                            <td>
                                                                                <table width="100%" height="214" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr height="30">
                                                                                        <td width="100" align="center" class="border_in">날 짜</td>
                                                                                        <td class="border_in" align="center">
                                                                                            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                <tr>
                                                                                                    <td align="center" class="border_in" style="border-top-style:none; height: 100%; margin:0px" align="left">
                                                                                                        <strong style="font-size:30;">
                                                                                                            <input name="reg_year" id="reg_year" type="text" placeholder="ex) 연도 : 1967" style="width: 100%; height: 100%; border:none; background-color: #dcdcdc;" >
                                                                                                        </strong> 
                                                                                                    </td>
                                                                                                    <td align="center" class="border_in" style="border-top-style:none" align="left">
                                                                                                        <strong style="font-size:30">
                                                                                                            <input name="reg_month" id="reg_month" type="text" placeholder="ex) 월 : 09 " style="width: 100%; height: 100%; border:none; background-color: #dcdcdc;" >
                                                                                                        </strong> 
                                                                                                    </td>
                                                                                                    <td align="center" class="border_in" style="border-top-style:none" align="left">
                                                                                                        <strong style="font-size:30">
                                                                                                            <input name="reg_day" id="reg_day" type="text" placeholder="ex) 일 : 18" style="width: 100%; height: 100%; border:none; background-color: #dcdcdc;" >
                                                                                                        </strong> 
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr height="30">
                                                                                        <td width="1" align="center" class="border_in" style="border-right-style:none">
                                                                                            차 량 번 호
                                                                                        </td>
                                                                                        <td>
                                                                                            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                <tr>
                                                                                                   <td align="center" class="border_in" style="border-top-style:none" align="left">
                                                                                                        <strong style="font-size:30">
                                                                                                            <input name="car_num" id="car_num" type="text" placeholder="ex) 42두 0579" style="width: 100%; height: 100%; border:none; background-color: #dcdcdc;" >
                                                                                                        </strong> 
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr height="30">
                                                                                        <td align="center" class="border_in" style="border-top-style:none">
                                                                                            --
                                                                                        </td>
                                                                                        <td class="border_in" style="border-top-style:none" align="center">
                                                                                            아래와 같이 계산합니다.
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr height="30">
                                                                                        <td align="center" class="border_in" style="border: 1px dotted black;">
                                                                                            합 계 금 액
                                                                                        </td>
                                                                                        <td align="center" class="border_in" >
                                                                                            <input name="total_won" id="total_won" type="text" placeholder="ex) 450,000" style="width: 100%; height: 100%; border:none; background-color: #dcdcdc;" >
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                            </td>
                                                            <td width="60%">
                                                                <div class="sign_area">
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td class="border_in" width="40" align="center" style="border: 1px solid black;">
                                                                                <span style="line-height:22px">
                                                                                    공<br /><br /><br /><br />
                                                                                    급<br /><br /><br /><br />
                                                                                    자
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <table width="100%" height="214" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr height="30">
                                                                                        <td width="100" align="center" class="border_in">등록번호</td>
                                                                                        <td class="border_in" align="center">
                                                                                            <span style="font-size:18px;font-weight:bold">584-10-02067</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr height="30">
                                                                                        <td align="center" class="border_in" style="border-top-style:none">
                                                                                            상호<br />
                                                                                            (법인명) 
                                                                                        </td>
                                                                                        <td>
                                                                                            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                <tr>
                                                                                                    <td class="border_in" style="border-top-style:none" align="center" width="300">
                                                                                                        <strong style="font-size:18px">서부자동차</strong>
                                                                                                    </td>
                                                                                                    <td class="border_in" style="border-top-style:none" align="center" width="40">
                                                                                                        성<br />명
                                                                                                    </td>
                                                                                                    <td class="border_in" style="border-top-style:none" align="left">
                                                                                                    &nbsp;&nbsp;<strong style="font-size:18px">김경모</strong> 
                                                                                                    <div style="float:right">(인)&nbsp;</div>
                                                                                                </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr height="30">
                                                                                        <td align="center" class="border_in" style="border-top-style:none">
                                                                                            사업장<br />주 소</td>
                                                                                        <td class="border_in" style="border-top-style:none" align="center">
                                                                                            경기도 안양시 만안구 양화로 53 2동 101호 (안양시 정우아파트)
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr height="30">
                                                                                        <td align="center" class="border_in" style="border-top-style:none">
                                                                                            업
                                                                                            태</td>
                                                                                        <td>
                                                                                            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                <tr>
                                                                                                    <td class="border_in" style="border-top-style:none" align="center">서비스업</td>
                                                                                                    <td class="border_in" style="border-top-style:none" width="40" align="center">
                                                                                                        종<br />
                                                                                                        목
                                                                                                    </td>
                                                                                                    <td class="border_in" style="border-top-style:none" align="center">타이어 수리</td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" height="50" border="0" cellspacing="0" cellpadding="0" class="border_in" style="border-top-style:none;border-left-style:none">
                                                        <tr height="20">
                                                            <td class="border_in" style="border-top-style:none;border-left-style:none" align="center">월</td>
                                                            <td class="border_in" style="border-top-style:none;" align="center">일</td>
                                                            <td class="border_in" style="border-top-style:none" align="center">품 &nbsp; &nbsp; 목</td>
                                                            <td class="border_in" style="border-top-style:none" align="center">규 격</td>
                                                            <td class="border_in" style="border-top-style:none" align="center">수 량</td>
                                                            <td class="border_in" style="border-top-style:none" align="center">단 가</td>
                                                            <td class="border_in" style="border-top-style:none" align="center">공 금 가 액</td>
                                                            <td class="border_in" style="border-top-style:none" align="center">세 액</td>
                                                        </tr>
                                                        <? for($i=1; $i<=10; $i++){ ?>
                                                            <tr height="20">
                                                                <td class="border_in" style="border-top-style:none;border-left-style:none; width:100px" align="center">
                                                                    <input id="c_month<?=$i?>" name="c_month<?=$i?>" value="-" type="text" placeholder="ex) 02" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </td>
                                                                <td class="border_in" style="border-top-style:none; width:100px" align="center">
                                                                    <input id="c_day<?=$i?>" name="c_day<?=$i?>"  value="-" type="text" placeholder="ex) 24" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </td>
                                                                <td class="border_in" style="border-top-style:none; width:100px" align="center">
                                                                    <input id="p_type<?=$i?>" name="p_type<?=$i?>"  value="-" type="text" placeholder="ex) 클러치 디스크" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </td>
                                                                <td class="border_in" style="border-top-style:none; width:100px" align="center">
                                                                    <input id="size<?=$i?>" name="size<?=$i?>"  value="-" type="text" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </td>
                                                                <td class="border_in" style="border-top-style:none; width:100px" align="center">
                                                                    <input id="cnt<?=$i?>" name="cnt<?=$i?>" value="-" type="text" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </td>
                                                                <td class="border_in" style="border-top-style:none; width:100px" align="center">
                                                                    <input id="unit_price<?=$i?>" name="unit_price<?=$i?>" value="-" type="text" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </td>
                                                                <td class="border_in" style="border-top-style:none; width:100px" align="center">
                                                                    <input id="price<?=$i?>" name="price<?=$i?>" value="-" type="text" placeholder="ex) 450,000" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </td>
                                                                <td class="border_in" style="border-top-style:none; width:100px" align="center">
                                                                    <input id="tax<?=$i?>" name="tax<?=$i?>" value="-" type="text" placeholder="ex) 45,000" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </td>
                                                            </tr>
                                                        <? } ?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top-style:none;">
                                                        <tr height="20">
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">전 잔금</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 450px;">
                                                                <strong style="font-size:25">
                                                                    <input id="full_balance" name="full_balance" value="-" type="text" placeholder="ex) 45,000" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </strong>
                                                            </td>
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">합 계</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 450px;">
                                                                <strong style="font-size:25">
                                                                    <input id="total_price" name="total_price" value="-" type="text" placeholder="ex) 45,000" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                        <tr height="20">
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">입 금</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 400px;">
                                                                <strong style="font-size:25">
                                                                    <input id="deposit" name="deposit" value="-" type="text" placeholder="ex) 45,000" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </strong>
                                                            </td>
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">잔 금</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 400px; ">
                                                                <strong style="font-size:25">
                                                                    <input id="balance" name="balance" value="-" type="text" placeholder="ex) 45,000" style="width: 100%; border:none; background-color: #dcdcdc;">
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr height="20">
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">메 모</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 400px;" colspan="3">
                                                                <strong style="font-size:25">
                                                                    <textarea id="memo" name="memo" type="text" style="width: 100%; border:none; background-color: #dcdcdc;">-</textarea>
                                                                </strong>
                                                            </td>
                                                        </tr>                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>>
                            </table>
                            <button id="ajax" class="btn btn-l btn-info" type="button">등 록 하 기 </button>&nbsp;&nbsp;
                            <a class="btn btn-l btn-info" type="button" href="../view/index.php?page=1"><div style="float: right;">목 록 보 기 </div></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#ajax").click(function() {
        var form = $('#form1')[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: '../process/process_All.php',
            data: data, 
            processData: false,
            contentType: false,
            timeout: 1000, 
            success: function(data) { 
                console.log('data : '+data);
                location = "../view/index.php?page=1";
                alert('게시글이 추가되었습니다.');
            },
            error: function(e) { 
                console.log("ERROR : ", e);
            }
        });
        }
    );
</script>


<?php include_once('../include/footer.php'); ?>