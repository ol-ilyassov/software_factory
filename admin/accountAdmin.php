
<!-- Header -->

<?php
  session_start();
  //If there is no session, then redirect to Home Page.
  if(!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
  }
  $title= "«RIG» - Account";
  require 'includes/header.php';
?>

<!-- Content -->

<div class="wrapper">
	<div id="left-right">
		<article class="block0">
      <h2>Profile: </h2>
      <center><p><span style="color:grey;">Admin: </span> <?=$_SESSION['admin_name']?></p></center>
    </article>
    <hr>
    <article class="block1">
      <h2>Functions: </h2>
      <center>
      <div style="border: 1px solid darkorange;">
        <p>Teams Control Page</p>
        <a class="aButton" href='teamsControlPage.php'><div class="alinkButton">Open</div></a>
      </div>
      <br>
      <div style="border: 1px solid darkorange;">
        <p>Registration Page Status [<span id="regState"></span>]</p>
        <input type="button" class="inputButton" id="regChangeState" name="regChangeState" value="Change">
      </div>
      </center>
    </article>
  </div>
</div>

<!-- Footer -->

<?php require 'includes/footer.php'; ?>
