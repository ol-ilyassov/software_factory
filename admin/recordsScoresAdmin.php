
<!-- Header -->

<?php
  $title= "«RIG» - Scores Table";
  require 'includes/header.php';
?>

<!-- Content -->

<div class="wrapper">
  <div id="left-right">
    <article class="block0">
      <h2>Scores Table | Line Follower: </h2>
      <br><br>
      <?php
        $tablename = 'linefollower';
        $records = records_all($conn, $tablename);
        if (empty($records)) {
          echo "<center><p> - NO TEAMS - </p></center>";
        } else {
      ?>
      <div id="tsa">
        <div id="tsaLeftHead">Team</div>
        <div id="tsaRighterHead"><p>Task #1</p><p>(max.10)</p></div>
        <div id="tsaRighterHead"><p>Task #2</p><p>(max.10)</p></div>
        <div id="tsaRighterHead"><p>Task #3</p><p>(max.10)</p></div>
        <div id="tsaRighterHead"><p>Overall</p><p>(max.30)</p></div>
        <div id="tsaRighterHead"><p>Time</p><p>(max. 02:00)</p></div>
        <div id="tsaRighterHead"><p>ACTION</p></div>
        <?php foreach($records as $a): ?>
        <div id="tsaLeftBlock"><?=getTeamName($conn, $a['team_id'])?></div>
        <div id="tsaRighterBlock"><?=$a['task1']?></div>
        <div id="tsaRighterBlock"><?=$a['task2']?></div>
        <div id="tsaRighterBlock"><?=$a['task3']?></div>
        <div id="tsaRighterBlock"><?=$a['sum_scores']?></div>
        <div id="tsaRighterBlock"><?=getProperTime($a['timem'], $a['times'])?></div>
        <div id="tsaRighterBlock">
          <a class="aButton" href="tableScoresAdmin.php?action=edit&id=<?=$a['id']?>&tablename=<?=$tablename?>"><div class="alinkButton">EDIT</div></a>
        </div>
        <?php endforeach ?>
      </div>
      <?php } ?>
      <br>
    </article>
    <hr>
    <article class="block1">
      <h2>Scores Table | Kegelring: </h2>
      <br><br>
      <?php
        $tablename = 'kegelring';
        $records = records_all($conn, $tablename);
        if (empty($records)) {
          echo "<center><p> - NO TEAMS - </p></center>";
        } else {
      ?>
      <div id="tsa">
        <div id="tsaLeftHead">Team</div>
        <div id="tsaRighterHead"><p>Task #1</p><p>(max.10)</p></div>
        <div id="tsaRighterHead"><p>Task #2</p><p>(max.10)</p></div>
        <div id="tsaRighterHead"><p>Task #3</p><p>(max.10)</p></div>
        <div id="tsaRighterHead"><p>Overall</p><p>(max.30)</p></div>
        <div id="tsaRighterHead"><p>Time</p><p>(max. 02:00)</p></div>
        <div id="tsaRighterHead"><p>ACTION</p></div>
        <?php foreach($records as $a): ?>
        <div id="tsaLeftBlock"><?=getTeamName($conn, $a['team_id'])?></div>
        <div id="tsaRighterBlock"><?=$a['task1']?></div>
        <div id="tsaRighterBlock"><?=$a['task2']?></div>
        <div id="tsaRighterBlock"><?=$a['task3']?></div>
        <div id="tsaRighterBlock"><?=$a['sum_scores']?></div>
        <div id="tsaRighterBlock"><?=getProperTime($a['timem'], $a['times'])?></div>
        <div id="tsaRighterBlock">
          <a class="aButton" href="tableScoresAdmin.php?action=edit&id=<?=$a['id']?>&tablename=<?=$tablename?>"><div class="alinkButton">EDIT</div></a>
        </div>
        <?php endforeach ?>
      </div>
      <?php } ?>
      <br>
    </article>
  </div>
</div>

<!-- Footer -->

<?php require 'includes/footer.php'; ?>
