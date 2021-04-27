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
        <a href="/software_factory/about.php">About</a>
        <a href="/software_factory/gallery.php">Gallery</a>
        <a href="/software_factory/rules.php">Rules</a>
        <a href="/software_factory/statistics.php">Statistics</a>
        <?php
        if (isset($_SESSION["role"])) {
            $role = $_SESSION["role"];
            switch ($role) {
                case 'team':
                    // 1
                    echo '<a href="/software_factory/team/profile.php">Profile</a>';
                    echo '<a href="/software_factory/team/control.php">Control Panel</a>';
                    break;
                case 'judge':
                    // 2
                    echo '<a href="/software_factory/judge/profile.php">Profile</a>';
                    echo '<a href="/software_factory/judge/control.php">Control Panel</a>';
                    break;
                case 'admin':
                    // 3
                    echo '<a href="/software_factory/admin/profile.php">Profile</a>';
                    echo '<a href="/software_factory/admin/control.php">Control Panel</a>';
                    break;
            }
            echo '<a href="/software_factory/php/logout.php">Log out</a>';
        } else {
            echo '<a href="/software_factory/scores.php">Score Tables</a>';
            echo '<a href="/software_factory/register.php">Register Team</a>';
            echo '<a href="/software_factory/login.php">Login</a>';
        } ?>


    </div>
</header>