<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "judge") {
    header("Location: /software_factory/");
}

$title = "Profile";
include "../includes/header.php"
?>

<div style="padding-left:20px">
    <h1>Judge Profile</h1>
    <h2>Some content...</h2>
</div>

<?php
include "../includes/footer.php"
?>

