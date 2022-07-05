<?php
include('../db/db.php');
?>
<head>
<script src="../vendor/jquery/jquery.min.js"></script>
</head>
<body>
  <form id="form1" method="post">
    <input type="hidden" value="delReply" name="action">
    <input name="reply_id" value="<?= $_GET['reply_id'] ?>" type="hidden" />
  </form>
</body>
</html>
<script>
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
          //location = "../view/table.php?page=1";
          alert('파일이 삭제되었습니다.');
          window.location = document.referrer;
        },
        error: function(e) {
          console.log("ERROR : ", e);
        }
      });
</script>