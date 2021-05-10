<?php
session_start();
if (empty($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: /software_factory/");
}

$title = "ROBOTICS";
require "../includes/header.php"
?>

<div class="wrapper">
    <div>
        <p>Judge Control:</p>
        <a class="btnLink" href="/software_factory/admin/judge_display">Go</a><br>
    </div>
    <div>
        <p>Categories Control:</p>
        <a class="btnLink" href="/software_factory/admin/scores">Go</a><br>
    </div>
    <div>
        <p>Teams Control:</p>
        <a class="btnLink" href="/software_factory/admin/teams">Go</a><br>
    </div>
    <div>
        <p>Register Page Access:</p>
        <p>Status: [<span>Status</span>]</p>
        <input id="" class="btn" name="registerAccessBtn" type="button" value="Change">
    </div>
</div>

<?php
require "../includes/footer.php"
?>
