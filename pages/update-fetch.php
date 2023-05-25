<?php
include_once '../connection/connection.php';
$studId = $_POST['studentId'];
$response = array();
$sql = "select * from employee where userid='$studId'";
$result = mysqli_query($conn,$sql);
$row =  mysqli_fetch_assoc($result);
$row['skill'] = explode(" , ", $row['skill']);

$query = "SELECT s_name FROM states WHERE c_name = '{$row['country']}'";
$res = mysqli_query($conn, $query);
$states = mysqli_fetch_all($res);

array_push($row, $states);

//print_r($row);
array_push($response,$row);

$qry = "select id,imgname,userid from image where userid='$studId'";
$result = mysqli_query($conn,$qry);
$images = mysqli_fetch_all($result,MYSQLI_ASSOC);
array_push($response,$images);
// print_r($response);
echo json_encode($response);
?>