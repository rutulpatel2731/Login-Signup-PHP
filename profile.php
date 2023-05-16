<?php
session_start();
require_once 'connection/connection.php';
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != "true") {
    header("location:login.php");
}
$id = $_SESSION['id'];
$sql = "select * from Registration where id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    include_once 'navbar/navbar.php';
    ?>

    <div class="container mt-5">
        <h3 class="text-center">User Profile</h3>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-6">
                <form action="">
                <div class="form-group mb-3">
                        <label for="" class="pb-2">Profile</label><br>
                       <img width="100px" height="100px" src="./upload/<?php echo $row['profile'];?>"  alt="">
                    </div>
                    <div class="form-group  mb-3">
                        <label for="" class="pb-2">Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['id']?>" readonly>
                    </div>

                    <div class="form-group  mb-3">
                        <label for="" class="pb-2">Mobile Number</label>
                        <input type="text" class="form-control" value="<?php echo $row['mobileno']?>" readonly>
                    </div>

                    <div class="form-group  mb-3">
                        <label for="" class="pb-2">Email Id</label>
                        <input type="text" class="form-control" value="<?php echo $row['email']?>" readonly>
                    </div>

                    <div class="form-group  mb-3">
                        <label for="" class="pb-2">Gender</label>
                        <input type="text" class="form-control" value="<?php echo $row['gender']?>" readonly>
                    </div>

                    <div class="form-group  mb-3">
                        <label for="" class="pb-2">Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['id']?>" readonly>
                    </div>

                    <div class="form-group  mb-3">
                        <label for="" class="pb-2">Hobbies</label>
                        <input type="text" class="form-control" value="<?php echo $row['hobbies']?>" readonly>
                    </div>

                    <div class="form-group  mb-3">
                        <label for="" class="pb-2">Created At</label>
                        <input type="text" class="form-control" value="<?php echo date("d/m/y h:i:s A", strtotime($row['CreatedAt'])) ?>" readonly>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- bootstrap Js -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>