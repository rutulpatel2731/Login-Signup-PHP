<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != "true") {
    $_SESSION['accessFail'] = "Access Denied";
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- custom css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php include_once '../navbar/navbar.php' ?>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome ! <?php echo $_SESSION['name'] ?></h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
        </div>
    </div>
    <!-- bootstrap Js -->
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>