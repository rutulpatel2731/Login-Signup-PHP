<?php
include_once '../connection/connection.php';

$sql = "SELECT e.userid, e.name, e.mobileno, e.gender,e.skill,e.state,e.country, GROUP_CONCAT(i.imgname) AS image_names
FROM employee e
LEFT JOIN image i ON e.userid = i.userid
GROUP BY e.userid, e.name, e.mobileno, e.gender;";
$result = mysqli_query($conn, $sql);

$output = "";
if (mysqli_num_rows($result) > 0) {
  $output = '<table class="table table-responsive" border="1">
               <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Mobile Number</th>
                 <th>Gender</th>
                 <th>Skills</th>
                 <th>State</th>
                 <th>Country</th>
                 <th>Image</th>
                 <th colspan="2">Action</th>
               </tr>';

  while ($row = mysqli_fetch_assoc($result)) {
    // echo "<pre>";
    // print_r($row);
    $imageNames = explode(',', $row["image_names"]);
    // echo "<pre>";
    // print_r($imageNames);
    $imageHtml = "";
    foreach ($imageNames as $imageName) {
      $imageUrl = './upload/' . $imageName;
      $imageUrl .= '?' . time();
      $imageHtml .= "<img src='$imageUrl' alt='No image found' height='120px' width='120px'/><br>";
    }

    $output .= "
                <tr>
                  <td>{$row["userid"]}</td>
                  <td>{$row["name"]}</td>
                  <td>{$row["mobileno"]}</td>
                  <td>{$row["gender"]}</td>
                  <td>{$row["skill"]}</td>
                  <td>{$row["state"]}</td>
                  <td>{$row["country"]}</td>
                  <td class='table-img'>
                    $imageHtml
                  </td>
                  <td>
                   <button class='updatebtn btn btn-success' data-uid='{$row["userid"]}' id='updatebtn'>Edit</button>
                  </td>
                  <td>
                  <button class='deletebtn btn btn-danger' data-did='{$row["userid"]}'>Delete</button>
                 </td>
                </tr>";
  }
  $output .= '</table>';
  echo $output;
} else {
  $output = '<table class="table table-responsive" border="1">
  <th>Id</th>
  <th>Name</th>
  <th>Mobile Number</th>
  <th>Gender</th>
  <th>Skills</th>
  <th>State</th>
  <th>Country</th>
  <th>Image</th>
  <th colspan="2">Action</th>

    <tr class="text-center">
    <td colspan="10"> No Data Found </td>
    </tr>
</table>';
  echo $output;
}
