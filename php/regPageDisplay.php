<?php
require_once "../database/connectDB.php";

//Returns the value of registerControlPage.
if (isset($_POST['action']) && $_POST['action'] == "onUpdate") {
    $query = "SELECT value FROM settings WHERE parameter = 'registerAccess'";
    $result = mysqli_query($conn, $query);
    $temp = mysqli_fetch_assoc($result);
    echo $temp['value'];
}



