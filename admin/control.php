<?php
session_start();
if (empty($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: /software_factory/");
}

$title = "Control Panel";
require "../includes/header.php"
?>

<div class="wrapper">
    <div id="left-right">
        <div class="block0">
            <h2>Profile</h2>
        </div>
        <hr>
        <div class="block1">
            <h2>Functions</h2>
            <div class="controlDiv">
                <p>Judge Control:</p>
                <a class="btnLink" href="/software_factory/admin/judgeControlPanel">Go</a>
            </div>
            <div class="controlDiv">
                <p>Categories Control:</p>
                <a class="btnLink" href="/software_factory/admin/scores">Go</a>
            </div>
            <div class="controlDiv">
                <p>Teams Control:</p>
                <a class="btnLink" href="/software_factory/admin/teamsControlPage">Go</a>
            </div>
            <div class="controlDiv">
                <p>Gallery Control:</p>
                <a class="btnLink" href="/software_factory/admin/gallery">Go</a>
            </div>
            <div class="controlDiv">
                <p>Access to Registration<br>
                Status: [<span id="registerPageStatus">Status</span>]</p>
                <input id="registerAccessBtn" class="btn" name="registerAccessBtn" type="button" value="Modify">
            </div>
        </div>
    </div>
</div>

<script src="../js/regPageAccess.js"></script>

<?php
require "../includes/footer.php"
?>
