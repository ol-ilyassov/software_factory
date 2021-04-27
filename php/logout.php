<?php
session_start();

/** Logout and Session Destroy */

if (isset($_SESSION['id'])) {
    setcookie(session_name(), '', 100);
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    session_unset();
    session_destroy();
    $_SESSION = array();
}
header("Location: /software_factory/");