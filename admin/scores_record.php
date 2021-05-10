
<?php
$title = "Update Scores";
require "../includes/header.php";
?>

<div class="wrapper">
    <div class="container">
        <div class="">
            <h2>Rules:</h2>
            <p> - In order to change values, you should follow the list of rules:</p>
            <ul>
                <li>Task #1: [0 - 10] points</li>
                <li>Task #2: [0 - 10] points</li>
                <li>Task #3: [0 - 10] points</li>
                <li>Time: [0 - 2] minutes</li>
            </ul>
        </div>
        <hr>
        <div class="">
            <h2>Team: <?= $record["teamname"] ?></h2>
            <h3>Round #<?= $record["round"] ?></h3>
            <form role="form" method="POST" name="scoreEdit"
                  action="scores.php?action=edit&tableName=<?= $_GET["tableName"] ?>&id=<?= $_GET["id"] ?>">
                <div id="task1Div">
                    <label for="task1" class="label">Task #1</label>
                    <input id="task1" name="task1" type="text" value="<?= $record["task1"] ?>"
                           placeholder="Enter Points" min="0" max="10" required>
                    <p id="task1Error"></p>
                </div>
                <div id="task2Div">
                    <label for="task2" class="label">Task #2</label>
                    <input id="task2" name="task2" type="text" value="<?= $record["task2"] ?>"
                           placeholder="Enter Points" min="0" max="10" required>
                    <p id="task2Error"></p>
                </div>
                <div id="task3Div">
                    <label for="task3" class="label">Task #3</label>
                    <input id="task3" name="task3" type="text" value="<?= $record["task3"] ?>"
                           placeholder="Enter Points" min="0" max="10" required>
                    <p id="task3Error"></p>
                </div>
                <div id="timeDiv">
                    <label for="time" class="label">Time</label>
                    <input id="time" name="time" type="time" value="<?= $record["time"] ?>"
                           placeholder="Enter Minutes" step="1" min="00:00:00" max="00:02:00" required>
                    <p id="timeError"></p>
                </div>
                <div id="buttons">
                    <input id="btnSave" class="btn" name="scoresEditBtn" type="submit" value="Save">
                    <a class="btnLink" href="scores.php">Back</a>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>

<script src="../js/scoresEdit.js"></script>

<?php require "../includes/footer.php"; ?>
