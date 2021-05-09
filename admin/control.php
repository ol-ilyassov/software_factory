<?php
session_start();
if (empty($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: /software_factory/");
}

$title = "ROBOTICS";
require "../includes/header.php"
?>

<div class="wrapper">
    <a href="/software_factory/admin/judge_display">Judge</a><br>
    <a href="/software_factory/admin/scores">Categories</a><br>
    <a href="/software_factory/admin/teams">Teams</a><br>
    <a href="/software_factory/admin/registerControl">Register Page</a>
</div>

<?php
require "../includes/footer.php"
?>
