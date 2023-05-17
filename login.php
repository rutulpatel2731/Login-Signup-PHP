<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    include_once 'navbar/navbar.php';
    ?>
    <section class="container mt-5">
        <h3 class="text-center">Login Here</h3>

        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-md-6">
                <form action="logindata.php" method="POST">
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Email Id</label>
                        <input type="email" placeholder="Enter Email Id" name="email" class="form-control">
                        <div id="email-error" style="color:red"><?php if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                        } ?></div>
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Password</label>
                        <input type="password" placeholder="Enter Password" name="password" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                    <div class="float-end mt-3">
                        <a href="forgotpassword.php">Forgot Password</a>
                    </div>
                </form>

                <?php
                if (isset($_SESSION["showError"])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" id="error-alert">
                      <strong id="error-msg">' . $_SESSION["showError"] . ' </strong>
                      <button type="button" class="btn-close" id="btn-close-error"></button>';
                    unset($_SESSION["showError"]);
                }

                echo $_SESSION["counter"];

                if (isset($_SESSION["msg"])) {
                    echo  $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>

            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- bootstrap Js -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>