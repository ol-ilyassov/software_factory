
<!-- Header -->

<?php
  $title= "«RIG» - Record";
  require 'includes/header.php';
?>

<!-- Content -->

<div class="wrapper">
  <div id="left-right">
    <article class="block0">
      <h2>Rules: </h2>
      <p> - In order to change values, you should follow the list of rules:</p>
      <ul>
        <li>Task #1: [0 - 10] points</li>
        <li>Task #2: [0 - 10] points</li>
        <li>Task #3: [0 - 10] points</li>
        <li>Time: [0 - 2] minutes</li>
        <li>Time: [0 - 59] seconds</li>
      </ul>
      <p> - Note: If the number of minutes is 02:00, then the number of seconds cannot be more than 00:00.</p>
    </article>
    <hr>
    <article class="block1">
      <h2>Team Name: "<?=getTeamName($conn, (int)$record['team_id'])?>"</h2>
      <center><br>
      <form method="post" action="tableScoresAdmin.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>&tablename=<?=$_GET['tablename']?>">
        <div>
          <label>Task 1 (max.10)<br></label>
	        <input class="generalInput" type="text" name="task1" value="<?=$record['task1']?>" placeholder="Enter Points" required>
        </div>
        <div>
          <label>Task 2 (max.10)<br></label>
		      <input class="generalInput" type="text" name="task2" value="<?=$record['task2']?>" placeholder="Enter Points" required>
        </div>
        <div>
          <label>Task 3 (max.10)<br></label>
		      <input class="generalInput" type="text" name="task3" value="<?=$record['task3']?>" placeholder="Enter Points" required>
        </div>
        <div>
		      <label>Minutes<br></label>
	        <input class="generalInput" type="text" name="timem" value="<?=$record['timem']?>" placeholder="Enter Minutes"  required>
        </div>
        <div>
	        <label>Seconds<br></label>
	        <input class="generalInput" type="text" name="times" value="<?=$record['times']?>" placeholder=" Enter Seconds" required>
        </div><br>
        <div>
          <input class="inputButton" type="submit" value="Save" >
          <a class="aButton" href="tableScoresAdmin.php"><div class="alinkButton">Back</div></a>
        </div><br>
    </form>
    <br></center>
  </div>
</div>

<!-- Footer -->

<?php require 'includes/footer.php'; ?>
