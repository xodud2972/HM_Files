<?php
include_once('../db/db.php');

function selectAll()
{
    $db = db_open();


    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $list = 10;
    $pageStart = ($page - 1) * $list;




    $querySelectAll = sprintf(
        'SELECT board_id, b_title, b_content, b_group_no, b_group_ord, b_depth, b_reg_date, b_writer, b_hit 
                                FROM t_board 
                                WHERE b_notice = 0
                            ORDER BY b_group_no desc, b_group_ord asc
                            LIMIT %s, %s',
        $pageStart,
        $list
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

        $resultData[] = $tempData;
    }

    

    que_close($db);
    return $resultData;
}


function selectNoticeAll()
{

    $db = db_open();


    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $list = 10;
    $pageStart = ($page - 1) * $list;




    $querySelectNoticeAll = sprintf(
        'SELECT board_id, b_title, b_content, b_group_no, b_group_ord, b_depth, b_reg_date, b_writer, b_hit, b_notice
            FROM t_board 
        WHERE b_notice = 1
        ORDER BY b_group_no desc, b_group_ord asc
        LIMIT %s, %s',
        $pageStart,
        $list
    );

    $result2 = que($db, $querySelectNoticeAll);

    while ($row2 = mysqli_fetch_array($result2)) {
        $noticeData["board_id"] = $row2['board_id'];
        $noticeData["title"] = $row2['b_title'];
        $noticeData["content"] = $row2['b_content'];
        $noticeData["group_no"] = $row2['b_group_no'];
        $noticeData["group_ord"] = $row2['b_group_ord'];
        $noticeData["depth"] = $row2['b_depth'];
        $noticeData["regDate"] = $row2['b_reg_date'];
        $noticeData["writer"] = $row2['b_writer'];
        $noticeData["hit"] = $row2['b_hit'];

        $NoticeData[] = $noticeData;
    }
    que_close($db);
    return $NoticeData;
}



function pagination()
{

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $sql = db_open2("SELECT * FROM t_board where b_notice = 0");

    $totalRecord = mysqli_num_rows($sql);                      // ????????? ??? ??????
    $list = 10;                                                  // ??? ???????????? ????????? ????????? ??????
    $blockCnt = 5;                                             // ????????? ????????? ?????? ??? ????????? ??????
    $blockNum = ceil($page / $blockCnt);                      // ?????? ????????? ??????
    $blockStart = (($blockNum - 1) * $blockCnt) + 1;         // ????????? ?????? ??????
    $blockEnd = $blockStart + $blockCnt - 1;                 // ????????? ????????? ??????
    $totalPage = ceil($totalRecord / $list);                  // ???????????? ????????? ??? 2022.01.13 ????????? ???????????? ??????????????? ???????????? 1????????????
    if ($blockEnd > $totalPage) {
        $blockEnd = $totalPage;                               // ?????? ????????? ????????? ??? ????????? ????????? ?????? ????????? ????????? ????????? ??? ????????? ???
    }

    if ($page <= 1) {
    } else {
        echo "<li class='page-item'><a class='page-link' href='/bootstrap/view/table.php?page=1' aria-label='Previous'>??????</a></li>";
    }

    if ($page <= 1) {
    } else {
        $pre = $page - 1;
        echo "<li class='page-item'><a class='page-link' href='/bootstrap/view/table.php?page=$pre'>??? ?????? </a></li>";
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
        echo "<li class='page-item'><a class='page-link' href='/bootstrap/view/table.php?page=$next'> ?????? ???</a></li>";
    }

    if ($page >= $totalPage) {
    } else {
        echo "<li class='page-item'><a class='page-link' href='/bootstrap/view/table.php?page=$totalPage'>?????????</a>";
    }
}
