<?php
  require_once "config.php";
  require_once "Database.php";

  //Creates a new object of Database Class.
  $connect = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

	//Connects to MySQL database.
  $conn = $connect->connect();
  mysqli_set_charset($conn, 'utf8');
?>
