<?php

function selectAll()
{
    include_once('../db/db.php');
    $db = db_open();
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $list = 15;
    $pageStart = ($page - 1) * $list;

    $querySelectAll = sprintf(
        'SELECT board_id, b_title, b_content, b_group_no, b_group_ord, b_depth, b_reg_date, b_writer, b_hit, b_notice
        FROM t_board 
    ORDER BY b_notice DESC, b_group_no desc, b_group_ord asc
                            LIMIT %s, %s',
        $pageStart, $list
    );

    $result = que($db, $querySelectAll);

    while ($row = mysqli_fetch_array($result)) {
        $tempData["board_id"] = $row['board_id'];
        $tempData["title"] = $row['b_title'];
        $tempData["content"] = $row['b_content'];
        $tempData["group_no"] = $row['b_group_no'];
        $tempData["group_ord"] = $row['b_group_ord'];
        $tempData["depth"] = $row['b_depth'];
        $tempData["regDate"] = $row['b_reg_date'];
        $tempData["writer"] = $row['b_writer'];
        $tempData["hit"] = $row['b_hit'];
        $tempData['notice'] = $row['b_notice'];
        $resultData[] = $tempData;
    }
    que_close($db);
    return $resultData;
}


function selectOne(){
    include_once('../db/db.php');
    $db = db_open();
    $id = $_GET['id'];
    
// 게시글 정보 select
    $querySelectOneUser = sprintf('SELECT board_id, b_title, b_content, b_hit, b_dahangsa, b_depth FROM t_board WHERE board_id = %d' ,$id);
    $result = que($db, $querySelectOneUser);
    $row = mysqli_fetch_array($result);
    $tempData['id'] = $row['board_id'];
    $tempData['title'] = $row['b_title'];
    $tempData['content'] = $row['b_content'];
    //$content = preg_replace("(\<(/?[^\>]+)\>)", "", $content);
    $tempData['hit'] = $row['b_hit'];
    $tempData['dahangsa'] = $row['b_dahangsa'];
    $tempData['depth'] = $row['b_depth'];

// 해당게시글 댓글 select (복수데이터 while사용)
    $querySelectReply = sprintf('SELECT reply_id, r_content, r_write_name, r_regdate FROM t_reply WHERE r_board_id = %d ORDER BY reply_id DESC', $id);
    $result2 = que($db, $querySelectReply);
    while ($row2 = mysqli_fetch_array($result2)) {
        $tempData['r_id'][] = $row2['reply_id'];
        $tempData['r_content'][] = $row2['r_content'];
        $tempData['r_writer'][] = $row2['r_write_name'];
        $tempData['r_date'][] = $row2['r_regdate'];
    }

//해당 게시글 파일목록 select (복수데이터 while사용)
    $querySelectFile = sprintf('SELECT file_id, f_board_id, f_name FROM t_file WHERE f_board_id = %d AND f_reply_id IS NULL', $id);
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
    $querySelectReplyFIle = sprintf( 'SELECT f_name, f_board_id, f_reply_id
                                    FROM t_file
                                    WHERE f_reply_id IN(SELECT t_reply.reply_id FROM t_board
                                                        INNER JOIN t_reply
                                                        ON t_board.board_id = t_reply.r_board_id
                                                        WHERE t_board.board_id = %d)
                                    GROUP BY f_reply_id', $id);
    $filelList = que($db, $querySelectReplyFIle);
    while($row7 = mysqli_fetch_array( $filelList)){
        $tempData['fileList'][] = $row7['f_name'];
    }
    $resultData = $tempData;

    return $resultData;
    que_close($db); 
}

function pagination()
{
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    include_once('../db/db.php');
    $db = db_open();
    $selectListCount = ("SELECT * FROM t_board where b_notice = 0");
    $sql = que($db, $selectListCount);

    $totalRecord = mysqli_num_rows($sql);                      // 게시물 총 개수
    $list = 15;                                                  // 한 페이지에 보여줄 게시물 개수
    $blockCnt = 5;                                             // 하단에 표시할 블록 당 페이지 개수
    $blockNum = ceil($page / $blockCnt);                      // 현재 페이지 블록
    $blockStart = (($blockNum - 1) * $blockCnt) + 1;         // 블록의 시작 번호
    $blockEnd = $blockStart + $blockCnt - 1;                 // 블록의 마지막 번호
    $totalPage = ceil($totalRecord / $list);                  // 페이징한 페이지 수 2022.01.13 기존에 잘나오던 페이지수가 늘어나서 1을빼버림
    if ($blockEnd > $totalPage) {
        $blockEnd = $totalPage;                               // 블록 마지막 번호가 총 페이지 수보다 크면 마지막 페이지 번호가 총 페이지 수
    }
    if ($page <= 1) {
    } else {
        echo "<li class='page-item'><a class='page-link' href='/bootstrap/view/table.php?page=1' aria-label='Previous'>처음</a></li>";
    }
    if ($page <= 1) {
    } else {
        $pre = $page - 1;
        echo "<li class='page-item'><a class='page-link' href='/bootstrap/view/table.php?page=$pre'>◀ 이전 </a></li>";
    }
    for ($i = $blockStart; $i <= $blockEnd; $i++) {
        if ($page == $i) {
            echo "<li class='page-item'><a class='page-link' disabled><b style='color: #df7366;'> $i </b></a></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href='/bootstrap/view/table.php?page=$i'> $i </a></li>";
        }
    }
    if ($page >= $totalPage) {
    } else {
        $next = $page + 1;
        echo "<li class='page-item'><a class='page-link' href='/bootstrap/view/table.php?page=$next'> 다음 ▶</a></li>";
    }
    if ($page >= $totalPage) {
    } else {
        echo "<li class='page-item'><a class='page-link' href='/bootstrap/view/table.php?page=$totalPage'>마지막</a>";
    }
}



function boardDelete(){
	include_once('../db/db.php');
	$db = db_open();

	$id = $_POST['id'];

    $querySelectGroupNo = sprintf('SELECT b_group_no, b_group_ord, b_depth FROM t_board WHERE board_id = %d', $id);
    $selectGroupNo = que($db,$querySelectGroupNo);
    $GroupNo = mysqli_fetch_array($selectGroupNo);


	$queryDeleteOne = sprintf(
		'DELETE FROM t_board WHERE board_id=%d',
		$id
	);
    $queryDeleteAll = sprintf('DELETE FROM t_board WHERE b_group_no = %d', $GroupNo[0]);

    if($GroupNo[2] > 0){
        que($db, $queryDeleteOne);    
    }else{
        que($db, $queryDeleteAll);    
    }

	que_close($db);
}


function boardUpdate(){
    include_once('../db/db.php');
    $db = db_open();    

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $dahangsa = $_POST['dahangsa'];

    
     $queryUpdate = sprintf("UPDATE t_board SET 
                                        b_title = '%s', 
                                        b_content =  '%s',
                                        b_dahangsa = '%s'
                                        where board_id = '%s'
                                        ", $title, $content, $dahangsa, $id);

    que($db, $queryUpdate) or dir(mysqli_error($db));

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
                    (f_board_id, f_name, f_tmp_name, f_path, f_upload_date)
                VALUES
                    ('%d', '%s', '%s', '%s', SYSDATE())"
                ,$id ,$fileName[$fileIndex], $tmp_Name, $filePath);
            
            que($db, $queryInsertFiles) or die(mysqli_error($db));;
    
            echo $queryInsertFiles;
        }
    }

