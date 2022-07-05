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
    $list = 10;
    $pageStart = ($page - 1) * $list;

    $querySelectAll = sprintf(
        'SELECT title_id, reg_year, reg_month, reg_day, car_num, total_won, memo
            FROM t_title 
            ORDER BY title_id desc LIMIT %s, %s',
        $pageStart, $list
    );

    $result = que($db, $querySelectAll);

    while ($row = mysqli_fetch_array($result)) {
        $tempData["title_id"] = $row['title_id'];
        $tempData["reg_year"] = $row['reg_year'];
        $tempData["reg_month"] = $row['reg_month'];
        $tempData["reg_day"] = $row['reg_day'];
        $tempData["car_num"] = $row['car_num'];
        $tempData["total_won"] = $row['total_won'];
        $tempData["memo"] = $row['memo'];
        $resultData[] = $tempData;
    }
    que_close($db);
    return $resultData;
}


function selectOne(){
    include_once('../db/db.php');
    $db = db_open();
    $id = $_GET['id'];
    
    $querySelectOneUser = sprintf('SELECT title_id, reg_year, reg_month, reg_day, car_num, total_won, full_balance, total_price, deposit,balance, memo
                                    FROM t_title 
                                    WHERE title_id = %d' ,$id);
    $result = que($db, $querySelectOneUser);

    $row = mysqli_fetch_array($result);
    $tempData["title_id"] = $row['title_id'];
    $tempData["reg_year"] = $row['reg_year'];
    $tempData["reg_month"] = $row['reg_month'];
    $tempData["reg_day"] = $row['reg_day'];
    $tempData["car_num"] = $row['car_num'];
    $tempData["total_won"] = $row['total_won'];
    $tempData["full_balance"] = $row['full_balance'];
    $tempData["total_price"] = $row['total_price'];
    $tempData["deposit"] = $row['deposit'];
    $tempData["balance"] = $row['balance'];
    $tempData["memo"] = $row['memo'];

    $resultData[] = $tempData;

    $querySelectOneContent = sprintf('SELECT content_id, c_month, c_day, p_type, size, cnt, unit_price, price, tax, t_title_id  
                                    FROM t_content 
                                    WHERE t_title_id = %d' ,$id);
    $result2 = que($db, $querySelectOneContent);

    while ($row = mysqli_fetch_array($result2)) {
        $tempData["content_id"] = $row['content_id'];
        $tempData["c_month"] = $row['c_month'];
        $tempData["c_day"] = $row['c_day'];
        $tempData["p_type"] = $row['p_type'];
        $tempData["size"] = $row['size'];
        $tempData["cnt"] = $row['cnt'];
        $tempData["unit_price"] = $row['unit_price'];
        $tempData["price"] = $row['price'];
        $tempData["tax"] = $row['tax'];
        $tempData["t_title_id"] = $row['t_title_id'];

        $resultData[] = $tempData;
    }


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
    $selectListCount = ("SELECT * FROM t_title");
    $sql = que($db, $selectListCount);

    $totalRecord = mysqli_num_rows($sql);                      // 게시물 총 개수
    $list = 10;                                                  // 한 페이지에 보여줄 게시물 개수
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
        echo "<li class='page-item'><a class='page-link' href='/AccountSystem/view/index.php?page=1' aria-label='Previous'>처음</a></li>";
    }
    if ($page <= 1) {
    } else {
        $pre = $page - 1;
        echo "<li class='page-item'><a class='page-link' href='/AccountSystem/view/index.php?page=$pre'>◀ 이전 </a></li>";
    }
    for ($i = $blockStart; $i <= $blockEnd; $i++) {
        if ($page == $i) {
            echo "<li class='page-item'><a class='page-link' disabled><b style='color: #df7366;'> $i </b></a></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href='/AccountSystem/view/index.php?page=$i'> $i </a></li>";
        }
    }
    if ($page >= $totalPage) {
    } else {
        $next = $page + 1;
        echo "<li class='page-item'><a class='page-link' href='/AccountSystem/view/index.php?page=$next'> 다음 ▶</a></li>";
    }
    if ($page >= $totalPage) {
    } else {
        echo "<li class='page-item'><a class='page-link' href='/AccountSystem/view/index.php?page=$totalPage'>마지막</a>";
    }
}



function boardDelete(){
	include_once('../db/db.php');
	$db = db_open();

	$id = $_POST['id'];
    
    $queryDeleteOne = sprintf('DELETE FROM t_title WHERE title_id = %d', $id);
    
    que($db, $queryDeleteOne);    

	que_close($db);
}



function boardInsert(){
    include_once('../db/db.php');

    $db = db_open();    

    $year = $_POST['reg_year'];
    $month = $_POST['reg_month'];
    $day = $_POST['reg_day'];    
    $car_num = $_POST['car_num'];
    $total_won = $_POST['total_won'];
    $full_balance = $_POST['full_balance'];
    $total_price = $_POST['total_price'];
    $deposit = $_POST['deposit'];
    $balance = $_POST['balance'];
    $memo = $_POST['memo'];

    $queryInsert = sprintf(
        "INSERT INTO t_title
            (reg_year, reg_month, reg_day, car_num, total_won, full_balance, total_price, deposit, balance, memo)
        VALUES(
            '%s','%s', '%s', '%s' , '%s' , '%s' , '%s' , '%s', '%s' , '%s' )",
        $year, $month, $day, $car_num, $total_won, $full_balance, $total_price, $deposit, $balance, $memo);

    echo $queryInsert;

    que($db, $queryInsert) or die(mysqli_error($db));


    $querySelectLastId = "SELECT LAST_INSERT_ID() as lastId";
    $exceSelectLastId = que($db, $querySelectLastId);
    $lastId = mysqli_fetch_array($exceSelectLastId);
    
    for($i=1; $i<=10; $i++){ 
        $c_month = $_POST['c_month'.$i];
        $c_day = $_POST['c_day'.$i];
        $p_type = $_POST['p_type'.$i];
        $size = $_POST['size'.$i];
        $cnt = $_POST['cnt'.$i];
        $unit_price = $_POST['unit_price'.$i];
        $price = $_POST['price'.$i];
        $tax = $_POST['tax'.$i];

        $queryInsert2 = sprintf(
            "INSERT INTO t_content
                (c_month, c_day, p_type, size, cnt, unit_price, price, tax, t_title_id)
            VALUES(
                '%s','%s', '%s', '%s' , '%s' , '%s' , '%s' , '%s', '%s' )",
            $c_month, $c_day, $p_type, $size, $cnt, $unit_price, $price, $tax, $lastId[0]); 
        
            que($db, $queryInsert2) or die(mysqli_error($db));

            echo $queryInsert2;            
    }



que_close($db);
}



if(isset($_POST["action"])){
    switch($_POST["action"]) {
        case "add":
            boardInsert();
            break;
        case "del":
            boardDelete();
            break;
        case "select":
            selectOne();
            break;             
    }
}

?>