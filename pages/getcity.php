<?php
include '../connection/connection.php';
$countryName = $_POST['countryName'];
$sql = "select s_name from states where c_name='$countryName'";
$result = mysqli_query($conn,$sql);
$html="<option value='disabled' disabled selected>Select State</option>";
while($row = mysqli_fetch_assoc($result)){
    // print_r($row["s_name"]);
    $html.='<option value='.$row['s_name'].'>'.$row['s_name'] .'</option>'; 
}
echo $html;
?>