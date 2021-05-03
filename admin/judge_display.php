<?php
include "../database/connectDB.php";
$query = "SELECT * FROM judge";
$statement = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($statement);
$result = array();
if($number_of_rows > 0) {
    while($row = mysqli_fetch_assoc($statement)){
        $result[] = $row;
    }
}

$output = '';
$output .= '
 <table style="margin:50px auto">
  <tr>
   <th>ID</th>
   <th>Firstname</th>
   <th>Lastname</th>
   <th>Description</th>
   <th>Email</th>
   <th>Edit</th>
   <th>Delete</th>
  </tr>
';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
  <tr>
   <td>'.$count.'</td>
   <td>'.$row["fname"].'</td>
   <td>'.$row["lname"].'</td>
   <td>'.$row["description"].'</td>
   <td>'.$row["email"].'</td>
   <td><a href="judge_edit.php? id='.$row["judge_id"].'">Edit</a></td>
   <td><a href="judge_delete.php? id='.$row["judge_id"].'">Delete</a></td>
  </tr>
  ';
 }
}
else
{
 $output .= '
  <tr>
   <td colspan="6" align="center">No Data Found</td>
  </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
