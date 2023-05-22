<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h3 class="text-center">Register Here</h3>

        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-md-6">
                <form action="" id="form" enctype="multipart/form-data">
                    <?php
                    if (isset($_SESSION['accessFail'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert" id="error-alert">
    <strong>' . $_SESSION["accessFail"] . ' </strong>
    <button type="button" class="btn-close" id="btn-close-error"></button></div>';
                        unset($_SESSION['accessFail']);
                    }
                    ?>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Name</label>
                        <input type="text" placeholder="Enter Name" name="uname" id="uname" class="form-control">
                        <div id="error"></div>
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Mobile Number</label>
                        <input type="text" placeholder="Enter Mobile Number" name="mobileno" id="mobileno" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Email Id</label>
                        <input type="email" placeholder="Enter Email Id" name="email" id="email" class="form-control">
                        <div id="email-error" style="color:red"></div>
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Password</label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="" class="py-2">Confirm Password</label>
                        <input type="password" placeholder="Enter Confirm Password" name="cpassword" id="cpassword" class="form-control">
                    </div>

                    <div class="form-group my-3">
                        <label for="" class="me-4">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" value="male" checked>
                            <label class="form-check-label" for="">Male</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" value="female">
                            <label class="form-check-label" for="">Female</label>
                        </div>
                    </div>

                    <div class="hobbie form-group">
                        <label for="" class="py-2">Select Your Hobbies</label>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobbie[]" value="cricket">
                            <label class="form-check-label" for="gridCheck1">Cricket</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobbie[]" value="chess">
                            <label class="form-check-label" for="gridCheck1">Chess</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobbie[]" value="football">
                            <label class="form-check-label" for="gridCheck1">Football</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobbie[]" value="music">
                            <label class="form-check-label me-3" for="gridCheck1">Music</label>
                        </div>

                    </div>

                    <div class="form-group my-2">
                        <label for="" class="py-2">Select Profile Picture</label>
                        <input type="file" name="profile" id="profile" class="form-control">
                        <img src="" alt="" id="image-previewer">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </form>

                <div class="alert alert-success alert-dismissible fade show d-none mt-3" role="alert" id="success-alert">
                    <strong id="success-msg"></strong>
                    <button type="button" class="btn-close" id="btn-close-success"></button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show d-none mt-3" role="alert" id="error-alert">
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
    <!-- custom js -->
    <script src="js/jquery.validate.min.js.js"></script>
    <!-- additional js -->
    <script src="js/additional-methods.js"></script>
    <!-- custom Js -->
    <script src="js/script.js"></script>

</body>

</html>