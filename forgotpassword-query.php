<?php
include_once 'connection/connection.php';

$emailId = $_POST['email'];
$mobileNo = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['rpassword'];

$findEmail = "select * from Registration where email= '$emailId'";
$emailResult = mysqli_query($conn, $findEmail);
$numEmail = mysqli_num_rows($emailResult);
if ($numEmail == 1) {
    $row = mysqli_fetch_assoc($emailResult);
    // print_r($row);
    if ($row['mobileno'] === $mobileNo) {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "update Registration SET password='$hash' where email='$emailId'";
            $result = mysqli_query($conn, $sql);
            echo json_encode(array(
                "status" => "success",
                "message" => "Password Has Been Changed. <a href='login.php'>Click Here to Login</a>"
            ));
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => "Password And Confirm Password Are Not Same."
            ));
        }
    } else {
        echo json_encode(array(
            "status" => "error",
            "message" => "This Mobile Number Is Not Registered."
        ));
    }
} else {
    echo json_encode(array(
        "status" => "error",
        "message" => "This Email Is Not Registered."
    ));
}
