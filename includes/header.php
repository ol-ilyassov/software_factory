<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="/software_factory/src/stuff/logo.png"/>
    <link rel="stylesheet" href="/software_factory/css/main.css"/>
    <link rel="stylesheet" href="/software_factory/css/left-nav-style.css">
    <title><?= $title ?></title>
</head>
<body>
<script src="/software_factory/js/regPageDisplay.js"></script>
<input type="checkbox" id="nav-toggle" hidden>
<nav class="nav">
    <label for="nav-toggle" class="nav-toggle" onclick></label>
    <h2>Menu</h2>
    <ul>
        <li><a href="/software_factory/">Home</a></li>
        <li><a href="/software_factory/about">About</a></li>
        <li><a href="/software_factory/gallery">Gallery</a></li>
        <li><a href="/software_factory/rules">Rules</a></li>
        <li><a href="/software_factory/statistics">Statistics</a></li>
        <li><a href="/software_factory/scores">Score Tables</a></li>
        <?php
        if (isset($_SESSION["role"])) {
            $role = $_SESSION["role"];
            switch ($role) {
                case "team":
                    echo '<li><a href="/software_factory/team/profile">Profile</a></li>';
                    break;
                case "judge":
                    echo '<li><a href="/software_factory/judge/control">Control Panel</a></li>';
                    break;
                case "admin":
                    echo '<li><a href="/software_factory/admin/control">Control Panel</a></li>';
                    break;
            }
            echo '<li><a href="/software_factory/php/logout">Log out</a></li>';
        } else {
            echo '<li><a id="regPage" href="/software_factory/register">Team Registration</a></li>';
            echo '<li><a href="/software_factory/login">Login</a></li>';
        } ?>
    </ul>
</nav>

<header>
    <a href="/software_factory/"><img src="/software_factory/src/stuff/logo.png" alt="logo"></a>
</header>