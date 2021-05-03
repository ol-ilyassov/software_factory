<?php
include "../database/connectDB.php";
$id=$_GET['id'];
$query = "DELETE FROM judge WHERE judge_id=$id"; 
$result = mysqli_query($conn,$query);
header("Location: judgeControlPanel.php"); 
?>