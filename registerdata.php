<?php
include_once 'connection/connection.php';

$name = $_POST['uname'];
$mobile = $_POST['mobileno'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$gender = $_POST['sex'];
$hobbies = $_POST['hobbie'];
$chk = "";
foreach ($hobbies as $chk1) {
    $chk .= $chk1 . ",";
}

$imagename = $_FILES["profile"]["name"];
$tmpname = $_FILES["profile"]["tmp_name"];
$folder = "./upload/" . $imagename;
move_uploaded_file($tmpname, $folder);

$emaildata = "select * from Registration where email = '$email'";
$emailresult = mysqli_query($conn, $emaildata);
if (mysqli_num_rows($emailresult) > 0) {
    echo json_encode(array(
        'success' => "false",
        "message" => "This accout is alredy registered.."
    ));
} else {
    if ($password == $cpassword) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Registration (name,mobileno,email,password,gender,hobbies,profile,CreatedAt)  
     values ('$name','$mobile','$email','$hash','$gender','$chk','$imagename',CURRENT_TIMESTAMP())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo json_encode(array(
                'success' => "true",
                'message' => "Your Account Has Been Registered.."
            ));
        } else {
            echo json_encode(array(
                'success' => "false",
                'message' => "Data Not Stored..."
            ));
        }
    } else {
        echo json_encode(array(
            'success' => "false",
            'message' => "Password & Confirm Password are not same.."
        ));
    }
}
