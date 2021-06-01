<?php
include "../database/connectDB.php";
require "../php/config.php";

if(isset($_POST['new']) && $_POST['new']==1){
    $fname =$_REQUEST['fname'];
    $lname =$_REQUEST['lname'];
    $description =$_REQUEST['description'];
    $email =$_REQUEST['email'];
    $password =$_REQUEST['password'];
    $password = md5($password . secretKey1);
    $category = $_REQUEST['judgeCategory'];
    $category_id = 0;
    $id = 0;

    $ins_query="insert into judge
    (fname, lname, description, email, password)values
    ('$fname','$lname','$description','$email','$password')";
    mysqli_query($conn,$ins_query);
    $id = mysqli_insert_id($conn);

    switch ($category) {
        case 'Line Follower':
            $category_id = 1;
            break;
        case 'Kegelring':
            $category_id = 2;
            break;
    }

    $categoryQuery = "insert into judge_category
    (judge_id, category_id) values('$id','$category_id')";
    mysqli_query($conn,$categoryQuery);

    header('Location: judgeControlPanel.php');
}
?>
