<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "team") {
    header("Location: /software_factory/");
}

$title = "Profile";
include "../includes/header.php";
require "../database/connectDB.php";
require "../php/commandsTeam.php";
$row = getTeamInfoById($conn, $_SESSION['id']);
?>

<div class="wrapper">
    <div id="left-right">
        <div class="block0">
            <h2>Profile: "<?= $row['teamname'] ?>" </h2>
            <br><br>
            <div id="ti">
                <div id="tiLeft"><p>Category: </p></div>
                <div id="tiRight"><p> &nbsp;<?= $row['title'] ?></p></div>
                <div id="tiLeft"><p>Participant Name #1: </p></div>
                <div id="tiRight"><p> &nbsp;<?= $row['p1_fname'] ?></p></div>
                <div id="tiLeft"><p>Participant Surname #1: </p></div>
                <div id="tiRight"><p> &nbsp;<?= $row['p1_lname'] ?></p></div>
                <div id="tiLeft"><p>Participant Name #2: </p></div>
                <div id="tiRight"><p> &nbsp;<?= $row['p2_fname'] ?></p></div>
                <div id="tiLeft"><p>Participant Surname #2: </p></div>
                <div id="tiRight"><p> &nbsp;<?= $row['p2_lname'] ?></p></div>
                <div id="tiLeft"><p>Organisation: </p></div>
                <div id="tiRight"><p> &nbsp;<?= $row['organisation'] ?></p></div>
                <div id="tiLeft"><p>Locality: </p></div>
                <div id="tiRight"><p> &nbsp;<?= $row['locality'] ?></p></div>
                <div id="tiLeft"><p>Telephone: </p></div>
                <div id="tiRight"><p> &nbsp;<?= $row['phonenumber'] ?></p></div>
                <div id="tiLeft"><p>Email: </p></div>
                <div id="tiRight"><p> &nbsp;<?= $row['email'] ?></p></div>
            </div>
        </div>
    </div>
</div>

<?php
include "../includes/footer.php"
?>

