<?php
  session_start();
  //If there is no session, then redirect to page table with Scores.
  if(empty($_SESSION['admin_id'])) {
	  header("Location: tableScores.php");
  }
  require 'includes/dbconnect.php';
  require "php/commandsCategory.php";
  require "php/commandsTeam.php";

  //The content of this page depends on the action state.
  //If action is equal to edit, then will be opened recordScoresAdmin.php.
  //If there is no action, then will be opened recordsScoresAdmin.php.
  if(isset($_GET['action']))
    $action = $_GET['action'];
  else
    $action = "";

  if($action == "edit") {
    if(!isset($_GET['id']))
      header("Location: tableScoresAdmin.php");
    $id = (int)$_GET['id'];

    $tablename = $_GET['tablename'];

    if(!empty($_POST) && $id > 0) {
      record_edit($conn, $id, $_POST['task1'], $_POST['task2'], $_POST['task3'], $_POST['timem'], $_POST['times'], $tablename);
      header("Location: tableScoresAdmin.php");
    }

    $record = record_get($conn, $id, $tablename);
    require("recordScoresAdmin.php");
  } else {
    require("recordsScoresAdmin.php");
  }
?>
