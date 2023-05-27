<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php include_once '../navbar/navbar.php'; ?>
    <section class="container my-5">
        <h3 class="text-center">Select CSV File Here</h3>
        <form action="action.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Select File Here</label>
                <input type="file" class="form-control" name="csvFile">
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
        </form>
        <?php
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
           <strong>' . $_SESSION['success'] . '</strong>
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
            unset($_SESSION['success']);
        }

        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
            <strong>' . $_SESSION['error'] . '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            unset($_SESSION['error']);
        }
        ?>
    </section>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
</body>

</html>