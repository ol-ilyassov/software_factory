<?php
session_start();

$title = "Registration";
require "includes/header.php"
?>

<div class="wrapper">
    <div id="left-right">
        <div class="block0">
            <h2>Team Registration</h2>
            <div class="centerLock">
                <p id="regSuccessMsg" class="success"></p>
                <p id="regFailMsg" class="error"></p>
            </div>
            <form role="form" method="POST" name="regForm">
                <div id="regFormDisplay">
                    <div class="regInputDiv" id="regTeamNameDiv">
                        <label for="regTeamName" class="label">Team [<span id="regTeamNameStatus">Status</span>]:
                        </label>
                        <input class="regInput" id="regTeamName" name="regTeamName" type="text" maxlength="40"
                               placeholder="Enter Team Name">
                        <p class="error" id="regTeamNameError"></p>
                    </div>
                    <div class="regInputDiv" id="regEmailDiv">
                        <label for="regEmail" class="label">Email [<span id="regEmailStatus">Status</span>]:</label>
                        <input class="regInput" id="regEmail" name="regEmail" type="text" maxlength="40"
                               placeholder="Enter Email">
                        <p class="error" id="regEmailError"></p>
                    </div>
                    <div class="regInputDiv" id="regPasswordDiv">
                        <label for="regPassword" class="label">Password:</label>
                        <input class="regInput" id="regPassword" name="regPassword" type="password" maxlength="40"
                               placeholder="Enter Password">
                        <p class="error" id="regPasswordError"></p>
                    </div>
                    <div class="regInputDiv" id="regRePasswordDiv">
                        <label for="regRePassword" class="label">Re-Password:</label>
                        <input class="regInput" id="regRePassword" name="regRePassword" type="password" maxlength="40"
                               placeholder="Enter Password">
                        <p class="error" id="regRePasswordError"></p>
                    </div>
                    <div class="regInputDiv" id="regMember1Div">
                        <p>Participant #1</p>
                        <div class="regInputDiv" id="regMember1FirstNameDiv">
                            <label for="regMember1FirstName" class="label">First Name:</label>
                            <input class="regInput" id="regMember1FirstName" name="regMember1FirstName" type="text"
                                   maxlength="40" placeholder="Enter Name">
                            <p class="error" id="regMember1FirstNameError"></p>
                        </div>
                        <div class="regInputDiv" id="regMember1LastNameDiv">
                            <label for="regMember1LastName" class="label">Last Name:</label>
                            <input class="regInput" id="regMember1LastName" name="regMember1LastName" type="text"
                                   maxlength="40" placeholder="Enter Last Name">
                            <p class="error" id="regMember1LastNameError"></p>
                        </div>
                    </div>
                    <div class="regInputDiv" id="regMember2Div">
                        <p>Participant #2</p>
                        <div class="regInputDiv" id="regMember2FirstNameDiv">
                            <label for="regMember2FirstName" class="label">First Name:</label>
                            <input class="regInput" id="regMember2FirstName" name="regMember2FirstName" type="text"
                                   maxlength="40" placeholder="Enter Name">
                            <p class="error" id="regMember2FirstNameError"></p>
                        </div>
                        <div class="regInputDiv" id="regMember2LastNameDiv">
                            <label for="regMember2LastName" class="label">Last Name:</label>
                            <input class="regInput" id="regMember2LastName" name="regMember2LastName" type="text"
                                   maxlength="40" placeholder="Enter Last Name">
                            <p class="error" id="regMember2LastNameError"></p>
                        </div>
                    </div>
                    <div class="regInputDiv" id="regOrganisationDiv">
                        <label for="regOrganisation" class="label">Organisation:</label>
                        <input class="regInput" id="regOrganisation" name="regOrganisation" type="text" maxlength="40"
                               placeholder="Enter Organisation">
                        <p class="error" id="regOrganisationError"></p>
                    </div>
                    <div class="regInputDiv" id="regLocalityDiv">
                        <label for="regLocality" class="label">Locality (City/Village):</label>
                        <input class="regInput" id="regLocality" name="regLocality" type="text" maxlength="120"
                               placeholder="Enter Locality">
                        <p class="error" id="regLocalityError"></p>
                    </div>
                    <div class="regInputDiv" id="regCategoryDiv">
                        <label for="regCategory" class="label">Category:</label>
                        <select class="regSelect" id="regCategory" name="regCategory">
                            <option value="-"></option>
                            <option value="Line Follower">Line Follower</option>
                            <option value="Kegelring">Kegelring</option>
                        </select>
                        <p class="error" id="regCategoryError"></p>
                    </div>
                    <div class="regInputDiv" id="regPhoneNumberDiv">
                        <label for="regPhoneNumberCode" class="label">Phone Number:</label>
                        <span>+7 (<input class="regInput" id="regPhoneNumberCode" name="regPhoneNumberCode" type="text"
                                      maxlength="3">)
                            <input class="regInput" id="regPhoneNumberPart1" name="regPhoneNumberPart1" type="text"
                                   maxlength="3"> -
                            <input class="regInput" id="regPhoneNumberPart2" name="regPhoneNumberPart2" type="text"
                                   maxlength="2"> -
                            <input class="regInput" id="regPhoneNumberPart3" name="regPhoneNumberPart3" type="text"
                                   maxlength="2"></span>
                        <p class="error" id="regPhoneNumberError"></p>
                    </div>
                    <div id="buttons">
                        <input id="regRegisterBtn" class="btn" name="regRegisterBtn" type="button" value="Register">
                        <input id="regClearBtn" class="btn" name="regClearBtn" type="button" value="Clear">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="js/login-register.js"></script>
<script src="js/regPageControl.js"></script>

<?php require "includes/footer.php" ?>
