<?php
session_start();

$title = "Registration";
require "includes/header.php"
?>

<div class="wrapper">
    <div class="container">
        <h1>Registration Form</h1>
        <p id="regSuccessMsg" class="success"></p>
        <p id="regFailMsg" class="error"></p>
        <form role="form" method="POST" name="regForm">
            <div id="regFormDisplay">
                <div id="regTeamNameDiv">
                    <label for="regTeamName" class="label">Team [<span id="regTeamNameStatus">Status</span>]: </label><br>
                    <input id="regTeamName" name="regTeamName" type="text" maxlength="40">
                    <p id="regTeamNameError"></p>
                </div>
                <div id="regEmailDiv">
                    <label for="regEmail" class="label">Email [<span id="regEmailStatus">Status</span>]:</label><br>
                    <input id="regEmail" name="regEmail" type="text" maxlength="40">
                    <p id="regEmailError"></p>
                </div>
                <div id="regPasswordDiv">
                    <label for="regPassword" class="label">Password:</label><br>
                    <input id="regPassword" name="regPassword" type="text" maxlength="40">
                    <p id="regPasswordError"></p>
                </div>
                <div id="regRePasswordDiv">
                    <label for="regRePassword" class="label">Re-Password:</label><br>
                    <input id="regRePassword" name="regRePassword" type="text" maxlength="40">
                    <p id="regRePasswordError"></p>
                </div>
                <div id="regMember1Div">
                    <p>Participant #1</p>
                    <div id="regMember1FirstNameDiv">
                        <label for="regMember1FirstName" class="label">First Name:</label><br>
                        <input id="regMember1FirstName" name="regMember1FirstName" type="text" maxlength="40">
                        <p id="regMember1FirstNameError"></p>
                    </div>
                    <div id="regMember1LastNameDiv">
                        <label for="regMember1LastName" class="label">Last Name:</label><br>
                        <input id="regMember1LastName" name="regMember1LastName" type="text" maxlength="40">
                        <p id="regMember1LastNameError"></p>
                    </div>
                </div>
                <div id="regMember2Div">
                    <p>Participant #2</p>
                    <div id="regMember2FirstNameDiv">
                        <label for="regMember2FirstName" class="label">First Name:</label><br>
                        <input id="regMember2FirstName" name="regMember2FirstName" type="text" maxlength="40">
                        <p id="regMember2FirstNameError"></p>
                    </div>
                    <div id="regMember2LastNameDiv">
                        <label for="regMember2LastName" class="label">Last Name:</label><br>
                        <input id="regMember2LastName" name="regMember2LastName" type="text" maxlength="40">
                        <p id="regMember2LastNameError"></p>
                    </div>
                </div>
                <div id="regOrganisationDiv">
                    <label for="regOrganisation" class="label">Organisation:</label><br>
                    <input id="regOrganisation" name="regOrganisation" type="text" maxlength="40">
                    <p id="regOrganisationError"></p>
                </div>
                <div id="regLocalityDiv">
                    <label for="regLocality" class="label">Locality:</label><br>
                    <input id="regLocality" name="regLocality" type="text" maxlength="120">
                    <p id="regLocalityError"></p>
                </div>
                <div id="regCategoryDiv">
                    <label for="regCategory" class="label">Category:</label><br>
                    <select id="regCategory" name="regCategory">
                        <option value="-"></option>
                        <option value="Line Follower">Line Follower</option>
                        <option value="Sumo">Sumo</option>
                    </select>
                    <p id="regCategoryError"></p>
                </div>
                <div id="regPhoneNumberDiv">
                    <label for="regPhoneNumberCode" class="label">Phone Number:</label><br>
                    <p>+7 (<input id="regPhoneNumberCode" name="regPhoneNumberCode" type="text" maxlength="3">)
                        <input id="regPhoneNumberPart1" name="regPhoneNumberPart1" type="text" maxlength="3"> -
                        <input id="regPhoneNumberPart2" name="regPhoneNumberPart2" type="text" maxlength="2"> -
                        <input id="regPhoneNumberPart3" name="regPhoneNumberPart3" type="text" maxlength="2"></p>
                    <p id="regPhoneNumberError"></p>
                </div>
                <div id="buttons">
                    <input id="regRegisterBtn" class="btn" name="regRegisterBtn" type="button" value="Register">
                    <input id="regClearBtn" class="btn" name="regClearBtn" type="button" value="Clear">
                </div>
            </div>
        </form>
    </div>
</div>

<script src="js/login-register.js"></script>

<?php require "includes/footer.php" ?>
