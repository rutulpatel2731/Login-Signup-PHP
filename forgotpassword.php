<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php include_once 'navbar/navbar.php' ?>

    <section class="container mt-5">
        <h3 class="text-center">Forgot Password</h3>

        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-md-6">
                <form action="" id="forgotpassword">
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Email Id</label>
                        <input type="email" placeholder="Enter Email Id" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Mobile Number</label>
                        <input type="text" placeholder="Enter Mobile Number" name="mobile" id="mobile" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter New Password</label>
                        <input type="password" placeholder="Enter New Password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Re-enter New Password</label>
                        <input type="password" placeholder="Re-enter New Password" name="rpassword" id="rpassword" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
                <div class="alert alert-success alert-dismissible fade show d-none mt-4" role="alert" id="success-alert">
                    <strong id="success-msg"></strong>
                    <button type="button" class="btn-close" id="btn-close-success"></button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show d-none mt-4" role="alert" id="error-alert">
                    <strong id="error-msg"></strong>
                    <button type="button" class="btn-close" id="btn-close-error"></button>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- bootstrap Js -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- jquery Validate plugin -->
    <script src="js/jquery.validate.min.js.js"></script>
    <!-- additional js -->
    <script src="js/additional-methods.js"></script>
    <!-- custom js -->
    <script src="js/script.js"></script>

</body>

</html>