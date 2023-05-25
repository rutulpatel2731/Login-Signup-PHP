<?php
include_once '../connection/connection.php';
$imgId = $_POST['iId'];

$query = "SELECT imgname FROM image WHERE id = '$imgId'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$dir = "./upload/";
$filePath = realpath($dir . $row["imgname"]);
if (file_exists($filePath)) {
    unlink($filePath);
}
$sql = "delete from image where id='$imgId'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo json_encode(array(
        "status" => "success",
        "message" => "Images Has Been Deleted."
    ));
}
