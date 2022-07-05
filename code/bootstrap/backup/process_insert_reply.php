<?php 
function replyInsert(){
    include_once('../db/db.php');

    $db = db_open();    

    $id = $_POST['id'];
    $content = $_POST['reply_Content'];
    //$content = preg_replace("(\<(/?[^\>]+)\>)", "", $content);
    $content = nl2br($content);

    $queryInsert = sprintf(
        "INSERT INTO t_reply
            (r_board_id, r_content, r_write_name, r_regdate)
        VALUES(
            '%d','%s','%s', SYSDATE()
            )",
        $id, $content, '글쓴이');

    que($db, $queryInsert) or dir(mysqli_error($db));



    $querySelectLastId = "SELECT LAST_INSERT_ID() as lastId";
    $exceSelectLastId = que($db, $querySelectLastId);
    $lastId = mysqli_fetch_array($exceSelectLastId);

    //$replyId = $_POST['reply_id'];
    $fileName = $_FILES['files']['name'];
    $fileCount = count($fileName);
    $filePath = "../uploads";
   
    if($fileName[0] != ""){
        for($fileIndex=0; $fileIndex <$fileCount; $fileIndex++){
            $tmp_Name = $_FILES["files"]["tmp_name"][$fileIndex];
            $name = basename($fileName[$fileIndex]);
            move_uploaded_file($tmp_Name, "$filePath/$name");
       
            $queryInsertFiles = sprintf(
                "INSERT INTO t_file
                    (f_board_id, f_reply_id, f_name, f_tmp_name, f_path, f_upload_date)
                VALUES
                    ('%d', '%d', '%s', '%s', '%s', SYSDATE())"
                ,$id ,$lastId['lastId'] ,$fileName[$fileIndex], $tmp_Name, $filePath);
            
            que($db, $queryInsertFiles) or die(mysqli_error($db));;
    
            echo $queryInsertFiles;
        }
    }

que_close($db);
}
replyInsert();

?>
