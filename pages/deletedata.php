<?php
include_once '../connection/connection.php';

$employeeId = $_POST['empid'];

$query = "SELECT imgname FROM image WHERE userid = $employeeId";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $dir = "./upload/";
    $filePath = realpath($dir . $row["imgname"]);

    if (file_exists($filePath)) {
        unlink($filePath);
    }
};

$sql = "delete from employee where userid = " . $employeeId;
$result = mysqli_query($conn, $sql);
if ($result) {
    echo json_encode(array(
        "status" => "success",
        "message" => "Record Has Been Deleted..."
    ));
} else {
    echo json_encode(array(
        "status" => "error",
        "message" => "Record Is Not Deleted..."
    ));
}
