<?php
$title = "Authorization";
require "includes/header.php"
?>

    <div class="wrapper">
        <div class="container">
            <h1>Authorization Form</h1>
            <p id="success-msg" class="success"></p>
            <p id="fail-msg" class="error"></p>
            <form role="form" method="POST" name="log-form">
                <div id="log-form-display">
                    <div id="log-email_div">
                        <label for="log-email" id="label">Email:</label><br>
                        <input id="log-email" type="text">
                        <p id="log-email_error"></p>
                    </div>
                    <div id="log-password_div">
                        <label for="log-password" id="label">Password:</label><br>
                        <input id="log-password" type="text">
                        <p id="log-password_error"></p>
                    </div>
                    <div id="buttons">
                        <input id="log-login-btn" class="btn" name="log-login-btn" type="button" value="Login">
                        <input id="log-clear-btn" class="btn" name="log-clear-btn" type="button" value="Clear">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="js/login-register.js"></script>

<?php require "includes/footer.php" ?>