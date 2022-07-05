<?php    
       @include_once $_SERVER['DOCUMENT_ROOT']."../db/db.php";  
       @include_once $_SERVER['DOCUMENT_ROOT']."../include/header.php";
?>  
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Taeyoung PHP&MySQL</a>
            </div>  
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> 회원관리 탭</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         회원관리
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <div class="col-lg-12">
                        <h2>회원목록</h2> <a href="../process/process_add_member.php?action=add" type="button" class="btn btn-xs btn-info">회원추가</a>           
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>이름</th>
                                        <th>별명</th>
                                        <th>성</th>
                                        <th>주소</th>
                                        <th>연락처</th>
                                        <th>소개</th>
                                        <th>파일명</th>
                                        <th>회원관리</th>
                                    </tr>
                                </thead>
                                <tbody>
            <?php                  
                $query = 'SELECT * FROM people';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
                $resultt1 = que($db, $query) or die (mysqli_error($db));;
                
                while ($row = mysqli_fetch_assoc($result)) {
                                        
                    echo '<tr>';
                    echo '<td>'. $row['first_name'].'</td>';
                    echo '<td>'. $row['last_name'].'</td>';
                    echo '<td>'. $row['mid_name'].'</td>';
                    echo '<td>'. $row['address'].'</td>';
                    echo '<td>'. $row['contact'].'</td>';
                    echo '<td>'. $row['comment'].'</td>';
                    echo '<td>'. $row['file'].'</td>';
                    echo '<td> <a type="button" class="btn btn-xs btn-info" href="/process/process_select_member.php?action=edit & id='.$row['people_id'] . '" > 자세히 보기 </a> ';
                    echo ' <a  type="button" class="btn btn-xs btn-warning" href="/process/process_edit_member.php?action=edit & id='.$row['people_id'] . '"> 수정하기 </a> ';
                    echo ' <a  type="button" class="btn btn-xs btn-danger" href="/process/process_del_member.php?type=people&delete & id=' . $row['people_id'] . '">삭제하기 </a> </td>';
                    echo '</tr> ';
        }       
            ?>            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
