<?php

/** Logout and Session Destroy */

session_start();
if (isset($_SESSION['id'])) {
    setcookie(session_name(), '', 100);
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    session_unset();
    session_destroy();
    $_SESSION = array();
}
header("Location: ../index.php");