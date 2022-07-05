<?php    
       include('connection.php');
       include('header.php');  
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
                        <h2>회원목록</h2> <a href="add.php?action=add" type="button" class="btn btn-xs btn-info">회원추가</a>
                                
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
<!-- 
mysqli_fetch_row($result)    는 $row[0] 과 같이 배열의 번호로 요소를 출력할 수 있다.
mysqli_fetch_assoc($result)  의 assoc은 연관배열associative array 의 약자로, $row['log_num'] 와 같이 열이름안에 키값을 통해 데이터를 호출할 수 있다.
mysqli_fetch_array($result)  는 두 방식 모두 사용할 수 있다. 즉 키값과 번호 중 아무 것이나 사용해도 무방하다. 
 -->
            <?php                  
                $query = 'SELECT * FROM people';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
                
                while ($row = mysqli_fetch_assoc($result)) {
                                        
                    echo '<tr>';
                    echo '<td>'. $row['first_name'].'</td>';
                    echo '<td>'. $row['last_name'].'</td>';
                    echo '<td>'. $row['mid_name'].'</td>';
                    echo '<td>'. $row['address'].'</td>';
                    echo '<td>'. $row['contact'].'</td>';
                    echo '<td>'. $row['comment'].'</td>';
                    echo '<td>'. $row['file'].'</td>';

                    echo '<td> <a type="button" class="btn btn-xs btn-info" href="searchfrm.php?action=edit & id='.$row['people_id'] . '" > 자세히 보기 </a> ';
                    echo ' <a  type="button" class="btn btn-xs btn-warning" href="edit.php?action=edit & id='.$row['people_id'] . '"> 수정하기 </a> ';
                    echo ' <a  type="button" class="btn btn-xs btn-danger" href="del.php?type=people&delete & id=' . $row['people_id'] . '">삭제하기 </a> </td>';
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
