<?php
include_once('../process/process_select.php');
$resultData = selectAll();
include_once('../include/head.php');
?>
<div class="row">
    <div class="col-lg-12">
    <div class="page-header" style="background-color:skyblue; color: white;">
                    <h1>HM AGENCY CONNECT</h1>
                </div>  
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <h2>회원목록</h2> <a href="../view/add.php?action=add" type="button" class="btn btn-xs btn-info" ">글쓰기</a>
                            
                            <thead>
                                <tr>
                                    <th>글 번호</th>
                                    <th>제목</th>
                                    <th>내용</th>
                                    <th>작성자</th>
                                    <th>글 작성 시간</th>
                                    <th>글 관리</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php for ($index = 0; $index < sizeof($resultData); $index++) { ?>
                                    <tr class=" odd gradeX">

                                        <td><?= $resultData[$index]["board_id"] ?></td>
                                        <?php
                                            if ($resultData[$index]["depth"] > 0) {
                                        ?>
                                            <td>　└　<?= $resultData[$index]["title"] ?></td>
                                            <td>　└　<?= $resultData[$index]["content"] ?></td>
                                            <td>　└　<?= $resultData[$index]["writer"] ?></td>
                                            <td>　└　<?= $resultData[$index]["regDate"] ?></td>
                                        <?php } else { ?>
                                            <td><?= $resultData[$index]["title"] ?></td>
                                            <td><?= $resultData[$index]["content"] ?></td>
                                            <td><?= $resultData[$index]["writer"] ?></td>
                                            <td><?= $resultData[$index]["regDate"] ?></td>
                                        <?php } ?>
                                        <td>
                                            <a class="btn btn-xs btn-info" type="button" href="../view/select.php?action=select?&id=<?= $resultData[$index]['board_id'] ?>"> 게시물 보기 </a>
                                            <a class="btn btn-xs btn-warning" type="button" href="../view/edit.php?action=edit?&id=<?= $resultData[$index]['board_id'] ?>"> 수정하기 </a>
                                            <a class="btn btn-xs btn-danger" type="button" href="../view/del.php?action=del?&id=<?= $resultData[$index]['board_id'] ?>">삭제하기</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <nav aria-label="Page navigation example" style="">
            <ul class="pagination justify-content-center">
                <?php pagination(); ?>
            </ul>
        </nav>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

</div>
<!-- /#wrapper -->
<?php include_once('../include/footer.php'); ?>