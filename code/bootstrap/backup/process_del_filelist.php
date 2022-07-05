<?php
function delFiles(){
    include_once('../db/db.php');
    $db = db_open();

    if(isset($_GET['file_id'])){
        $id = $_GET['file_id'];
    }
        $queryDelFile = sprintf('DELETE FROM t_file WHERE file_id = %d',  $id);
        que($db,$queryDelFile);
    
    echo ("<script>
            alert('파일이 삭제되었습니다.');
            window.location = document.referrer;
        </script>");
    que_close($db);
}
delFiles();
?>

