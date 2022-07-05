<?php
include_once('../process/process_All.php');
$resultData = selectOne();
include_once('../include/head.php');
?>
<div class="row" style="width: 1500px;">
    <div class="col-lg-12" style="width: 1500px;">
        <div class="page-header" style="background-color:skyblue; color: white;">
            <h1>HM AGENCY CONNECT</h1>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row" style="width: 1500px;">
    <div class="col-lg-12" style="width: 1500px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                게시글 보기
                <div style="text-align: right;">조회수 <?= $resultData['hit'] ?></div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">제목 </span>
                        <input type="text" id="title" name="title" value="<?= $resultData['title'] ?>" disabled class="col-sm-9">
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon">대행사</span>
                        <input type="text" id="title" name="title" value="<?= $resultData['dahangsa'] ?>" disabled>
                    </div>
                    <div>
                        <textarea name="content" id="content" rows="20" cols="150" disabled><?= $resultData['content'] ?></textarea>
                        <script type="text/javascript" src="../lib/dist/js/service/HuskyEZCreator.js" charset="utf-8"></script>
                        <script>
                            var oEditors = [];

                            nhn.husky.EZCreator.createInIFrame({
                                oAppRef: oEditors,
                                elPlaceHolder: "content",
                                sSkinURI: "../lib/dist/SmartEditor2Skin.html",
                                fCreator: "createSEditor2",
                                fOnAppLoad: function() {
                                    var editor = oEditors.getById["content"];
                                    editor.exec("DISABLE_WYSIWYG");
                                    editor.exec("DISABLE_ALL_UI");
                                } //disable
                            });

                            function submitContents(elClickedObj) {
                                oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
                            }
                        </script>
                    </div>
                    <div class="form-group input-group ">
                        <span class="form-group input-group">첨부파일
                        <? if (isset($resultData['file_id'])) {
                                for ($fileIdx = 0; $fileIdx < sizeof($resultData['file_id']); $fileIdx++) { ?>
                                    <br>
                                    <a href="../uploads/<?= $resultData['file_id'][$fileIdx] ?>" download><?= $resultData['f_name'][$fileIdx] ?></a>
                                    <a href="../view/del_filelist.php?&id=<?= $_GET['id'] ?>&file_id=<?= $resultData['file_id'][$fileIdx] ?>">
                                        <input class="close" type="button" id="fileBtn<?= $fileIdx ?>" value="X" style="color:red;"></input>
                                    </a>
                                    <br>
                                <? }
                            } else { echo '<span class="input-group-addon">업로드된 파일이 없습니다.</span>'; } ?>
                        </span>
                    </div>

                    <form id="form1" role="form" method="post">
                        <input type="hidden" name="action" value="addReply">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="reply_id" value="<?= $_GET['reply_id'] ?>">
                        <div class="form-group input-group">
                            <textarea name="reply_Content" id="reply_Content" rows="5" cols="100" class="form-control col-sm-5"></textarea>
                            <button id="ajax" type="button" class="btn btn-primary btn-lg">댓글 등록</button>
                            <input class="btn" type="file" name="files[]" value="" size="40"/>
                        </div>
                        <div class="form-group input-group">
                            <div class="comment">
                                <div class="commentList">
                                <?php if (isset($resultData['r_id'])) {
                                        for ($idx = 0; $idx < sizeOf($resultData['r_id']); $idx++) { ?>
                                            <div class="well" style="width: 90%;">
                                                <div>
                                                    <div style="width: 50px;"><?= $resultData['r_writer'][$idx] ?></div>
                                                </div>
                                                <div class="media-left">
                                                    <a href="../view/del_reply.php?&reply_id=<?= $resultData['r_id'][$idx] ?>">
                                                        <input class="close" type="button" id="button<?= $idx ?>" value="X" style="color:red;"></input>
                                                    </a>
                                                    <br>
                                                    <div class="user-icon" style="width: 130px;"><?= $resultData['r_date'][$idx] ?></div>
                                                </div>
                                                <div class="media-body">
                                                    <p><span><?= $resultData['r_content'][$idx] ?></span></p>
                                            <?php if (isset($resultData['fileList'])) { ?>
                                                        <p class="comments-article">
                                                            <b>첨부파일 : 
                                                                <a href="../uploads/<?= $resultData['fileList'][$idx] ?>">
                                                                    <?= $resultData['fileList'][$idx] ?>
                                                                </a>
                                                            </b>
                                                            <div>
                                                                <img src="../uploads/<?= $resultData['fileList'][$idx]?>" style="width: 10%; height: 10%;">
                                                            </div>
                                                        </p>
                                            <?php } else { echo '첨부파일 없습니다'; } ?>
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary btn-lg" type="button" href="../view/update.php?action=edit?&id=<?= $_GET['id'] ?>"> 수정 </a>
                        <a class="btn btn-primary btn-lg" type="button" href="../view/table.php?page=1"> 취소 </a>
                        <?php 
                        if($resultData['depth'] == 0) { ?>
                            <a class="btn btn-primary btn-lg" type="button" href="../view/addReboard.php?action=reAdd?&id=<?= $_GET['id'] ?>"> 답글달기 </a>
                        <?php } ?>
                        <a class="btn btn-primary btn-lg" type="button" href="../view/del.php?action=del?&id=<?= $_GET['id'] ?>"> 삭제 </a>
                    </form>
                    <h3>
                        <?php if (isset($resultData['preId'])) { ?>
                            이전글<a class="btn btn-success btn-sm" type="button" href="../view/select.php?&id=<?= $resultData['preId'] ?>"><?= $resultData['preTitle'] ?></a>
                        <?php } ?>
                        <div>l</div>
                        <?php if (isset($resultData['nextId'])) { ?>
                            다음글<a class="btn btn-success btn-sm" type="button" href="../view/select.php?&id=<?= $resultData['nextId'] ?>"><?= $resultData['nextTitle'] ?></a>
                        <?php } ?>
                    </h3>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#wrapper -->

<?php include_once('../include/footer.php'); ?>

<script type="text/javascript">
    function insertReply() {
        var form = $('#form1')[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST", // 전송 타입 (get, post, put)
            enctype: 'multipart/form-data',
            url: '../process/process_All.php',
            data: data, // 서버에 전송할 데이터 key/value형식의 객체
            processData: false, // 데이터를 querystring 형태로 보내지 않고 DOMDocument 또는 다른 형태로 보내고 싶으면 false로 설정한다.
            contentType: false, //해더의 Content-Type을 설정한다
            timeout: 1000, // 해당시간이 지나도 실패하면 에러 상태로 전환하게 된다.
            success: function(data) { //전송에 성공하면 실행될 코드
                console.log(data);
                location = "../view/select.php?id=<?= $_GET['id'] ?>";

                alert('댓글이 등록되었습니다.');
            },
            error: function(e) { //전송에 실패하면 실행될 코드
                console.log("ERROR : ", e);
            }
        });
    }
    $("#ajax").click(function() {
        insertReply();
    });
</script>

