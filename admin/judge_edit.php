<?php
$title = "Judge Edit Page";
include "../includes/header.php";
include "../database/connectDB.php";
$id=$_REQUEST['id'];
$query = "SELECT * from judge where judge_id='".$id."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$fname =$_REQUEST['fname'];
$lname =$_REQUEST['lname'];
$description =$_REQUEST['description'];
$email =$_REQUEST['email'];
$password =$_REQUEST['password'];
$update="update judge set fname='".$fname."', lname='".$lname."',
description='".$description."', email='".$email."', password='".$password."'  
where judge_id='".$id."'";
mysqli_query($conn, $update);
header("Location: judgeControlPanel.php"); 
}else {
?>
<div class = "wrapper">
<div style="margin: 10px;">
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['judge_id'];?>" />
<p><input type="text" name="fname" placeholder="Enter First Name" 
required value="<?php echo $row['fname'];?>" /></p><br>
<p><input type="text" name="lname" placeholder="Enter Last Name" 
required value="<?php echo $row['lname'];?>" /></p><br>
<p><input type="text" name="description" placeholder="Enter Description" 
required value="<?php echo $row['description'];?>" /></p><br>
<p><input type="text" name="email" placeholder="Enter Email" 
required value="<?php echo $row['email'];?>" /></p><br>
<p><input type="text" name="password" placeholder="Enter Password" 
required value="<?php echo $row['password'];?>" /></p><br>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
</div>
</div>
<?php }; 
include "../includes/footer.php";
?>