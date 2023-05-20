<?php
include_once '../connection/connection.php';


$name = $_POST['name'];
$mobile = $_POST['mobileno'];
$gender = $_POST['gender'];
// echo "<pre>";
// print_r($_FILES['profile']);
$imageName =rand().$_FILES['profile']['name'];
$tmpName = $_FILES['profile']['tmp_name'];
$folder = "./upload/".$imageName;
move_uploaded_file($tmpName,$folder);

$sql = "insert into employee (name,mobileno,gender,image,CreatedAt) 
VALUES ('$name','$mobile','$gender','$imageName',CURRENT_TIMESTAMP())";
$result = mysqli_query($conn,$sql);
if($result){
   echo json_encode(array(
     "status" => "success",
     "message" => "Data Inserted Successfully.."
   ));
}else{
   echo json_encode(array(
    "status" => "error",
    "message" => "Data Not Inserted Successfully.."
  ));
}
?>