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
        <a class="btnLink" href="/software_factory/admin/judge_display">Go</a>
    </div>
    <div>
        <p>Categories Control:</p>
        <a class="btnLink" href="/software_factory/admin/scores">Go</a>
    </div>
    <div>
        <p>Teams Control:</p>
        <a class="btnLink" href="/software_factory/admin/teams">Go</a>
    </div>
    <div>
        <p>Gallery Control:</p>
        <a class="btnLink" href="/software_factory/admin/gallery">Go</a>
    </div>
    <div>
        <p>Register Page Access:</p>
        <p>Status: [<span id="registerPageStatus">Status</span>]</p>
        <input id="registerAccessBtn" class="btn" name="registerAccessBtn" type="button" value="Change">
    </div>
</div>

<script src="../js/regPageAccess.js"></script>

<?php
require "../includes/footer.php"
?>
