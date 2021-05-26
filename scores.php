<?php
$title = "Score Tables";
require "database/connectDB.php";
require "php/getScores.php";
require "includes/header.php";
?>

<div class="wrapper">
    <div id="left-right">
        <div class="block0">
            <h2>Scores Table | Line Follower</h2>

            <?php
            for ($round = 1; $round <= 3; $round++) {
                $tableName = 'lineFollower';
                $counter = 0;
                $records = recordsAll($conn, $tableName, $round);

                echo "<h3> Round #$round: </h3>";

                if (empty($records)) {
                    echo "<div class='centerLock'><p> - NO TEAMS - </p></div>";
                } else {
                    ?>
                    <div id="table_scores">
                        <div id="tsLeftHead">#</div>
                        <div id="tsRighterHead">Team</div>
                        <div id="tsRighterHead">Task #1</div>
                        <div id="tsRighterHead">Task #2</div>
                        <div id="tsRighterHead">Task #3</div>
                        <div id="tsRighterHead">Total</div>
                        <div id="tsRighterHead">Time</div>
                        <?php foreach ($records as $a): ?>
                            <div id="tsLeftBlock"><?= ++$counter ?></div>
                            <div id="tsRighterBlock"><?= $a["teamname"] ?></div>
                            <div id="tsRighterBlock"><?= $a["task1"] ?></div>
                            <div id="tsRighterBlock"><?= $a["task2"] ?></div>
                            <div id="tsRighterBlock"><?= $a["task3"] ?></div>
                            <div id="tsRighterBlock"><?= $a["total"] ?></div>
                            <div id="tsRighterBlock"><?= $a["time"] ?></div>
                        <?php endforeach ?>
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
</div>

<?php
require "includes/footer.php";
?>
