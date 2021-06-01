<?php
session_start();

$title = "Authorization";
require "includes/header.php"
?>

    <div class="wrapper">
        <div id="left-right">
            <div class="block0">
                <h2>Log in</h2>
                <div class="centerLock">
                    <p id="logSuccessMsg" class="success"></p>
                    <p id="logFailMsg" class="error"></p>
                </div>
                <form role="form" method="POST" name="logForm">
                    <div id="logFormDisplay">
                        <div class="logInputDiv" id="logEmailDiv">
                            <label for="logEmail" id="label">Email:</label>
                            <input class="logInput" id="logEmail" name="logEmail" type="text" maxlength="40" placeholder="Enter Login">
                            <p class="error" id="logEmailError"></p>
                        </div>
                        <div class="logInputDiv" id="logPasswordDiv">
                            <label for="logPassword" id="label">Password:</label>
                            <input class="logInput" id="logPassword" name="logPassword" type="password" maxlength="40" placeholder="Enter Password">
                            <p class="error" id="logPasswordError"></p>
                        </div>
                        <div id="buttons">
                            <input id="logLoginBtn" class="btn" name="logLoginBtn" type="button" value="Login">
                            <input id="logClearBtn" class="btn" name="logClearBtn" type="button" value="Clear">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/login-register.js"></script>

<?php require "includes/footer.php" ?>