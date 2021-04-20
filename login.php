<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="src/stuff/logo-transp.png"/>
    <link rel="stylesheet" href="css/main.css"/>
    <title>Authorization</title>
</head>
<head>
    <link rel="stylesheet" href="css/register.css"/>
</head>
<body>
<header>
    <img width="100px" height="100px" src="src/stuff/logo-white.png">
</header>

<div class="wrapper">
    <div class="container">
        <h1>Authorization Form</h1>
        <form role="form" method="POST" name="log-form">
            <div id="log-form-display">
                <div id="log-email_div">
                    <label for="log-email" id="label">Email:</label><br>
                    <input id="log-email" type="text">
                    <p id="log-email_err"></p>
                </div>
                <div id="log-password_div">
                    <label for="log-password" id="label">Password:</label><br>
                    <input id="log-password" type="text">
                    <p id="log-password_err"></p>
                </div>
                <div id="buttons">
                    <button id="log-login">Login</button>
                    <button id="log-clear">Clear</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="js/login-register.js"></script>

<footer>
    <p>(c) All rights Reserved</p>
</footer>
</body>
</html>
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