<?php
include_once '../connection/connection.php';
$userid = $_POST['userId'];
$userName = $_POST['name'];
$mobileNo = $_POST['mobileno'];
$gender = $_POST['gender'];
$skill = $_POST['skill'];
$skillValue = implode(" , ",$skill);
$imgName = $_FILES['profile']['name'];
$country = $_POST['country'];
$countImage = count($imgName);
// print_r($_FILES['profile']['name'][0]);
// echo $countImage;

if (($_FILES['profile']['name'][0]) !== "") {
    $sql = "UPDATE `employee` SET `name`= '$userName',`mobileno`='$mobileNo',`gender`='$gender',`skill`='$skillValue',`country`='$country' WHERE userid = '$userid'";
    $result = mysqli_query($conn, $sql);

    for ($i = 0; $i < $countImage; $i++) {
        $imageName = rand() . $_FILES['profile']['name'][$i];
        $tmpname = $_FILES['profile']['tmp_name'][$i];
        $folder = "./upload/" . $imageName;
        move_uploaded_file($tmpname, $folder);
        $sql = "Insert into image (imgname,userid) VALUES ('$imageName',$userid)";
        $imgResult = mysqli_query($conn, $sql);
    }
    echo json_encode(array(
        "status" => "success",
        "message" => "Your Record Has Been Updated."
    ));
} else {
    $sql = "UPDATE `employee` SET `name`= '$userName',`mobileno`='$mobileNo',`gender`='$gender',`skill`='$skillValue',`country`='$country' WHERE userid = '$userid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo json_encode(array(
            "status" => "success",
            "message" => "Your Record Has Been Updated."
        ));
    }
}
