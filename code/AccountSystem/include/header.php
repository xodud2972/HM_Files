<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AccountSystem</title>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <style>
    #input-first {
        width: 100px;
    }
    .input-second {
        width: 300px;
    }
    .border_out {
        font-family: 굴림;
        border: 3px double black;
    }
    body,
    table,
    tr,
    td {
        font-family: 굴림, verdana, arial;
        font-size: 10px;
        color: #000000;
        border: 0px;
    }
    .border_in {
        border-width: 1px;
        border-color: black;
        border-style: solid none solid solid;
        font-size: 15px;
        font-weight: bold;
    }
    .l_dot {
        border-style: dotted;
        border-width: 0 0 0 1px;
        border-color: #4C4C4C;
    }
    .border_in {
        border-style: dotted;
        border-width: 0 0 1px 1px;
        border-color: #6C6C6C;
    }
    .tl_dot {
        border-style: solid solid solid dotted;
        border-width: 1px 0px 1px 1px;
        border-color: black black black #6C6C6C;
    }
    #command_bar {
        font-size: 10pt;
        background-color: #FEFFD2;
        border: 1px solid #AF9E29;
        padding: 5px;
        margin-bottom: 10px;
    }
    .sign_area {
        position: relative;
    }
    .sign_img {
        position: absolute;
        top: 15px;
        left: 190px;
    }
</style>
</head>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<a class="navbar-brand" href="../view/table.php?page=1">거래명세서 프로그램</a>
</nav>