que_close($db);
}

function boardInsert(){
    include_once('../db/db.php');

    $db = db_open();    

    $title = $_POST['title'];
    $content = $_POST['content'];
    //$content = preg_replace("(\<(/?[^\>]+)\>)", "", $content);
    if(isset($_POST['notice'])){
        $notice = $_POST['notice'];
    }else{
        $notice = 0;
    }
    $dahangsa = $_POST['dahangsa'];

    $querySelectMaxGroupNo = "SELECT MAX(b_group_no)+1 FROM t_board as MaxGroupNo";
    $exceSelectMaxGroupNo = que($db, $querySelectMaxGroupNo);
    $MaxGroupNo = mysqli_fetch_array($exceSelectMaxGroupNo);

    $queryInsert = sprintf(
        "INSERT INTO t_board
            (b_title, b_content, b_writer, b_group_no, b_group_ord, b_depth, b_reg_date, b_hit, b_notice, b_dahangsa)
        VALUES(
            '%s','%s', '글쓴이',
            '%s',
            0, 0, SYSDATE(), 0, '%d', '%s'
            )",
        $title, $content, $MaxGroupNo[0], $notice, $dahangsa);

    echo $queryInsert;
    
    que($db, $queryInsert) or die(mysqli_error($db));




    $fileName = $_FILES['files']['name'];
    $fileCount = count($fileName);
    $filePath = "../uploads";
    $querySelectLastId = "SELECT LAST_INSERT_ID() as lastId";
    $exceSelectLastId = que($db, $querySelectLastId);
    $lastId = mysqli_fetch_array($exceSelectLastId);
    if($fileName[0] != ""){
        for($fileIndex=0; $fileIndex <$fileCount; $fileIndex++){
            $tmp_Name = $_FILES["files"]["tmp_name"][$fileIndex];
            $name = basename($fileName[$fileIndex]);
            move_uploaded_file($tmp_Name, "$filePath/$name");
       
            $queryInsertFiles = sprintf(
                "INSERT INTO t_file
                    (f_board_id, f_name, f_tmp_name, f_path, f_upload_date)
                VALUES
                    ('%d', '%s', '%s', '%s', SYSDATE())"
                ,$lastId['lastId'] ,$fileName[$fileIndex], $tmp_Name, $filePath);
            
            que($db, $queryInsertFiles) or die(mysqli_error($db));;
    
            echo $queryInsertFiles;
        }
    }

que_close($db);
}


