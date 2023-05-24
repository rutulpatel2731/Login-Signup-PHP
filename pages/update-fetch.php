<?php
include_once '../connection/connection.php';
$studId = $_POST['studentId'];
$response = array();
$sql = "select * from employee where userid='$studId'";
$result = mysqli_query($conn,$sql);
$row =  mysqli_fetch_assoc($result);
//print_r($row);
array_push($response,$row);

$qry = "select id,imgname,userid from image where userid='$studId'";
$result = mysqli_query($conn,$qry);
$images = mysqli_fetch_all($result,MYSQLI_ASSOC);
// print_r($images);
// $images = mysqli_fetch_array($result,MYSQLI_ASSOC);
// print_r($images);
 
array_push($response,$images);
echo json_encode($response);
?>