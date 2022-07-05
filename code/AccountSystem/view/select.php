<?php
include_once('../include/header.php');
include_once('../process/process_All.php');
$resultData = selectOne();
/**
echo '<pre>';
print_r($resultData);
echo '</pre>';
**/
?>
<style>
    #input-first {
        width: 100px;
    }

    .input-second {
        width: 300px;
    }

    .border_out {
        font-family: 굴림;
        border: 3px double black;
    }

    body,
    table,
    tr,
    td {
        font-family: 굴림, verdana, arial;
        font-size: 10px;
        color: #000000;
        border: 0px;
    }

    .border_in {
        border-width: 1px;
        border-color: black;
        border-style: solid none solid solid;
        font-size: 15px;
        font-weight: bold;
    }

    .l_dot {
        border-style: dotted;
        border-width: 0 0 0 1px;
        border-color: #4C4C4C;
    }

    .border_in {
        border-style: dotted;
        border-width: 0 0 1px 1px;
        border-color: #6C6C6C;
    }

    .tl_dot {
        border-style: solid solid solid dotted;
        border-width: 1px 0px 1px 1px;
        border-color: black black black #6C6C6C;
    }

    #command_bar {
        font-size: 10pt;
        background-color: #FEFFD2;
        border: 1px solid #AF9E29;
        padding: 5px;
        margin-bottom: 10px;
    }

    .sign_area {
        position: relative;
    }

    .sign_img {
        position: absolute;
        top: 15px;
        left: 190px;
    }
</style>
</head>
<body>
<div class="container-fluid" style="width:80%; margin:0px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 20px; font-weight:bold">내역등록</div>
                <div class="panel-body">
                    <div>
                        <form id="form1" role="form" method="post">
                            <input type="hidden" action="add">
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
                                                                                            <span style="font-size:13px;font-weight:bold; color:blue">
                                                                                            <?= $resultData[0]["reg_year"].'년 '.$resultData[0]["reg_month"].'월 '.$resultData[0]["reg_day"].'일' ?>
                                                                                        </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr height="30">
                                                                                        <td width="1" align="center" class="border_in" style="border-right-style:none">
                                                                                        차량번호
                                                                                        </td>
                                                                                        <td>
                                                                                            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                <tr>
                                                                                                   <td align="center" class="border_in" style="border-top-style:none; color:blue" align="left">
                                                                                                        <strong style="font-size:30"><?= $resultData[0]["car_num"] ?></strong>
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
                                                                                        <td align="center" class="border_in" style="color: blue;">
                                                                                            <?= number_format($resultData[0]['total_won']).' 원' ?>
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
                                                                                            <span style="font-size:13px;font-weight:bold">584-10-02067</span>
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
                                                                                                        <strong style="font-size:11px">서부자동차</strong>
                                                                                                    </td>
                                                                                                    <td class="border_in" style="border-top-style:none" align="center" width="40">
                                                                                                        성<br />명
                                                                                                    </td>
                                                                                                    <td class="border_in" style="border-top-style:none" align="left">
                                                                                                    &nbsp;&nbsp;<strong style="font-size:11px">김 경 모</strong> 
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
                                                            <td class="border_in" style="border-top-style:none" align="center">공급가액</td>
                                                            <td class="border_in" style="border-top-style:none" align="center">세 액</td>
                                                        </tr>
                                                        <? 
                                                    if(isset($resultData[0])){
                                                        for($i=1; $i<11; $i++){ ?>
                                                            <tr height="20">
                                                                <td class="border_in" style="border-top-style:none;border-left-style:none" align="center"><?=$resultData[$i]['c_month']?></td>
                                                                <td class="border_in" style="border-top-style:none" align="center"><?=$resultData[$i]['c_day']?></td>
                                                                <td class="border_in" style="border-top-style:none" align="center"><?=$resultData[$i]['p_type']?></td>
                                                                <td class="border_in" style="border-top-style:none" align="center"><?=$resultData[$i]['size']?></td>
                                                                <td class="border_in" style="border-top-style:none" align="right"><?=$resultData[$i]['cnt']?> &nbsp; </td>
                                                                <td class="border_in" style="border-top-style:none" align="right"><?=$resultData[$i]['unit_price'].' 원'?> &nbsp; </td>
                                                                <td class="border_in" style="border-top-style:none" align="right"><?=$resultData[$i]['price'].' 원'?> &nbsp; </td>
                                                                <td class="border_in" style="border-top-style:none" align="right"><?=$resultData[$i]['tax'].' 원'?> &nbsp; </td>
                                                            </tr>
                                                        <? }
                                                    }else{ 
                                                        for($j=0; $j<10; $j++){ ?>
                                                        <tr height="20">
                                                                <td class="border_in" style="border-top-style:none;border-left-style:none" align="center"></td>
                                                                <td class="border_in" style="border-top-style:none" align="center"></td>
                                                                <td class="border_in" style="border-top-style:none" align="center"></td>
                                                                <td class="border_in" style="border-top-style:none" align="center"></td>
                                                                <td class="border_in" style="border-top-style:none" align="right"></td>
                                                                <td class="border_in" style="border-top-style:none" align="right"></td>
                                                                <td class="border_in" style="border-top-style:none" align="right"></td>
                                                                <td class="border_in" style="border-top-style:none" align="right"></td>
                                                            </tr>
                                                <?   }
                                                } ?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top-style:none;">
                                                        <tr height="20">
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">전 잔금</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 450px;" align="center">
                                                                <strong style="font-size:25">
                                                                <?= $resultData[0]['full_balance'].' 원'; ?>
                                                                </strong>
                                                            </td>
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">합 계</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 450px;" align="center">
                                                                <strong style="font-size:25">
                                                                &nbsp;<?php
                                                                if(isset($resultData[0]['total_price'])){
                                                                    echo $resultData[0]['total_price'].' 원';
                                                                }else{
                                                                    echo $resultData[0]['total_won'] + ($resultData[0]['total_won']/10).' 원';
                                                                }
                                                                ?> 
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                        <tr height="20">
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">입 금</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 400px;" align="center">
                                                                <strong style="font-size:25">
                                                                <?= $resultData[0]['deposit'].' 원'; ?>
                                                                </strong>
                                                            </td>
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">잔 금</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 400px; " align="center">
                                                                <strong style="font-size:25">
                                                                <?= $resultData[0]['balance'].' 원'; ?>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                        <tr height="50">
                                                            <td class="border_in" width="200" style="border-right:1px solid black" align="center">메 모</td>
                                                            <td class="border_in" style="border-right:1px solid black; width: 400px;" colspan="3">
                                                                <strong style="font-size:25">
                                                                        <?= $resultData[0]['memo']; ?>
                                                                </strong>
                                                            </td>
                                                        </tr>     
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <a class="btn btn-l btn-info" type="button" href="../view/index.php?page=1"><div style="float: right;">목 록 보 기 </div></a>
                            <a class="btn btn-l btn-info" type="button" href="../process/down.php?&id=<?= $_GET['id'] ?>">다 운 로 드</a>
                            <a class="btn btn-l btn-info" type="button" href="../view/del.php?action=del?&id=<?= $_GET['id'] ?>"><font style="color: red;"> 삭제 </font></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('../include/footer.php'); ?>