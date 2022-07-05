<?php
function delReply(){
    include_once('../db/db.php');
    $db = db_open();

    if(isset($_GET['reply_id'])){
        $id = $_GET['reply_id'];
    }
        $queryDelReply = sprintf('DELETE FROM t_reply WHERE reply_id = %s',  $id);
        que($db,$queryDelReply);
    echo ("<script>
                console.log($queryDelReply);
                alert('댓글이 삭제되었습니다.');
                window.location = document.referrer;
          </script>");
    que_close($db);
}
delReply();
?>
