<?php
@include_once $_SERVER['DOCUMENT_ROOT'] . "../db/db.php";

			switch ($_GET['type']) {
				case 'people':
					$query = 'DELETE FROM people
							WHERE
							people_id = ' . $_GET['id'];
					$result = mysqli_query($db, $query) or die(mysqli_error($db));		
?>

			<script type="text/javascript">
				alert("해당 회원이 삭제 되었습니다.");
				window.location = "../view/index.php";
			</script>				
						
		<?php
			}
?>
