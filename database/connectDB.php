<?php
require_once "config.php";
require_once "Database.php";

// Object of Database Class
$connection = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

// Connection to MySQl Database
$conn = $connection->connect();
mysqli_set_charset($conn, 'utf8');
