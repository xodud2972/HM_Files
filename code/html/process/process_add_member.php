<?php

@include_once $_SERVER['DOCUMENT_ROOT'] . "../db/db.php";


$filepath = "uploads/"; //업로드 경로

$file = $_FILES['file']['name'];
json_encode($file);

$countfiles = count($_FILES['file']['name']);
$filearray = array();

for ($i = 0; $i < $countfiles; $i++) {
    $filename = $file[$i];
    array_push($filearray, $filename);
    move_uploaded_file($_FILES['file']['tmp_name'][$i], $filepath . $filename);
}

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$mname = $_POST['Middlename'];
$address = $_POST['Address'];
$contct = $_POST['Contact'];
$comment = $_POST['comment'];


switch ($_POST['action']) {
    case 'add':
        $query = "INSERT INTO people
            (first_name, last_name, mid_name, address, contact, comment, file)
            VALUES ('" . $fname . "','" . $lname . "','" . $mname . "','" . $address . "','" . $contct . "','" . $comment . "','" . json_encode($filearray) . "')";
        echo $query;
        mysqli_query($db, $query) or die('에러입니다');
        break;
}
?>

<script type="text/javascript">
    alert("새로운 회원이 등록되었습니다.");
    window.location = "../view/index.php";
</script>