<?php
session_start();

$title = "RIG - Winners";
require "includes/header.php";

require "php/getFinalResults.php";

$categories = [
    ["Line Follower", "linefollower"],
    ["Kegelring", "kegelring"]
];

?>

<div class="wrapper">
    <div id="left-right">
        <div class="block0">
            <h2>Winners List: </h2>
            <br>
            <?php
            foreach ($categories as $category) {
                echo "<h2>" . $category[0] . "</h2>";
                $table = getFinalResults($conn, $category[1]);
                if (empty($table)) {
                    echo "<div class='centerLock'><p> - NO TEAMS - </p></div>";
                } else {
                    $steps = 0;
                    $counter = 0;
                    ?>
                    <div id="table_scores_winners">
                        <div id="tsLeftHead">Place</div>
                        <div id="tsRighterHead">Team</div>
                        <div id="tsRighterHead">Total</div>
                        <div id="tsRighterHead">Time</div>
                        <?php foreach ($table as $a): ?>
                            <div id="tsLeftBlock">#<?= ++$counter ?></div>
                            <div id="tsRighterBlock"><?= $a["teamname"] ?></div>
                            <div id="tsRighterBlock"><?= $a["total"] ?></div>
                            <div id="tsRighterBlock"><?= $a["time"] ?></div>
                            <?php
                            if ($steps == 2) {
                                break;
                            } else {
                                $steps++;
                            }
                        endforeach; ?>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>

<?php
require "includes/footer.php";
?>
