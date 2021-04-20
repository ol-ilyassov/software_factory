<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="src/stuff/logo-transp.png"/>
    <link rel="stylesheet" href="css/main.css"/>
    <title>Registration</title>
</head>
<body>
<header>
    <img width="100px" height="100px" src="src/stuff/logo-white.png">
</header>

<div class="wrapper">
    <div class="container">
        <h1>Registration Form</h1>
        <p id="success-msg" class="success"></p>
        <p id="fail-msg" class="error"></p>
        <form role="form" method="POST" name="reg-form">
            <div id="reg-form-display">
                <div id="reg-team_name_div">
                    <label for="reg-team_name" id="label">Team [<span id="reg-team_name_status">Status</span>]: </label><br>
                    <input id="reg-team_name" name="reg-team_name" type="text">
                    <p id="reg-team_name_error"></p>
                </div>
                <div id="reg-email_div">
                    <label for="reg-email" id="label">Email [<span id="reg-email_status">Status</span>]:</label><br>
                    <input id="reg-email" name="reg-email" type="text">
                    <p id="reg-email_error"></p>
                </div>
                <div id="reg-password_div">
                    <label for="reg-password" id="label">Password:</label><br>
                    <input id="reg-password" name="reg-password" type="text">
                    <p id="reg-password_error"></p>
                </div>
                <div id="reg-re_password_div">
                    <label for="reg-re_password" id="label">Re-Password:</label><br>
                    <input id="reg-re_password" name="reg-re_password" type="text">
                    <p id="reg-re_password_error"></p>
                </div>
                <div id="reg-member1_div">
                    <p>Participant #1</p>
                    <div id="reg-member1_first_name_div">
                        <label for="reg-member1_first_name" id="label">First Name:</label><br>
                        <input id="reg-member1_first_name" name="reg-member1_first_name" type="text">
                        <p id="reg-member1_first_name_error"></p>
                    </div>
                    <div id="reg-member1_last_name_div">
                        <label for="reg-member1_last_name" id="label">Last Name:</label><br>
                        <input id="reg-member1_last_name" name="reg-member1_last_name" type="text">
                        <p id="reg-member1_last_name_error"></p>
                    </div>
                </div>
                <div id="reg-member2_div">
                    <p>Participant #2</p>
                    <div id="reg-member2_first_name_div">
                        <label for="reg-member2_first_name" id="label">First Name:</label><br>
                        <input id="reg-member2_first_name" name="reg-member2_first_name" type="text">
                        <p id="reg-member2_first_name_error"></p>
                    </div>
                    <div id="reg-member2_last_name_div">
                        <label for="reg-member2_last_name" id="label">Last Name:</label><br>
                        <input id="reg-member2_last_name" name="reg-member2_last_name" type="text">
                        <p id="reg-member2_last_name_error"></p>
                    </div>
                </div>
                <div id="reg-organisation_div">
                    <label for="reg-organisation" id="label">Organisation:</label><br>
                    <input id="reg-organisation" name="reg-organisation" type="text">
                    <p id="reg-organisation_error"></p>
                </div>
                <div id="reg-locality_div">
                    <label for="reg-locality" id="label">Locality:</label><br>
                    <input id="reg-locality" name="reg-locality" type="text">
                    <p id="reg-locality_error"></p>
                </div>
                <div id="reg-category_div">
                    <label for="reg-category" id="label">Category:</label><br>
                    <select id="reg-category" name="reg-category">
                        <option value="0"></option>
                        <option value="Line Follower">Line Follower</option>
                        <option value="Sumo">Sumo</option>
                    </select>
                    <p id="reg-category_error"></p>
                </div>
                <div id="reg-phone_number_div">
                    <label for="reg-phone_number_code" id="label">Phone Number:</label><br>
                    <p>+7 (<input id="reg-phone_number_code" name="reg-phone_number_code" type="text" maxlength="3">)
                        <input id="reg-phone_number_part1" name="reg-phone_number_part1" type="text" maxlength="3"> -
                        <input id="reg-phone_number_part2" name="reg-phone_number_part2" type="text" maxlength="2"> -
                        <input id="reg-phone_number_part3" name="reg-phone_number_part3" type="text" maxlength="2"></p>
                    <p id="reg-phone_number_error"></p>
                </div>

                <div id="buttons">
                    <input id="reg-register-btn" class="btn" name="reg-register-btn" type="button" value="Register">
                    <input id="reg-clear-btn" class="btn" name="reg-clear-btn" type="button" value="Clear">
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
