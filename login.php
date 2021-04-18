<?php
require "includes/header.php"
?>
<h2>Sign in</h2>
<form action="index.php" method="post">    
<input type="text" name="email" placeholder="Enter Email"></input><br> 
<input type="password" name="password" placeholder="Enter Password"></input><br>
<button type="submit">Login</button><br>
<p>Don't have account?<a href="register.php">Create account</a></p>
</form>    

<?php
require "includes/footer.php"
?>