<!-- Header -->

<?php
session_start();
//If there is no session, then redirect to Home Page.
if (empty($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: /software_factory/");
}
require "../database/connectDB.php";
require "../php/commandsTeam.php";

$title = "«RIG» - Teams Control";
require "../includes/header.php";
?>

<!-- Content -->

<div class="wrapper">
    <div id="left-right">
        <div class="block0">
            <h2>Category: Line Follower</h2>
            <br><br>
            <?php
            $records = teams_all_onecategory($conn, 1);
            if (empty($records)) {
                echo "<div class='centerLock'><p> - NO TEAMS - </p></div>";
            } else {
                ?>
                <div id="tcp">
                    <div id="tcpLeftHead">TEAM</div>
                    <div id="tcpRightHead">ACTION</div>
                    <?php
                    foreach ($records as $a):
                        ?>
                        <div id="tcpLeftBlock"><?= getTeamName($conn, $a['team_id']) ?></div>
                        <div id="tcpRightBlock">
                            <a class="btnLink" href="team_info.php?id=<?= $a['team_id'] ?>">INFO</a>
                            <a class="btnLink" href="php/deleteTeam.php?id=<?= $a['team_id'] ?>">DELETE</a>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php } ?>
            <br>
        </div>
        <hr>
        <div class="block1">
            <h2>Category: Kegelring</h2>
            <br><br>
            <?php
            $records = teams_all_onecategory($conn, 2);
            if (empty($records)) {
                echo "<div class='centerLock'><p> - NO TEAMS - </p></div>";
            } else {
                ?>
                <div id="tcp">
                    <div id="tcpLeftHead">TEAM</div>
                    <div id="tcpRightHead">ACTION</div>
                    <?php
                    foreach ($records as $a):
                        ?>
                        <div id="tcpLeftBlock"><?= getTeamName($conn, $a['team_id']) ?></div>
                        <div id="tcpRightBlock">
                            <a class="btnLink" href="team_info.php?id=<?= $a['team_id'] ?>">INFO</a>
                            <a class="btnLink" href="php/deleteTeam.php?id=<?= $a['team_id'] ?>">DELETE</a>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php } ?>
            <br>
        </div>
    </div>
</div>

<!-- Footer -->

<?php require "../includes/footer.php"; ?>
