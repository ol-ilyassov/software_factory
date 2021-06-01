<?php

function recordsAll($conn, $tableName, $round)
{
    $tableName = trim($tableName);
    $tableName = mysqli_real_escape_string($conn, $tableName);
    $tableName = stripslashes($tableName);

    $stmt = "SELECT id, teamname, task1, task2, task3, 
       (task1 + task2 + task3) as 'total', time FROM `%s` 
       INNER JOIN `team` ON `%s`.team_id=team.team_id WHERE 
       round = %d ORDER BY total DESC, time ASC";
    $query = sprintf($stmt, $tableName, $tableName, $round);
    $result = mysqli_query($conn, $query);
    if (!$result)
        die(mysqli_error($conn));

    $n = mysqli_num_rows($result);
    $records = array();

    for ($i = 0; $i < $n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $records[] = $row;
    }

    return $records;
}
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "judge") {
    header("Location: /software_factory/");
}

$title = "Control";
include "../includes/header.php";
include "../database/connectDB.php";
$cat_id = 0;
$category = "";

$cat_query = "select category_id from judge_category where judge_id = '{$_SESSION['id']}'";
$result = mysqli_query($conn, $cat_query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$cat_id = $row['category_id'];

switch ($cat_id) {
    case 1:
        $category = "linefollower";
        break;
    case 2:
        $category = "kegelring";
        break;
}

?>
<div class="wrapper">
<div style="padding-left:20px">
    <h1>Judge Score Panel</h1><br>
</div>

<div>
<?php
        for ($round = 1; $round <= 3; $round++) {
            $counter = 0;
            $records = recordsAll($conn, $category, $round);

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
                            href="score_edit.php? id=<?= $a['id'] ?> & category=<?= $category ?>">
                                EDIT
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php
            }
        } ?>
</div>
</div>

<?php
include "../includes/footer.php";
?>

