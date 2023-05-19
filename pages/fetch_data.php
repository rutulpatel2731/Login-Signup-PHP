<?php
include_once '../connection/connection.php';

$sql = "select * from employee";
$result = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '<table class="table table-responsive" border="1">
               <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Mobile Number</th>
                 <th>Gender</th>
                 <th>Image</th>
                 <th colspan="2">Action</th>
               </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
                <tr>
                  <td>{$row["id"]}</td>
                  <td>{$row["name"]}</td>
                  <td>{$row["mobileno"]}</td>
                  <td>{$row["gender"]}</td>
                  <td>
                    <img src='./upload/{$row["image"]}?".time()."' alt='No image found'  height='120px' widrh='120px'/> 
                  </td>
                  <td>
                   <button class='updatebtn btn btn-success' data-uid='{$row["id"]}' id='updatebtn'>Edit</button>
                  </td>
                  <td>
                  <button class='deletebtn btn btn-danger'data-did='{$row["id"]}'>Delete</button>
                 </td>
                </tr>";
    }
    $output .= '</table>';
    echo $output;
} else {
    $output = '<table class="table table-responsive" border="1">
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Mobile Number</th>
      <th>Gender</th>
      <th>Image</th>
    </tr>

    <tr class="text-center">
    <td colspan="4"> No Data Found </td>
    </tr>
</table>';
    echo $output;
}
