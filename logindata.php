<?php
include_once('connection/connection.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($email, $token)
{
   
    require 'vendor/autoload.php';
    //Server settings
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'rutulsheladiya2731@gmail.com';
    $mail->Password   = 'souyxirlswyjnoom';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('rutulsheladiya2731@gmail.com', 'Mailer');
    $mail->addAddress($email);

    //Content
    $msg = "Click Here to unblock your account : <a href='http://php/Practial%20Task/LMS/unblock_user.php?email=$email&token=$token'>Click Here</a>";
    $mail->isHTML(true);
    $mail->Subject = 'Thanks For Contact us.';
    $mail->Body    = $msg;

    if ($mail->send()) {
        echo  'Message has been sent';
        return true;
    } else {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

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
                $sql = "delete from email_log where email='$email'";
                $result = mysqli_query($conn, $sql);
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
                    $token = bin2hex(random_bytes(16));
                    $sql = "update Registration set status=0,token='$token' where email='$email'";
                    if (mysqli_query($conn, $sql)) {
                        if (sendEmail($email, $token) === true) {
                            $_SESSION['msg'] = "Your Account Has Been Block Check Your Email To Unblock your Account.";
                            // unset($_SESSION["counter"]);
                            header('location:login.php');
                            die();
                        }
                    }
                    $sql = "delete from email_log where email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    // header('location:login.php');
                } else {
                    $sql = "insert into email_log (email) values('$email')";
                    $result = mysqli_query($conn, $sql);
                }
                if (isset($_SESSION["counter"])) {
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
