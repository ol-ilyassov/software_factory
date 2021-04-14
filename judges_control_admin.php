<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Receive all functions from functions_judge.php file
require_once("functions_judge.php");
//Connect to database phpmyadmin by using php file
require_once("dbconnect.php");
$con = db_connect();
//This page can only be accessed if there is an admin session  
if(!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
}
//Depending on this variable in the address bar, admin will get access to open page with editing the data of judge    
//Generally will be shown table with data of all judges in this page. Depending on next conditions, admin will get ability to different functions(change category of judge and delete data of judge from database)
if(isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = "";

//Give ability to admin for editing data of one judge in database
if($action == "edit"){
    if(!isset($_GET['id']))
        header("Location: judges_control_admin.php");

    $id = (int)$_GET['id'];

    if(!empty($_POST) && $id > 0) {
        judges_edit($con, $id, $_POST['id_category']);
        header("Location: judges_control_admin.php");
    }

    $judge = judges_get($con, $id);
    include("judge_edit.php");        
}
else 
    //Give ability to admin for deleting data about one judge in database
    if($action =='delete'){
        $id = $_GET['id'];
        $judge = judges_delete($con, $id);
        header("Location: judges_control_admin.php");
    }
    else{
        $judges = judges_all($con);
        include("judge_list.php");
    }
?>