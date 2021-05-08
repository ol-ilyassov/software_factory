<?php
include "../database/connectDB.php";
if(isset($_POST['new']) && $_POST['new']==1){
    $fname =$_REQUEST['fname'];
    $lname =$_REQUEST['lname'];
    $description =$_REQUEST['description'];
    $email =$_REQUEST['email'];
    $password =$_REQUEST['password'];

    $ins_query="insert into judge
    (fname, lname, description, email, password)values
    ('$fname','$lname','$description','$email','$password')";
    mysqli_query($conn,$ins_query);
    header('Location: judgeControlPanel.php');
}
?>
