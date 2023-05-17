<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'connection/connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from Registration where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                header("location:welcome.php");
            } else {
                $showError = "Password Are Not Match.";
            }
        }
    } else {
        $showError = "This Email Is Not Registered";
    }
}
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
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Email Id</label>
                        <input type="email" placeholder="Enter Email Id" name="email" class="form-control">
                        <div id="email-error" style="color:red"></div>
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Password</label>
                        <input type="password" placeholder="Enter Password" name="password" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="float-end mt-3">
                        <a href="forgotpassword.php">Forgot Password</a>
                    </div>
                </form>


                <?php
                if ($login) {
                    echo ' <div class="alert alert-success alert-dismissible fade show mt-5" role="alert" id="error-alert">
                    <strong ></strong> You are logged in
                    <button type="button" class="btn-close" id="btn-close-error"></button>
                </div>';
                }
                if ($showError) {
                    echo ' <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert" id="error-alert">
                    <strong ></strong>' . $showError . '
                    <button type="button" class="btn-close" id="btn-close-error"></button>
                </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- bootstrap Js -->
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>