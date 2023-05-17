<?php
session_start();
include_once 'connection/connection.php';
$login = false;
$showError = false;
if (isset($_POST['submit'])) {
  include_once 'connection/connection.php';
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "select * from Registration where email='$email'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    $data = mysqli_fetch_assoc($result);
    if($data["status"] == 1) {
     $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['id'] = $row['id'];
          $_SESSION['name'] = $row['name'];
          header("location:welcome.php");
        } else {        
          $emailCount = "select email from email_log WHERE email='$email'";
          $emailResult = mysqli_query($conn, $emailCount);
          if (mysqli_num_rows($emailResult) == 2) {
            $sql = "update Registration set status=0 where email='$email'";
            $result = mysqli_query($conn,$sql);
            $sql = "truncate table email_log";
            $result = mysqli_query($conn,$sql);
            $_SESSION['msg'] = "block";
            // header('location:login.php');
          } else {
            $sql = "insert into email_log (email) values('$email')";
            $result = mysqli_query($conn, $sql);
          }
          if (isset($_SESSION["counter"]) && $_SESSION["counter"] < 2) {
            ++$_SESSION["counter"];
          } else {
            $_SESSION["counter"] = 0;
          }
          $_SESSION['showError'] = "Password Are Not Match.";
          header('location:login.php');
  
        }
      
    } else {
      $_SESSION['msg'] = "block";
      header('location:login.php');
    }
  
  } else {
    $_SESSION['showError'] = "This Email Is Not Registered";
    header('location:login.php');
    // $showError = "This Email Is Not Registered";
  }
}
