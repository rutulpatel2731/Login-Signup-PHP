<?php
include_once '../connection/connection.php';

$employeeId = $_POST['empid'];
$query = "SELECT image FROM employee WHERE id = $employeeId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$dir = "./upload/";
$filePath = realpath($dir . $row["image"]);

if (file_exists($filePath)) {
    unlink($filePath);
}

$sql = "delete from employee where id ='$employeeId'";
$result = mysqli_query($conn, $sql);
if($result){
 echo json_encode(array(
    "status" => "success",
    "message" => "Record Has Been Deleted..."
 ));
}else{
    echo json_encode(array(
        "status" => "error",
        "message" => "Record Is Not Deleted..."
     ));
}
