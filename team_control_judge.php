<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Receive all functions from functions_team.php file
require_once("functions_team.php");
//Connect to database phpmyadmin by using php file
require_once("dbconnect.php");
$con = db_connect();
//This page can only be accessed if there is an judge session  
if(!isset($_SESSION['judge_id'])) {
    header("Location: index.php");
}
//Depending on this variable in the address bar, judge will get access to open page with editing the data of team    
//Generally will be shown table with data of all teams in this page. Depending on next conditions, judge will get ability to different functions(get full personl data about team or delete team's data from database)
if(isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = "";

//Give ability to judge for editing data of one team in database
if($action == "show"){
    if(!isset($_GET['id']))
        header("Location: team_control_judge.php");

    $id = (int)$_GET['id'];

    $team = teams_get($con, $id);
    include("team_show.php");        
}
else 
    //Give ability to judge for deleting data about one team in database
    if($action =='delete'){
        $id = $_GET['id'];
        $team = teams_delete($con, $id);
        header("Location: team_control_judge.php");
    }
    else{
        if($_SESSION['judge_category'] == 2) {
            $tablename = 'kegelring_final';
            $teams_kegelring = teams_all_onecategory($con,$tablename);
        }
        else {
            if($_SESSION['judge_category'] == 1){
                $tablename = 'linefollower_final';
                $teams_linefollower = teams_all_onecategory($con,$tablename);
            }
        }
        include("team_list.php");
    }
?>