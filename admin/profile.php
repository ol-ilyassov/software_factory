<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: /software_factory/");
}

$title = "Profile";
include "../includes/header.php"
?>

<div style="padding-left:20px">
    <h1>Admin Profile</h1>
    <h2>Some content...</h2>
</div>

<?php
include "../includes/footer.php"
?>

