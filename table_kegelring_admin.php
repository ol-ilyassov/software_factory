<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Receive functions that are stored in commands_kegelring.php file.
require_once("commands_kegelring.php");
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();

//This page can only be accessed if there is an admin session or judge session with the value of a specific category.
if(((isset($_SESSION['judge_id']))&&($_SESSION['judge_category'] == '2')) || (isset($_SESSION['admin_id']))) {

//Depending on this variable in the address bar, judge will get access to open page with editing the data of a certain participant.
if(isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = "";
//If there is a value 'edit', judge will get ability to open a page with editing data of certain participant.
if($action == "edit"){
    if(!isset($_GET['id']))
        header("Location: table_kegelring_admin.php");
        $id = (int)$_GET['id'];
        
        $tablename = $_GET['tablename'];

        if(!empty($_POST) && $id > 0) {
            records_edit($con, $id, $_POST['white_count'], $_POST['black_count'], $_POST['timem'], $_POST['times'],$tablename);
            record_final($con,$id);
            header("Location: table_kegelring_admin.php");}

        $record = records_get($con, $id,$tablename);
        include("record_kegelring_admin.php");        
}
else{   
    include("records_kegelring_admin.php");}
}
else {
    header("Location: table_kegelring.php");
}
?>