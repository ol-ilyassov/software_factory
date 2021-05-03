<?php
session_start();

$title = "Judge Control Panel";
include "../database/connectDB.php";
include "../includes/header.php";
include "judge_display.php";
?>

<div id="content">
<form style="margin: 50px 300px" name="form" method="post" action="judge_register.php"> 
<input type="hidden" name="new" value="1" />
<p>Judge Registration Form</p><br>
<p><input type="text" name="fname" placeholder="Enter First Name" required /></p><br>
<p><input type="text" name="lname" placeholder="Enter Last Name" required /></p><br>
<p><input type="text" name="description" placeholder="Enter Description" required /></p><br>
<p><input type="text" name="email" placeholder="Enter Email" required /></p><br>
<p><input type="text" name="password" placeholder="Enter Password" required /></p><br>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
</div>

<?php
include "../includes/footer.php"
?>