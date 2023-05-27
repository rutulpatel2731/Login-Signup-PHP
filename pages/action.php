<?php
session_start();
include '../connection/connection.php';
function validate()
{
    header("location: ImportCSV.php");
    die();
}
if (isset($_POST['submit'])) {
    if (empty($_FILES['csvFile']['tmp_name'])) {
        $_SESSION['error'] = "Please select a file to import";
        header("location: ImportCSV.php");
    } else  if ($_FILES['csvFile']['type'] != 'text/csv') {
        $_SESSION['error'] = "Please Uplaod the CSV file.";
        header("location: ImportCSV.php");
    } else {
        // echo "<pre>";
        // print_r($_FILES);
        $csvFile = $_FILES['csvFile']['tmp_name'];
        $handle = fopen($csvFile, "r");
        if ($handle !== false) {
            $lineNumber = 0;
            $emailStore = [];
            while (($data = fgetcsv($handle)) !== false) {
                $lineNumber++;
                $first_name = trim($data[0]);
                $last_name = trim($data[1]);
                $email = trim($data[2]);
                $mobileno = trim($data[3]);
                $company_name = trim($data[4]);
                $address = trim($data[5]);
                $zip = trim($data[6]);

                if (empty($first_name)) {
                    $_SESSION['error'] = "First name is empty in CSV file line number " . $lineNumber;
                    validate();
                }

                if (!preg_match("/[a-z A-Z]/", $first_name)) {
                    $_SESSION['error'] = "First name is not valid in CSV file line number " . $lineNumber;
                    validate();
                }

                if (empty($last_name)) {
                    $_SESSION['error'] = "Last name is empty in CSV file line number " . $lineNumber;
                    validate();
                }

                if (!preg_match("/[a-z A-Z]/", $last_name)) {
                    $_SESSION['error'] = "First name is not valid in CSV file line number " . $lineNumber;
                    validate();
                }

                if (empty($email)) {
                    $_SESSION['error'] = "Email field empty in CSV file at line number " . $lineNumber;
                    validate();
                } else {
                    if (!in_array($email, $emailStore)) {
                        if (preg_match("/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9]{2,4}$/", $email)) {
                            $sql = "select email from csvdata where email = '$email'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $_SESSION['error'] = $email . "This email id is already stored in database  " . $lineNumber;
                                validate();
                            } else {
                                array_push($emailStore, $email);
                            }
                        } else {
                            $_SESSION['error'] = "Invalid email in CSV file at line number " . $lineNumber;
                            validate();
                        }
                    } else {
                        $_SESSION['error'] = "Duplicate This email alredy Exist In CSV file  " . $lineNumber;
                        validate();
                    }
                }

                if (empty($mobileno)) {
                    $_SESSION['error'] = "Mobile Number is empty in CSV file line number " . $lineNumber;
                    validate();
                }
                if (!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $mobileno)) {
                    $_SESSION['error'] = "Inalid mobile number in CSV file at line Number  " . $lineNumber;
                    validate();
                }

                if (empty($company_name)) {
                    $_SESSION['error'] = "Company name is empty in CSV file at line Number  " . $lineNumber;
                    validate();
                }

                if (empty($address)) {
                    $_SESSION['error'] = "Address is empty in CSV file at line Number  " . $lineNumber;
                    validate();
                }

                if (empty($zip)) {
                    $_SESSION['error'] = "Zip code is empty in CSV file at line Number  " . $lineNumber;
                    validate();
                }
                if (preg_match("/[0-9]{6}/", $zip)) {
                    $_SESSION['error'] = "Zip code is not valid in CSV file at line Number  " . $lineNumber;
                    validate();
                }
                $dataArray[] = array($first_name, $last_name, $email, $mobileno, $company_name, $address, $zip);
            }
            // echo "<pre>";
            // print_r($dataArray);
            // die();
            foreach ($dataArray as $data) {
                $sql = "insert into csvdata (first_name,last_name,email,mobileno,company_name,address,zip) 
                    VALUES (' $data[0]','$data[1]','$data[2]',$data[3],'$data[4]','$data[5]',$data[6])";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $_SESSION['success'] = "File Uploaded Successfully";
                    header('location:ImportCSV.php');
                }
            }
        } else {
            echo "File Not Opened.";
        }
    }
}
