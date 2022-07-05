<?php
function selectOne(){
    include_once('../db/db.php');
    $db = db_open();
    $id = $_GET['id'];
    
// 게시글 정보 select
    $querySelectOneUser = sprintf(
        'SELECT board_id, b_title, b_content, b_hit, b_dahangsa FROM t_board WHERE board_id = %d' ,$id);
    $result = que($db, $querySelectOneUser);
    $row = mysqli_fetch_array($result);
    $tempData['id'] = $row['board_id'];
    $tempData['title'] = $row['b_title'];
    $tempData['content'] = $row['b_content'];
    //$content = preg_replace("(\<(/?[^\>]+)\>)", "", $content);
    $tempData['hit'] = $row['b_hit'];
    $tempData['dahangsa'] = $row['b_dahangsa'];

// 해당게시글 댓글 select (복수데이터 while사용)
    $querySelectReply = sprintf(
        ' SELECT reply_id, r_content, r_write_name, r_regdate FROM t_reply WHERE r_board_id = %d ORDER BY reply_id DESC', $id);
    $result2 = que($db, $querySelectReply);
    while ($row2 = mysqli_fetch_array($result2)) {
        $tempData['r_id'][] = $row2['reply_id'];
        $tempData['r_content'][] = $row2['r_content'];
        $tempData['r_writer'][] = $row2['r_write_name'];
        $tempData['r_date'][] = $row2['r_regdate'];
    }

//해당 게시글 파일목록 select (복수데이터 while사용)
    $querySelectFile = sprintf(
        ' SELECT file_id, f_board_id, f_name FROM t_file WHERE f_board_id = %d AND f_reply_id IS NULL', $id);
    $result3 = que($db, $querySelectFile);
    while ($row3 = mysqli_fetch_array($result3)) {
        $tempData['file_id'][] = $row3['file_id'];
        $tempData['f_name'][] = $row3['f_name'];
    }

// 해당게시글 조회수 증가 쿼리
    $querySelectHit = sprintf('UPDATE t_board SET b_hit=b_hit+1 WHERE board_id = %d', $id);
    que($db, $querySelectHit);
    
// 해당 게시물의 다음 group_no를 찾는 쿼리 (다음글)
    $querySelectNext = sprintf('SELECT board_id, b_title FROM t_board WHERE board_id < %d ORDER BY board_id DESC LIMIT 1', $id);
    $next = que($db, $querySelectNext);
    $row5 = mysqli_fetch_array($next);
    $tempData['nextId'] = $row5['board_id'];
    $tempData['nextTitle'] = $row5['b_title'];

// 해당 게시물의 이전 group_no를 찾는 쿼리 (이전글)
    $querySelectPre = sprintf('SELECT board_id, b_title FROM t_board WHERE board_id > %d  ORDER BY board_id LIMIT 1', $id);
    que($db, $querySelectPre);
    $pre = que($db, $querySelectPre);
    while($row6 = mysqli_fetch_array($pre)){
        $tempData['preId'] = $row6['board_id'];
        $tempData['preTitle'] = $row6['b_title'];
    }

    $resultData = $tempData;

    return $resultData;
    que_close($db); 
}
?>