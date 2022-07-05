<?php
    include_once('../process/process_All.php');
    $resultData = selectAll();
    include_once('../include/header.php');
?>
<style>
    table td{font-size: 15px;}
</style>
<div style="background:#fff">
    <div class="container-fluid" style="width:90%; margin:0px;">
        <div class="row">
            <div class="col-lg-12" >
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><i class="fa fa-bell fa-fw"></i>거래내역</h4>
                        </div>
                    </div>
                    <a href="../view/add.php?action=add" type="button" class="btn btn-success">거래내역 추가</a>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr style="background:#efefef;">
                                    <th class="col-md-1" style="text-align:center; font-size:20px">번호</th>
                                    <th class="col-md-2" style="text-align:center; font-size:20px">차 량 번 호</th>
                                    <th class="col-md-2" style="text-align:center; font-size:20px"">금 액</th>
                                    <th class="col-md-2" style="text-align:center; font-size:20px"">날 짜</th>
                                    <th class="col-md-4" style="text-align:center; font-size:20px"">메 모</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php for ($index = 0; $index < sizeof($resultData); $index++) { ?>
                                    <tr class="odd gradeX">
                                        <td align="center">
                                            <a style="color: black;" href="../view/select.php?action=select?&id=<?= $resultData[$index]['title_id'] ?>">
                                                <?= $resultData[$index]["title_id"] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a style="color: black;" href="../view/select.php?action=select?&id=<?= $resultData[$index]['title_id'] ?>">
                                                <?= $resultData[$index]["car_num"] ?></td>
                                            </a>        
                                        <td>
                                            <a style="color: black;" href="../view/select.php?action=select?&id=<?= $resultData[$index]['title_id'] ?>">
                                                <?= number_format($resultData[$index]["total_won"]).' 원' ?> 
                                            </a>
                                        </td>
                                        <td>
                                            <a style="color: black;" href="../view/select.php?action=select?&id=<?= $resultData[$index]['title_id'] ?>">
                                                <?= $resultData[$index]["reg_year"].'년 '.$resultData[$index]["reg_month"].'월 '.$resultData[$index]["reg_day"].'일' ?>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <a style="color: black;" href="../view/select.php?action=select?&id=<?= $resultData[$index]['title_id'] ?>">
                                                <?= $resultData[$index]['memo'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example" >
                        <ul class="pagination justify-content-center">
                            <?php pagination(); ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('../include/footer.php'); ?>