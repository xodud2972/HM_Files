<?php
include_once('../process/process_All.php');
$resultData = selectAll();
include_once('../include/head.php');
?>
<!-- Page Content -->
<div style="background:#fff">
    <div class="container-fluid" style="width:80%;">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12" style="padding-top: 10px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><i class="fa fa-bell fa-fw"></i> 공지사항</h4>
                        </div>
                    </div>
                    <a href="../view/add.php?action=add" type="button" class="btn btn-success">글쓰기</a>
                    <div class="panel-body">
                        <table width="80%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr style="background:#efefef;">
                                    <th class="col-md-1" style="text-align:center">글번호</th>
                                    <th class="col-md-6" style="text-align:center">제목</th>
                                    <th class="col-md-2" style="text-align:center">대행사</th>
                                    <th class="col-md-3" style="text-align:center">등록일</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 게시글 출력 TR태그 -->
                        <?php for ($index = 0; $index < sizeof($resultData); $index++) { ?>
                                    <tr class="odd gradeX">
                                        <td align="center"><?= $resultData[$index]["board_id"] ?></td>
                                <?php if ($resultData[$index]["depth"] > 0) {
                                            $jump = str_repeat('　',$resultData[$index]["depth"]); ?>
                                            <td>
                                                <a style="color: black;" href="../view/select.php?action=select?&id=<?= $resultData[$index]['board_id'] ?>">
                                                    <?=$jump?>└　<?= $resultData[$index]["title"] ?> 
                                                </a>
                                            </td>
                                            <td>└　<?= $resultData[$index]["writer"] ?></td>
                                            <td><?= $resultData[$index]["regDate"] ?></td>
                                <?php }else{
                                            if ($resultData[$index]["notice"] == 0) { ?>
                                                <td>
                                                    <a style="color: black;" href="../view/select.php?action=select?&id=<?= $resultData[$index]['board_id'] ?>"><?= $resultData[$index]["title"] ?></a>
                                                </td>
                                                <td><?= $resultData[$index]["writer"] ?></td>
                                                <td><?= $resultData[$index]["regDate"] ?></td>
                                            <?php } else { ?>
                                                <td>
                                                    <b><a class="text-info" href="../view/select.php?action=select?&id=<?= $resultData[$index]['board_id'] ?>">[공지사항] <?= $resultData[$index]['title'] ?> </a></b>
                                                </td>
                                                <td><b><?= $resultData[$index]['writer'] ?></b></td>
                                                <td><b><?= $resultData[$index]["regDate"] ?></b></td>
                                                <?php }
                                        } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                    <nav aria-label="Page navigation example" >
                        <ul class="pagination justify-content-center">
                            <?php pagination(); ?>
                        </ul>
                    </nav>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<?php include_once('../include/footer.php'); ?>