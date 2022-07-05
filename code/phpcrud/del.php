<?php
	include('connection.php');
    include('header.php');
?>  
<body>
<?php

			switch ($_GET['type']) {
				case 'people':
					$query = 'DELETE FROM people
							WHERE
							people_id = ' . $_GET['id'];
					$result = mysqli_query($db, $query) or die(mysqli_error($db));		
?>



	<script type="text/javascript">
		alert("해당 회원이 삭제 되었습니다.");
		window.location = "index.php";
	</script>				
				
			<?php
				}
			?>

</body>
</html>