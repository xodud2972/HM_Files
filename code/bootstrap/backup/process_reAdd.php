<?php
function addReplyPost(){
    include_once('../db/db.php');
    $db = db_open();    

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $content = preg_replace("(\<(/?[^\>]+)\>)", "", $content);


    $querySelectGroup = sprintf("SELECT b_group_no, b_group_ord FROM t_board WHERE board_id = '%d'", $id);
    $exceSelectGroupNo = que($db, $querySelectGroup);
    $GroupNo = mysqli_fetch_array($exceSelectGroupNo);

    $queryInsert = sprintf(
        "INSERT INTO t_board
            (b_title, b_content, b_group_no, b_group_ord, b_depth, b_reg_date, b_hit)
        VALUES(
            '%s','%s', '%d', 0, 1, SYSDATE(), 0
            )",
        $title, $content, $GroupNo[0]);
        //die($queryInsert);
    que($db, $queryInsert) or dir(mysqli_error($db));

    $queryUpdateGroupOrd = sprintf("UPDATE t_board SET
                                b_group_ord = IFNULL(b_group_ord,0)+1
                            WHERE b_group_no = %d
                            "
                            , $GroupNo[0]);

    que($db, $queryUpdateGroupOrd) or die(mysqli_error($db));

    $queryUpdateGroupOrd = sprintf("UPDATE t_board SET
    b_group_ord = 0
WHERE board_id = %d
"
, $id);

que($db, $queryUpdateGroupOrd) or die(mysqli_error($db));

    //die($queryInsert);

que_close($db);
}
addReplyPost();
?>