function addReplyPost(){
    include_once('../db/db.php');
    $db = db_open();    

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $dahangsa = $_POST['dahangsa'];
    //$content = preg_replace("(\<(/?[^\>]+)\>)", "", $content);


    $querySelectGroup = sprintf("SELECT b_group_no FROM t_board WHERE board_id = '%d'", $id);
    $exceSelectGroupNo = que($db, $querySelectGroup);
    $GroupNo = mysqli_fetch_array($exceSelectGroupNo);

    $querySelectDepth = sprintf("SELECT max(b_group_ord)+1, max(b_depth)+1 FROM t_board WHERE b_group_no = '%d'", $GroupNo[0]);
    $exceSelectDepth = que($db, $querySelectDepth);
    $Depth = mysqli_fetch_array($exceSelectDepth);

    $queryInsert = sprintf(
        "INSERT INTO t_board
            (b_title, b_content, b_writer, b_group_no, b_group_ord, b_depth, b_reg_date, b_hit, b_notice, b_dahangsa)
        VALUES(
            '%s','%s', '글쓴이', '%d', '%d', '%d', SYSDATE(), 0, 0, '%s'
            )",
        $title, $content, $GroupNo[0], $Depth[0], $Depth[1], $dahangsa);
        //die($queryInsert);
        echo $queryInsert;
    que($db, $queryInsert) or dir(mysqli_error($db));

    $queryUpdateGroupOrd = sprintf("UPDATE t_board SET
    b_group_ord = 0
WHERE board_id = %d
"
, $id);

que($db, $queryUpdateGroupOrd) or die(mysqli_error($db));

    //die($queryInsert);

que_close($db);
}


function addReply(){
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



function delFiles(){
    include_once('../db/db.php');
    $db = db_open();

    if(isset($_POST['file_id'])){
        $id = $_POST['file_id'];
        $queryDelFile = sprintf('DELETE FROM t_file WHERE file_id = %s',  $id);
        que($db,$queryDelFile);
    }

    que_close($db);
}

function delReply(){
    include_once('../db/db.php');
    $db = db_open();

    if(isset($_POST['reply_id'])){
        $id = $_POST['reply_id'];
    }
        $queryDelReply = sprintf('DELETE FROM t_reply WHERE reply_id = %s',  $id);
        que($db,$queryDelReply);
    
    echo ("<script>
                alert('댓글이 삭제되었습니다.');
                window.location = document.referrer;
          </script>");
    que_close($db);
}

if(isset($_POST["action"])){
    switch($_POST["action"]) {
        case "add":
            boardInsert();
            break;
        case "edit":
            boardUpdate();
            break;
        case "del":
            boardDelete();
            break;
        case "select":
            selectOne();
            break;
        case "reAdd":
            addReplyPost();
            break;
        case "addReply":
            addReply();
            break;
        case "delFile":
            delFiles();
            break;     
        case "delReply":
            delReply();
            break;                      
    }
}

?>