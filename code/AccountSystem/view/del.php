<?php
include('../db/db.php');
include('../process/process_All.php');
$resultData = selectOne();
?>
<head>  
<script src="../vendor/jquery/jquery.min.js"></script>
</head>
<body>
  <form id="form1" method="post">
    <input type="hidden" value="del" name="action">
    <input name="id" value="<?= $_GET['id'] ?>" type="hidden" />
  </form>
</body>
</html>
<script>
    if(confirm('정말 삭제하시겠습니까?') == true){
      var form = $('#form1')[0];
      var data = new FormData(form);
      $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '../process/process_All.php', 
        data: data,
        processData: false,
        contentType: false,
        timeout: 600000,
        success: function(data) {
          console.log(data);
          location = "../view/index.php?page=1";
        },
        error: function(e) {
          console.log("ERROR : ", e);
        }
      });
    }else{
        alert('삭제를 취소했습니다.');
        location = "../view/index.php?page=1";
    }
</script>