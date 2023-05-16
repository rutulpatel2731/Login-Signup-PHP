<?php
session_start();
include_once 'connection/connection.php';
$login = false;
if($_SERVER["REQUEST_METHOD"]= "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from Registration where email='$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1){
      while($row=mysqli_fetch_assoc($result)){
          if(password_verify($password,$row['password'])){
              $login = true;
              session_start();
              $_SESSION['loggedin'] = true;
              header("location:welcome.php");
          }else{
            // echo "Password Are Not Match.";
            //  $_SESSION['password'] = "Password Are Not Match.";
             
          }
      }
    }else{
        echo "This Email Is Not Registered";
    }

}
?>