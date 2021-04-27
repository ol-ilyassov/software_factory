/* --- Functions to validate input data --- */

function validateEmail(input) {
    const emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return emailFormat.test(input);
}

function pregMatchCommon(input) {
    const regExp = /^[a-zA-Z0-9!@#$%^&*()_+-<>?]*$/;
    return regExp.test(input);
}

function pregMatchAlphabets(input) {
    const regExp = /^[a-zA-Z]*$/;
    //var regExp = /^[а-яА-ЯЁё]*$/;
    return regExp.test(input);
}

function pregMatchNumbers(input) {
    const regExp = /^[0-9]*$/;
    return regExp.test(input);
}

function pregMatchComplexName(input) {
    const regExp = /^[a-zA-Z ,_-]*$/;
    return regExp.test(input);
}

/* --- [Registration] --- */

$(document).ready(function () {
    const regFailMsg = $('#regFailMsg');
    const regSuccessMsg = $('#regSuccessMsg');
    const regTeamNameStatus = $('#regTeamNameStatus');
    const regEmailStatus = $('#regEmailStatus');

    const regTeamName = $('#regTeamName');
    const regEmail = $('#regEmail');
    const regPassword = $('#regPassword');
    const regRePassword = $('#regRePassword');
    const regM1Fname = $('#regMember1FirstName');
    const regM1Lname = $('#regMember1LastName');
    const regM2Fname = $('#regMember2FirstName');
    const regM2Lname = $('#regMember2LastName');
    const regOrganisation = $('#regOrganisation');
    const regLocality = $('#regLocality');
    const regCategory = $('#regCategory');
    const regPhoneNumberCode = $('#regPhoneNumberCode');
    const regPhoneNumberPart1 = $('#regPhoneNumberPart1');
    const regPhoneNumberPart2 = $('#regPhoneNumberPart2');
    const regPhoneNumberPart3 = $('#regPhoneNumberPart3');

    const regTeamNameError = $('#regTeamNameError');
    const regEmailError = $('#regEmailError');
    const regPasswordError = $('#regPasswordError');
    const regRePasswordError = $('#regRePasswordError');
    const regM1FnameError = $('#regMember1FirstNameError');
    const regM1LnameError = $('#regMember1LastNameError');
    const regM2FnameError = $('#regMember2FirstNameError');
    const regM2LnameError = $('#regMember2LastNameError');
    const regOrganisationError = $('#regOrganisationError');
    const regLocalityError = $('#regLocalityError');
    const regCategoryError = $('#regCategoryError');
    const regPhoneNumberError = $('#regPhoneNumberError');

    let regTeamNameFree = false;
    let regEmailFree = false;
    let pnCodeBool = true;
    let pnPart1Bool = true;
    let pnPart2Bool = true;
    let pnPart3Bool = true;

    // Check reserved Team Names
    regTeamName.on('input', function () {
        let text = regTeamName.val();
        if (text === "") {
            regTeamNameStatus.text("Status");
            regTeamNameStatus.css("color", "black");
        } else {
            $.post("php/checkRealTime.php", {
                field: "teamname",
                teamName: text
            }, function (data) {
                data = JSON.parse(data);
                if (data === "Reserved") {
                    regTeamNameStatus.text("Reserved");
                    regTeamNameStatus.css("color", "red");
                    regTeamNameFree = false;
                } else if (data === "Free") {
                    regTeamNameStatus.text("Free");
                    regTeamNameStatus.css("color", "green");
                    regTeamNameFree = true;
                } else {
                    console.log(data);
                    regTeamNameFree = false;
                }
            });
        }
    });

    // Check reserved Email
    regEmail.on('input', function () {
        let text = regEmail.val();
        if (text === "") {
            regEmailStatus.text("Status");
            regEmailStatus.css("color", "black");
        } else {
            $.post("php/checkRealTime.php", {
                field: "email",
                email: text
            }, function (data) {
                data = JSON.parse(data);
                if (data === "Reserved") {
                    regEmailStatus.text("Reserved");
                    regEmailStatus.css("color", "red");
                    regEmailFree = false;
                } else if (data === "Free") {
                    regEmailStatus.text("Free");
                    regEmailStatus.css("color", "green");
                    regEmailFree = true;
                } else {
                    console.log(data);
                    regEmailFree = false;
                }
            });
        }
    });

    /** Check the Correctness of input data in Real Time */

    regTeamName.on('input', function () {
        regTeamNameError.text("");
        regFailMsg.text("");
        let text = regTeamName.val();
        if (!pregMatchCommon(text)) {
            regTeamNameError.text("- Invalid characters used -");
        } else if (text.length > 40) {
            regTeamNameError.text("- Length must be less than 40 characters -");
        }
    });
    regEmail.on('input', function () {
        regEmailError.text("");
        regFailMsg.text("");
        let text = regEmail.val();
        if (!pregMatchCommon(text)) {
            regEmailError.text("- Invalid characters used -");
        } else if (text.length > 40) {
            regEmailError.text("- Length must be less than 40 characters -");
        }
    });
    regPassword.on('input', function () {
        regPasswordError.text("");
        regFailMsg.text("");
        let text = regPassword.val();
        if (!pregMatchCommon(text)) {
            regPasswordError.text("- Invalid characters used -");
        } else if (text.length > 40) {
            regPasswordError.text("- Length must be less than 40 characters -");
        }
    });
    regRePassword.on('input', function () {
        regRePasswordError.text("");
        regFailMsg.text("");
        let text = regRePassword.val();
        if (!pregMatchCommon(text)) {
            regRePasswordError.text("- Invalid characters used -");
        } else if (text.length > 40) {
            regRePasswordError.text("- Length must be less than 40 characters -");
        }
    });
    regM1Fname.on('input', function () {
        regM1FnameError.text("");
        regFailMsg.text("");
        let text = regM1Fname.val();
        if (!pregMatchAlphabets(text)) {
            regM1FnameError.text("- Only Latin characters allowed -");
        } else if (text.length > 40) {
            regM1FnameError.text("- Length must be less than 40 characters -");
        }
    });
    regM1Lname.on('input', function () {
        regM1LnameError.text("");
        regFailMsg.text("");
        let text = regM1Lname.val();
        if (!pregMatchAlphabets(text)) {
            regM1LnameError.text("- Only Latin characters allowed -");
        } else if (text.length > 40) {
            regM1LnameError.text("- Length must be less than 40 characters -");
        }
    });
    regM2Fname.on('input', function () {
        regM2FnameError.text("");
        regFailMsg.text("");
        let text = regM2Fname.val();
        if (!pregMatchAlphabets(text)) {
            regM2FnameError.text("- Only Latin characters allowed -");
        } else if (text.length > 40) {
            regM2FnameError.text("- Length must be less than 40 characters -");
        }
    });
    regM2Lname.on('input', function () {
        regM2LnameError.text("");
        regFailMsg.text("");
        let text = regM2Lname.val();
        if (!pregMatchAlphabets(text)) {
            regM2LnameError.text("- Only Latin characters allowed -");
        } else if (text.length > 40) {
            regM2LnameError.text("- Length must be less than 40 characters -");
        }
    });
    regOrganisation.on('input', function () {
        regOrganisationError.text("");
        regFailMsg.text("");
        let text = regOrganisation.val();
        if (!pregMatchComplexName(text)) {
            regOrganisationError.text("- Invalid characters used -");
        } else if (text.length > 40) {
            regOrganisationError.text("- Length must be less than 40 characters -");
        }
    });
    regLocality.on('input', function () {
        regLocalityError.text("");
        regFailMsg.text("");
        let text = regLocality.val();
        if (!pregMatchComplexName(text)) {
            regLocalityError.text("- Invalid characters used -");
        } else if (text.length > 120) {
            regLocalityError.text("- Length must be less than 120 characters -");
        }
    });
    regCategory.on("change", function () {
        regCategoryError.text("");
        regFailMsg.text("");
    });
    regPhoneNumberCode.on('input', function () {
        pnCodeBool = checkPNByParts(regPhoneNumberCode);
        checkPNAll()
        if (regPhoneNumberCode.val().length > 2 && pnCodeBool) {
            regPhoneNumberPart1.focus();
        }
    });
    regPhoneNumberPart1.on('input', function () {
        pnPart1Bool = checkPNByParts(regPhoneNumberPart1);
        checkPNAll()
        if (regPhoneNumberPart1.val().length > 2 && pnPart1Bool) {
            regPhoneNumberPart2.focus();
        }
    });
    regPhoneNumberPart2.on('input', function () {
        pnPart2Bool = checkPNByParts(regPhoneNumberPart2);
        checkPNAll()
        if (regPhoneNumberPart2.val().length > 1 && pnPart2Bool) {
            regPhoneNumberPart3.focus();
        }
    });
    regPhoneNumberPart3.on('input', function () {
        pnPart3Bool = checkPNByParts(regPhoneNumberPart3);
        checkPNAll()
    });

    function checkPNByParts(input) {
        regPhoneNumberError.text("");
        regFailMsg.text("");
        let text = input.val();
        return pregMatchNumbers(text)
    }

    function checkPNAll() {
        if (!pnCodeBool || !pnPart1Bool ||
            !pnPart2Bool || !pnPart3Bool) {
            regPhoneNumberError.text("- Only numbers allowed -");
        }
    }

    /** Check the Correctness of input data on Button Click */

    $('#regRegisterBtn').on('click', function () {
        clearRegisterMessages()
        const regPhoneNumber =
            regPhoneNumberCode.val() + regPhoneNumberPart1.val() +
            regPhoneNumberPart2.val() + regPhoneNumberPart3.val();
        let error = false;

        if (regCategory.val() === "0") {
            $('#regCategoryError').text("- Category is required -");
            error = true;
        }

        if (regTeamName.val() === "") {
            regTeamNameError.text("- Team name is required -");
            error = true;
        } else if (!pregMatchCommon(regTeamName.val())) {
            regTeamNameError.text("- Invalid characters used -");
            error = true;
        } else if (regTeamName.val().length < 3 || regTeamName.val().length > 40) {
            regTeamNameError.text("- Length must be from 3 to 40 characters -");
            error = true;
        }
        // else if (false) {
        //     // Reserved
        //     error = true;
        // }

        if (regEmail.val() === "") {
            regEmailError.text("- Email is required -");
            error = true;
        } else if (!validateEmail(regEmail.val())) {
            regEmailError.text("- Wrong email format -");
            error = true;
        } else if (regEmail.val().length < 3 || regEmail.val().length > 40) {
            regEmailError.text("- Length must be from 3 to 40 characters -");
            error = true;
        }
        // else if (false) {
        //     // Reserved
        //     error = true;
        // }

        if (regPassword.val() === "") {
            regPasswordError.text("- Password is required -");
            error = true;
        } else if (!pregMatchCommon(regPassword.val())) {
            regPasswordError.text("- Invalid characters used -");
            error = true;
        } else if (regPassword.val().length < 3 || regPassword.val().length > 40) {
            regPasswordError.text("- Length must be from 3 to 40 characters -");
            error = true;
        }

        if (regRePassword.val() === "") {
            regRePasswordError.text("- Re-Password is required -");
            error = true;
        } else if (!pregMatchCommon(regRePassword.val())) {
            regRePasswordError.text("- Invalid characters used -");
            error = true;
        } else if (regRePassword.val().length < 3 || regRePassword.val().length > 40) {
            regRePasswordError.text("- Length must be from 3 to 40 characters -");
            error = true;
        } else if (regPassword.val() !== regRePassword.val()) {
            regRePasswordError.text("- Passwords don't match -");
            error = true;
        }

        if (regM1Fname.val() === "") {
            regM1FnameError.text("- First name is required -");
            error = true;
        } else if (!pregMatchAlphabets(regM1Fname.val())) {
            regM1FnameError.text("- Only alphabets allowed -");
            error = true;
        } else if (regM1Fname.val().length < 2 || regM1Fname.val().length > 40) {
            regM1FnameError.text("- Length must be from 2 to 40 characters -");
            error = true;
        }

        if (regM1Lname.val() === "") {
            regM1LnameError.text("- Last name is required -");
            error = true;
        } else if (!pregMatchAlphabets(regM1Lname.val())) {
            regM1LnameError.text("- Only alphabets allowed -");
            error = true;
        } else if (regM1Lname.val().length < 2 || regM1Lname.val().length > 40) {
            regM1LnameError.text("- Length must be from 2 to 40 characters -");
            error = true;
        }

        if (regM2Fname.val() === "") {
            regM2FnameError.text("- First name is required -");
            error = true;
        } else if (!pregMatchAlphabets(regM2Fname.val())) {
            regM2FnameError.text("- Only alphabets allowed -");
            error = true;
        } else if (regM2Fname.val().length < 2 || regM2Fname.val().length > 40) {
            regM2FnameError.text("- Length must be from 2 to 40 characters -");
            error = true;
        }

        if (regM2Lname.val() === "") {
            regM2LnameError.text("- Last name is required -");
            error = true;
        } else if (!pregMatchAlphabets(regM2Lname.val())) {
            regM2LnameError.text("- Only alphabets allowed -");
            error = true;
        } else if (regM2Lname.val().length < 2 || regM2Lname.val().length > 40) {
            regM2LnameError.text("- Length must be from 2 to 40 characters -");
            error = true;
        }

        if (regOrganisation.val() === "") {
            regOrganisationError.text("- Organisation is required -");
            error = true;
        } else if (!pregMatchComplexName(regOrganisation.val())) {
            regOrganisationError.text("- Invalid characters used -");
            error = true;
        } else if (regOrganisation.val().length < 3 || regOrganisation.val().length > 40) {
            regOrganisationError.text("- Length must be from 3 to 40 characters -");
            error = true;
        }

        if (regLocality.val() === "") {
            regLocalityError.text("- Locality is required -");
            error = true;
        } else if (!pregMatchCommon(regLocality.val())) {
            regLocalityError.text("- Invalid characters used -");
            error = true;
        } else if (regLocality.val().length < 3 || regLocality.val().length > 120) {
            regLocalityError.text("- Length must be from 3 to 120 characters -");
            error = true;
        }

        if (regPhoneNumber === "") {
            regPhoneNumberError.text("- Phone number is required -");
            error = true;
        } else if (!pregMatchNumbers(regPhoneNumber)) {
            regPhoneNumberError.text("- Only numbers allowed -");
            error = true;
        } else if (regPhoneNumber.length !== 10) {
            regPhoneNumberError.text("- No enough numbers -");
            error = true;
        }

        if (error) {
            regFailMsg.text("- Error, Check input data! -");
        } else {
            $.post("php/login-register.php", {
                teamName: regTeamName.val(),
                email: regEmail.val(),
                password: regPassword.val(),
                m1Fname: regM1Fname.val(),
                m1Lname: regM1Lname.val(),
                m2Fname: regM2Fname.val(),
                m2Lname: regM2Lname.val(),
                organisation: regOrganisation.val(),
                locality: regLocality.val(),
                category: regCategoryError.val(),
                phoneNumber: regPhoneNumber.val(),
                action: "REGISTRATION"
            }, function (data) {
                if (data === "success") {
                    regSuccessMsg.text("- Successful Registration -");
                    regFailMsg.text("");

                    setTimeout(function () {
                        alert("Success");
                        //window.location.href = "http://www.w3schools.com";
                    }, 5000);
                } else {
                    regSuccessMsg.text("");
                    regFailMsg.text(data);
                }
            });
        }
    });

    /** Clear Registration fields */

    $('#regClearBtn').on('click', function () {
        clearRegisterValues();
        clearRegisterMessages();
    });

    function clearRegisterValues() {
        // Reserve

        regTeamName.val("");
        regEmail.val("");
        regPassword.val("");
        regRePassword.val("");
        regM1Fname.val("");
        regM1Lname.val("");
        regM2Fname.val("");
        regM2Lname.val("");
        regOrganisation.val("");
        regLocality.val("");
        regCategory.val("0");
        regPhoneNumberCode.val("");
        regPhoneNumberPart1.val("");
        regPhoneNumberPart2.val("");
        regPhoneNumberPart3.val("");
    }

    function clearRegisterMessages() {
        regFailMsg.text("");
        regSuccessMsg.text("");

        regTeamNameError.text("");
        regEmailError.text("");
        regPasswordError.text("");
        regRePasswordError.text("");
        regM1FnameError.text("");
        regM1LnameError.text("");
        regM2FnameError.text("");
        regM2LnameError.text("");
        regOrganisationError.text("");
        regLocalityError.text("");
        regCategoryError.text("");
        regPhoneNumberError.text("");
    }
});

/* --- [Authorization] --- */

$(document).ready(function () {
    const logFailMsg = $('#logFailMsg');
    const logSuccessMsg = $('#logSuccessMsg');

    const logEmail = $('#logEmail');
    const logPassword = $('#logPassword');

    const logEmailError = $('#logEmailError');
    const logPasswordError = $('#logPasswordError');

    /** Check the Correctness of input data in Real Time */

    logEmail.on('input', function () {
        logEmailError.text("");
        logFailMsg.text("");
        let text = logEmail.val();
        if (!pregMatchCommon(text)) {
            logEmailError.text("- Invalid characters used -");
        } else if (text.length > 40) {
            logEmailError.text("- Length must be less than 40 characters -");
        }
    });
    logPassword.on('input', function () {
        logPasswordError.text("");
        logFailMsg.text("");
        let text = logPassword.val();
        if (!pregMatchCommon(text)) {
            logPasswordError.text("- Invalid characters used -");
        } else if (text.length > 40) {
            logPasswordError.text("- Length must be less than 40 characters -");
        }
    });

    /** Check the Correctness of input data on Button Click */

    $('#logLoginBtn').on('click', function () {
        clearLoginMessages()
        let error = false;

        if (logEmail.val() === "") {
            logEmailError.text("- Email is required -");
            error = true;
        } else if (!validateEmail(logEmail.val())) {
            logEmailError.text("- Wrong email format -");
            error = true;
        } else if (logEmail.val().length < 3 || logEmail.val().length > 40) {
            logEmailError.text("- Length must be from 3 to 40 characters -");
            error = true;
        }
        if (logPassword.val() === "") {
            logPasswordError.text("- Password is required -");
            error = true;
        } else if (!pregMatchCommon(logPassword.val())) {
            logPasswordError.text("- Invalid characters used -");
            error = true;
        } else if (logPassword.val().length < 3 || logPassword.val().length > 40) {
            logPasswordError.text("- Length must be from 3 to 40 characters -");
            error = true;
        }

        if (error) {
            logFailMsg.text("- Error, Check input data! -");
        } else {
            alert("Success!");
        }
//             $.post("php/login-register.php", {
//                 email: email,
//                 password: password,
//                 action: "authorization"
//             }, function (data) {
//                 if (data === "success") {
//                     $('#fail-msg').text("");
//                     clearLoginFields();
//                     window.location.href = "index.php";
//                 } else {
//                     $('#fail-msg').text(data);
//                 }
//             });
//         }
    });

    /** Clear Authorization fields */

    $('#logClearBtn').on('click', function () {
        clearLoginValues();
        clearLoginMessages();
    });

    function clearLoginValues() {
        logEmail.val("");
        logPassword.val("");
    }

    function clearLoginMessages() {
        logFailMsg.text("");
        logSuccessMsg.text("");

        logEmailError.text("");
        logPasswordError.text("");
    }
});

