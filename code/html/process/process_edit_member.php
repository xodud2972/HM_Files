<?php

@include_once $_SERVER['DOCUMENT_ROOT'] . "../db/db.php";

$zz = $_POST['id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$mname = $_POST['Middlename'];
$address = $_POST['Address'];
$contct = $_POST['Contact'];
$comment = $_POST['comment'];
$file = $_FILES['file']['name'];

$query = ' UPDATE people SET first_name ="' . $fname . '",
					last_name ="' . $lname . '", mid_name="' . $mname . '",
					address="' . $address . '",contact="' . $contct . '", 
					comment="' . $comment . '", file=' . json_encode($file) . '  WHERE
					people_id ="' . $zz . '" ';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

?>

<script type="text/javascript">
	alert("회원정보가 수정되었습니다.");
	window.location = "../view/index.php";
</script>