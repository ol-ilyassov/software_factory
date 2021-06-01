<?php
$title = "Score Edit Page";
include "../includes/header.php";
include "../database/connectDB.php";
$id = $_REQUEST['id'];
$category = $_REQUEST['category'];
$query = " SELECT * from $category where id=$id "; 
$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$task1 =$_REQUEST['task1'];
$task2 =$_REQUEST['task2'];
$task3 =$_REQUEST['task3'];
$time =$_REQUEST['time'];
$update="update $category set task1='".$task1."', task2='".$task2."',
task3='".$task3."', time='".$time."' where id='".$id."'";
mysqli_query($conn, $update);
header("Location: control.php"); 
}else {
?>
<div class = "wrapper">
<div style="margin: 10px;">
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<div id="task1Div">
                    <label for="task1" class="label">Task #1</label>
                    <input id="task1" name="task1" type="text" value="<?= $row["task1"] ?>"
                           placeholder="Enter Points" min="0" max="10" required>
                    <p id="task1Error"></p>
                </div>
                <div id="task2Div">
                    <label for="task2" class="label">Task #2</label>
                    <input id="task2" name="task2" type="text" value="<?= $row["task2"] ?>"
                           placeholder="Enter Points" min="0" max="10" required>
                    <p id="task2Error"></p>
                </div>
                <div id="task3Div">
                    <label for="task3" class="label">Task #3</label>
                    <input id="task3" name="task3" type="text" value="<?= $row["task3"] ?>"
                           placeholder="Enter Points" min="0" max="10" required>
                    <p id="task3Error"></p>
                </div>
                <div id="timeDiv">
                    <label for="time" class="label">Time</label>
                    <input id="time" name="time" type="time" value="<?= $row["time"] ?>"
                           placeholder="Enter Minutes" step="1" min="00:00:00" max="00:02:00" required>
                    <p id="timeError"></p>
                </div>
                <div id="buttons">
                    <input id="btnSave" class="btn" name="scoresEditBtn" type="submit" value="Save">
                    <a class="btnLink" href="control.php">Back</a>
                </div>
</form>
</div>
</div>
<?php }; 
include "../includes/footer.php";
?>