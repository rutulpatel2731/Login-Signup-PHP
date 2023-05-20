<?php
 include_once '../connection/connection.php';
 $userId = $_POST['userId'];
 $userName = $_POST['name'];
 $mobileNo = $_POST['mobileno'];
 $gender = $_POST['gender'];
 $imageName =rand().$_FILES['profile']['name'];
 $tmpname = $_FILES['profile']['tmp_name'];
 $folder = "./upload/". $imageName;
 move_uploaded_file($tmpname,$folder);

if(($_FILES['profile']['name']) !== ""){
    $sql = "UPDATE `employee` SET `name`=' $userName',`mobileno`='$mobileNo',`gender`='$gender',`image`='$imageName' WHERE id = $userId";
    $result=mysqli_query($conn,"select image from employee where id ='$userId'");
    $row = mysqli_fetch_assoc($result);
    unlink("./upload/".$row['image']);
}else{
    $sql = "UPDATE `employee` SET `name`=' $userName',`mobileno`='$mobileNo',`gender`='$gender' WHERE id = $userId";
}


 $result=mysqli_query($conn,$sql);
 if($result){
    echo json_encode(array(
        "status" => "success",
        "message" => "Your Record Has Been Updated." 
    ));
 }else{
    echo json_encode(array(
        "status" => "error",
        "message" => "Your Record Has Been Updated." 
    ));
 }
