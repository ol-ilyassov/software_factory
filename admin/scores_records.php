<?php
$title = "Scores Table [Administrator]";
require "../includes/header.php";
?>

<div class="wrapper">
    <div class="container">
        <h2>Scores Table | Line Follower</h2>
        <?php
        for ($round = 1; $round <= 3; $round++) {
            $tableName = 'lineFollower';
            $counter = 0;
            $records = recordsAll($conn, $tableName, $round);

            echo "<h3> Round #$round: </h3>";

            if (empty($records)) {
                echo "<div><p> - NO TEAMS - </p></div>";
            } else {
                ?>
                <div id="lineFollowerTableManage">
                    <div>#</div>
                    <div>Team</div>
                    <div><p>Task #1</p></div>
                    <div><p>Task #2</p></div>
                    <div><p>Task #3</p></div>
                    <div><p>Total</p></div>
                    <div><p>Time</p></div>
                    <div><p>ACTION</p></div>
                    <?php foreach ($records as $a): ?>
                        <div><?= ++$counter ?></div>
                        <div><?= $a["teamname"] ?></div>
                        <div><?= $a["task1"] ?></div>
                        <div><?= $a["task2"] ?></div>
                        <div><?= $a["task3"] ?></div>
                        <div><?= $a["total"] ?></div>
                        <div><?= $a["time"] ?></div>
                        <div>
                            <a class="btnLink"
                               href="scores.php?action=edit&tableName=<?= $tableName ?>&id=<?= $a['id'] ?>">
                                EDIT
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php
            }
        } ?>
        <br>
        <br>
    </div>
</div>

<?php
require "../includes/footer.php";
?>
