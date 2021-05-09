<?php
session_start();

$title = "Authorization";
require "includes/header.php"
?>

    <div class="wrapper">
        <div class="container">
            <h1>Authorization Form</h1>
            <p id="logSuccessMsg" class="success"></p>
            <p id="logFailMsg" class="error"></p>
            <form role="form" method="POST" name="logForm">
                <div id="logFormDisplay">
                    <div id="logEmailDiv">
                        <label for="logEmail" id="label">Email:</label><br>
                        <input id="logEmail" name="logEmail" type="text" maxlength="40">
                        <p id="logEmailError"></p>
                    </div>
                    <div id="logPasswordDiv">
                        <label for="logPassword" id="label">Password:</label><br>
                        <input id="logPassword" name="logPassword" type="text" maxlength="40">
                        <p id="logPasswordError"></p>
                    </div>
                    <div id="buttons">
                        <input id="logLoginBtn" class="btn" name="logLoginBtn" type="button" value="Login">
                        <input id="logClearBtn" class="btn" name="logClearBtn" type="button" value="Clear">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="js/login-register.js"></script>

<?php require "includes/footer.php" ?>