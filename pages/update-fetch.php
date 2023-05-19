<?php
include_once '../connection/connection.php';
$studId = $_POST['studentId'];
$sql = "select * from employee where id='$studId'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1){
    $row =  mysqli_fetch_assoc($result);
    echo json_encode($row);
}
?>