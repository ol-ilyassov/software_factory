<!-- Header -->

<?php
session_start();

if (empty($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: /software_factory/");
}
require "../database/connectDB.php";
require "../php/commandsTeam.php";
$row = getTeamInfoById($conn, $_GET['id']);

$title = "«RIG» - " . $row['teamname'] . " Info";
require "../includes/header.php";
?>

<!-- Content -->

<div class="wrapper">
    <div id="left-right">
        <article class="block0">
            <h2>Team Info: "<?= $row['teamname'] ?>" </h2>
            <br><br>
            <div id="ti">
                <div id="tiLeft"><p>Category: </p></div>
                <div id="tiRight"><?= $row['category_id'] ?></div>
                <div id="tiLeft"><p>Participant Name #1: </p></div>
                <div id="tiRight"><?= $row['p1_fname'] ?></div>
                <div id="tiLeft"><p>Participant Surname #1: </p></div>
                <div id="tiRight"><?= $row['p1_lname'] ?></div>
                <div id="tiLeft"><p>Participant Name #2: </p></div>
                <div id="tiRight"><?= $row['p2_fname'] ?></div>
                <div id="tiLeft"><p>Participant Surname #2: </p></div>
                <div id="tiRight"><?= $row['p2_lname'] ?></div>
                <div id="tiLeft"><p>Organisation: </p></div>
                <div id="tiRight"><?= $row['organisation'] ?></div>
                <div id="tiLeft"><p>Locality: </p></div>
                <div id="tiRight"><?= $row['locality'] ?></div>
                <div id="tiLeft"><p>Telephone: </p></div>
                <div id="tiRight"><?= $row['phonenumber'] ?></div>
                <div id="tiLeft"><p>Email: </p></div>
                <div id="tiRight"><?= $row['email'] ?></div>
            </div>
            <center><a class="aButton" href="teamsControlPage.php">
                    <div class="alinkButton">BACK</div>
                </a></center>
            <br>
        </article>
    </div>
</div>

<!-- Footer -->

<?php require "../includes/footer.php"; ?>
