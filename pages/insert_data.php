<?php
include_once '../connection/connection.php';


$name = $_POST['name'];
$mobile = $_POST['mobileno'];
$gender = $_POST['gender'];
$skill = $_POST['skill'];
$skillValue = implode(" , ",$skill);
// echo "<pre>";
// print_r($_FILES['profile']);
$state = $_POST['state'];
$country = $_POST['country'];
$countImage = count($_FILES['profile']['name']);
// echo $countImage;

$sql = "insert into employee (name,mobileno,gender,skill,state,country,CreatedAt) 
VALUES ('$name','$mobile','$gender','$skillValue','$state','$country',CURRENT_TIMESTAMP())";
$result = mysqli_query($conn, $sql);
if ($result) {
  $lastId =  mysqli_insert_id($conn);
  // echo $lastId;
  for ($i = 0; $i < $countImage; $i++) {
    $imageName = rand() . $_FILES["profile"]['name'][$i];
    $tmpname = $_FILES["profile"]['tmp_name'][$i];
    $folder = "./upload/" . $imageName;
    move_uploaded_file($tmpname, $folder);
    $sql = "Insert into image (imgname,userid) VALUES ('$imageName',$lastId)";
    $imgResult = mysqli_query($conn, $sql);
  }
  if ($imgResult) {
    echo json_encode(array(
      "status" => "success",
      "message" => "Data Inserted Successfully.."
    ));
  } else {
    echo json_encode(array(
      "status" => "error",
      "message" => "Data Not Inserted Successfully.."
    ));
  }
}




//find the last id from employee table
// $findLastId= mysqli_query($conn,"select userid from employee order by userid desc limit 1");
// $row = mysqli_fetch_assoc($findLastId);
// $lastId = $row['userid'];
// echo $lastId;
// echo $lastId;
