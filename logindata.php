<?php
session_start();
include_once 'connection/connection.php';
$login = false;
$showError = false;
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  // $captcha = $_POST['captcha'];
  if (isset($_POST["captcha"]) && isset($_SESSION["CAPTCHA_CODE"])) {
    $captcha =  filter_var($_POST["captcha"], FILTER_SANITIZE_STRING);
    if ($captcha != $_SESSION["CAPTCHA_CODE"]) {
      $_SESSION["captcha_error"] = "Enter valid captcha";
      header("Location: login.php");
      die();
    }
  }
  $sql = "select * from Registration where email='$email'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
    $data = mysqli_fetch_assoc($result);
    if ($data["status"] == 1) {
      // die($data["password"]);
      if (password_verify($password, $data['password'])) {
        $login = true;
        // session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        header("location:welcome.php");
      } else {
        $emailCount = "select email from email_log WHERE email='$email'";
        $emailResult = mysqli_query($conn, $emailCount);
        // die(mysqli_num_rows($emailResult));
        if (mysqli_num_rows($emailResult) == 2) {
          $sql = "update Registration set status=0 where email='$email'";
          $result = mysqli_query($conn, $sql);
          $sql = "delete from email_log where email = '$email'";
          $result = mysqli_query($conn, $sql);
          $_SESSION['msg'] = "Your Account Has Been Block Contact To The Adimin To Unblock Your Account.";
          // header('location:login.php');
        } else {
          $sql = "insert into email_log (email) values('$email')";
          $result = mysqli_query($conn, $sql);
        }
        if (isset($_SESSION["counter"]) && $_SESSION["counter"] <= 3) {
          ++$_SESSION["counter"];
        } else {
          $_SESSION["counter"] = 1;
        }
        $_SESSION['showError'] = "Password Are Not Match.";
        header('location:login.php');
      }
    } else {
      $_SESSION['msg'] = "Your Account Has Been Block Contact To The Adimin To Unblock Your Account.";
      header('location:login.php');
    }
  } else {
    $_SESSION['showError'] = "This Email Is Not Registered";
    header('location:login.php');
    // $showError = "This Email Is Not Registered";
  }
}
