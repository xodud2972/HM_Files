<?php
include_once('../process/process_All.php');
$resultData = selectOne();
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
            <div class="panel-heading"> 답글 등록 </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                    <form id="form1" role="form" method="post">
                        <input class="form-control" name="id" value="<?= $resultData['id'] ?>" type="hidden" />
                        <input type="hidden" name="action" value="reAdd">
                        <div class="form-group input-group">
                            <span class="input-group-addon">제목 </span>
                            <input type="text" id="title" name="title" value="<?= $resultData['title'] ?>" class="col-sm-9">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">대행사선택</span>
                            <select name="dahangsa" id="dahangsa">
                                <option value="" selected></option>
                                <option value="kakao">카카오</option>
                                <option value="naver">네이버</option>
                                <option value="google">구글</option>
                                <option value="nate">네이트</option>
                                <option value="criteo">크리테오</option>
                            </select>
                        </div>
                        <textarea name="content" id="content" rows="20" cols="150">
                        <?= '<br>' ?>
                        -----------------------아래 내용은 원글입니다-----------------------------------
                        <?= '<br>' . $resultData['content'] ?>
                        </textarea>
                        <script type="text/javascript" src="../lib/dist/js/service/HuskyEZCreator.js" charset="utf-8"></script>
                        <script>
                            var oEditors = [];
                            nhn.husky.EZCreator.createInIFrame({
                                oAppRef: oEditors,
                                elPlaceHolder: "content",
                                sSkinURI: "../lib/dist/SmartEditor2Skin.html",
                                fCreator: "createSEditor2"
                            });
                            function submitContents(elClickedObj) {
                                oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
                            }
                            function pasteHTML() {
                                // var sHTML = " 아래 php코드";
                                oEditors.getById["content"].exec("PASTE_HTML", []);
                            }
                        </script>

                        <div class="form-group input-group ">
                            <span class="form-group input-group">첨부파일
                            <? if (isset($resultData['file_id'])) {
                                    for ($fileIdx = 0; $fileIdx < sizeof($resultData['file_id']); $fileIdx++) { ?>
                                        <br>
                                        <a href="../uploads/<?= $resultData['file_id'][$fileIdx] ?>" download><?= $resultData['f_name'][$fileIdx] ?></a>
                                        <br>
                                <? }
                                } else {
                                    echo '<span class="input-group-addon">업로드된 파일이 없습니다.</span>';
                                } ?>
                            </span>
                        </div>
                        <button id="ajax" class="btn btn-xs btn-info" type="button">등록</button>
                        <a class="btn btn-xs btn-info" type="button" href="../view/table.php?page=1"> 취소 </a>
                    </form>
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
<?php include_once('../include/footer.php'); ?>
<script type="text/javascript">
    function btnEdit() {
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
                location = "../view/table.php?page=1";
                alert('답글이 등록되었습니다.');
            },
            error: function(e) { //전송에 실패하면 실행될 코드
                console.log("ERROR : ", e);
            }
        });
    }

    $("#ajax").click(function() {
        submitContents();
        btnEdit();
    });
</script>