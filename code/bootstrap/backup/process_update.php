<?php
function userInsert(){
    include_once('../db/db.php');
    $db = db_open();    

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    
     $queryUpdate = sprintf("UPDATE t_board SET 
                                        b_title = '%s', 
                                        b_content =  '%s'
                                        where board_id = '%s'
                                        ", $title, $content, $id);

    que($db, $queryUpdate) or dir(mysqli_error($db));


que_close($db);
}
userInsert();
?>