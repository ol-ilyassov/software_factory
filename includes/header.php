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
    <link rel="shortcut icon" href="/software_factory/src/stuff/logo-transp.png"/>
    <link rel="stylesheet" href="/software_factory/css/main.css"/>
    <title><?= $title ?></title>
</head>
<body>
<header>
    <a href="/software_factory/" class="logo">RoboticsLogo</a>
    <div class="header-right">
        <a href="/software_factory/">Home</a>
        <a href="/software_factory/about">About</a>
        <a href="/software_factory/gallery">Gallery</a>
        <a href="/software_factory/rules">Rules</a>
        <a href="/software_factory/statistics">Statistics</a>
        <a href="/software_factory/scores">Score Tables</a>
        <?php
        if (isset($_SESSION["role"])) {
            $role = $_SESSION["role"];
            switch ($role) {
                case "team":
                    echo '<a href="/software_factory/team/profile">Profile</a>';
                    echo '<a href="/software_factory/team/control">Control Panel</a>';
                    break;
                case "judge":
                    echo '<a href="/software_factory/judge/profile">Profile</a>';
                    echo '<a href="/software_factory/judge/control">Control Panel</a>';
                    break;
                case "admin":
                    echo '<a href="/software_factory/admin/profile">Profile</a>';
                    echo '<a href="/software_factory/admin/control">Control Panel</a>';
                    break;
            }
            echo '<a href="/software_factory/php/logout">Log out</a>';
        } else {
            //if
            echo '<a href="/software_factory/register">Register Team</a>';
            echo '<a href="/software_factory/login">Login</a>';
        } ?>

    </div>
</header>