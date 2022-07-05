<?php
function userInsert(){
    include_once('../db/db.php');
    $db = db_open();    

    $title = $_POST['title'];
    $content = $_POST['content'];


    $querySelectMaxGroupNo = "SELECT MAX(b_group_no)+1 FROM t_board as MaxGroupNo";
    $exceSelectMaxGroupNo = que($db, $querySelectMaxGroupNo);
    $MaxGroupNo = mysqli_fetch_array($exceSelectMaxGroupNo);

    // 우선writer 제외
    $queryInsert = sprintf(
        "INSERT INTO t_board
            (b_title, b_content, b_group_no, b_group_ord, b_depth, b_reg_date, b_hit)
        VALUES(
            '%s','%s',
            '%s',
            0, 0, SYSDATE(), 0
            )",
        $title, $content, $MaxGroupNo[0]);
        //die($queryInsert);
    que($db, $queryInsert) or dir(mysqli_error($db));

    //die($queryInsert);

que_close($db);
}
userInsert();
?>