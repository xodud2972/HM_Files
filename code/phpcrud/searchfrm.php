
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
<?php 
$query = 'SELECT * FROM people
              WHERE
              people_id ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['people_id'];
                $i= $row['first_name'];
                $a=$row['last_name'];
                $b=$row['mid_name'];
                $c=$row['address'];
                $d=$row['contact'];
                $e=$row['comment'];
                $f=$row['file'];
             
              }
              
              $id = $_GET['id'];
         
?>

             <div class="col-lg-12">
                  <h2>회원정보 보기</h2>
                      <div class="col-lg-6">

                        <form role="form" method="post" action="index.php">
                            
                            <div class="form-group">
                              <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $i; ?>" disabled>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $a; ?>" disabled>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Middle Name" name="Middlename" value="<?php echo $b; ?>" disabled>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Address" name="Address" value="<?php echo $c; ?>" disabled>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Contact" name="Contact" value="<?php echo $d; ?>" disabled>
                            </div> 
                            <div class="form-group">
                             <label>소개</label>
                              <textarea class="form-control" rows="3"  name="comment" disabled><?php echo $e; ?></textarea>
                            </div> 
                            
                            <div class="form-group">
                              <!-- 파일 : <a href="uploads/<?php echo $f; ?>" download><?php echo $f; ?></a><br> -->
                              파일 : <?php echo $f; ?>
                            </div>

                            <button type="submit" class="btn btn-default">목록 페이지로 이동</button>
                         


                      </form>  
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