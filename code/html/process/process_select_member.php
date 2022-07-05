<?php                  
@include_once $_SERVER['DOCUMENT_ROOT'] . "../db/db.php";


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