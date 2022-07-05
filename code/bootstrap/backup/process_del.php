<?php 
function userDelete(){
	include_once('../db/db.php');
	$db = db_open();

	$id = $_POST['id'];

 	// $querySelectFiles = sprintf(
	// 	'SELECT filename FROM t_file WHERE file_people_id=%d',
	// 	$id
	// );

	// $result = mysqli_query($db, $querySelectFiles);

	// while ($row = mysqli_fetch_array($result)) {
	// 	$del_File = "../uploads/" . $row['filename'];
	// 	echo $del_File;
	// 	if ($row['filename'] && is_file($del_File)) {
	// 		unlink($del_File);
	// 	}
	// }


	$queryDeleteUser = sprintf(
		'DELETE FROM t_board WHERE board_id=%d',
		$id
	);
	que($db, $queryDeleteUser);


	que_close($db);

}
userDelete();
?>