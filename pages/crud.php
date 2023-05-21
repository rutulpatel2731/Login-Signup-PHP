<?php
session_start();
include_once '../connection/connection.php';
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
    <title>Home</title>
    <!-- custom css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php include_once '../navbar/navbar.php' ?>
    <section class="container mt-2">
        <h3 class="text-center">Crud Operation</h3>

        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-md-6">
                <form action="" id="form" enctype="multipart/form-data">
                    <div class="form-group my-2">
                        <input type="hidden" name="userId" id="userId" class="form-control" value="null">
                        <label for="" class="py-2">Enter Name</label>
                        <input type="text" placeholder="Enter Name" name="name" id="name" class="form-control" value="">
                        <div id="error"></div>
                    </div>

                    <div class="form-group my-2">
                        <label for="" class="py-2">Enter Mobile Number</label>
                        <input type="text" placeholder="Enter Mobile Number" name="mobileno" id="mobileno" class="form-control">
                    </div>

                    <div class="Gender">
                        <div class="form-group my-3 ">
                            <label for="" class="me-4">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                                <label class="form-check-label" for="">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                                <label class="form-check-label" for="">Female</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="other">
                                <label class="form-check-label" for="">Other</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group my-2">
                        <label for="" class="py-2">Select Profile Picture</label>
                        <input type="file" name="profile[]" id="profile" class="form-control" multiple>

                        <div class="main d-none" id="main">
                         <div class="gallery">
                         </div>
                        </div>
                    </div>


                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" id="insertBtn">Submit</button>
                        <button type="submit" class="btn btn-primary" id="updateDataBtn">Update</button>
                    </div>
                </form>

                <div class="alert alert-success alert-dismissible fade show mt-3 d-none" role="alert" id="success-alert">
                    <strong id="success-msg"></strong>
                    <button type="button" class="btn-close" id="btn-close-success"></button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show mt-3 d-none" role="alert" id="error-alert">
                    <strong id="error-msg"></strong>
                </div>
            </div>
        </div>


        <div id="table-data" class="mt-5">

        </div>
    </section>

    <!-- bootstrap js -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <!-- jQuery  -->
    <script src="../js/jquery.js"></script>
    <!-- bootbox -->
    <script src="js/bootbox.min.js"></script>
    <!-- jQuery Validaation Plugin -->
    <script src="../js/jquery.validate.min.js.js"></script>
    <!-- additional methos  -->
    <script src="../js/additional-methods.js"></script>
    <!-- Custom Js -->
    <script src="js/script.js"></script>
    <script>
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr({'src' : event.target.result,'class' : 'previmage' }).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#profile').on('change', function() {
            imagesPreview(this, 'div.gallery');
            $("#main").removeClass('d-none');
        });
    </script>
</body>

</html>