<?php
include_once '../connection/connection.php';
$studId = $_POST['studentId'];
$response = array();
$sql = "select * from employee where userid='$studId'";
$result = mysqli_query($conn,$sql);
$row =  mysqli_fetch_assoc($result);
//print_r($row);

$qry = "select GROUP_CONCAT(imgname) AS image_names from image where userid='$studId'";
$result = mysqli_query($conn,$qry);
$row1 =  mysqli_fetch_assoc($result);
//print_r($row);
$imageNames = explode(',', $row1["image_names"]);
// print_r($imageNames);   

array_push($response,$row);
array_push($response,$imageNames);
echo json_encode($response);
?>