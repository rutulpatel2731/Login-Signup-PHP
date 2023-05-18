<?php
session_start();
include_once 'connection/connection.php';

$emailId = $_GET['email'];
$tokenId  = $_GET['token'];

$sql = "update Registration SET status=1,token=NULL where email='$emailId' AND token='$tokenId'";
$result = mysqli_query($conn,$sql);
if($result){
  $_SESSION['unblock_success'] = $emailId."Your Account Has Been Unblocked Now You Can Login";
  header('location:login.php');
}else{
    $_SESSION['unblock_error'] = "Something Went Wrong !! Please Try Again..";
    header('location:login.php');
}

?>