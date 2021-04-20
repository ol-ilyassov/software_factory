/* --- Functions to validate input data --- */

function validateEmail(input) {
    const emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return emailFormat.test(input);
}

function pregMatchCommon(input) {
    const emailFormat = /^[a-zA-Z0-9!@#$%^&*()_+-<>?]*$/;
    return emailFormat.test(input);
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

/* --- [Registration] --- */

// Function to check Reserve state of Team Name
// $(document).ready(function(){
//     $('#team_name').keyup(function(){
//         var flagTeam_name = false;
//         var team_name = $('#team_name').val();
//         if (team_name == "") {
//             $('#team_name_status').text("Status");
//             $('#team_name_status').css("color", "black");
//         } else {
//             $.post("php/checkRealTime.php", function(data) {
//                 data = JSON.parse(data);
//                 for (var key in data) {
//                     if (data[key].login.toLowerCase() == login.toLowerCase()) {
//                         flagTeam_name = true;
//                     }
//                 }
//                 if (flagTeam_name == true) {
//                     $('#team_name_status').text("Reserved");
//                     $('#team_name_status').css("color", "red");
//                 } else {
//                     $('#team_name_status').text("Free");
//                     $('#team_name_status').css("color", "green");
//                 }
//             });
//         }
//     });
// });

// Function to check Reserve state of Email
// $(document).ready(function(){
//     $('#team_name').keyup(function(){
//         var flagTeam_name = false;
//         var team_name = $('#team_name').val();
//         if (team_name == "") {
//             $('#team_name_status').text("Status");
//             $('#team_name_status').css("color", "black");
//         } else {
//             $.post("php/checkRealTime.php", function(data) {
//                 data = JSON.parse(data);
//                 for (var key in data) {
//                     if (data[key].login.toLowerCase() == login.toLowerCase()) {
//                         flagTeam_name = true;
//                     }
//                 }
//                 if (flagTeam_name == true) {
//                     $('#team_name_status').text("Reserved");
//                     $('#team_name_status').css("color", "red");
//                 } else {
//                     $('#team_name_status').text("Free");
//                     $('#team_name_status').css("color", "green");
//                 }
//             });
//         }
//     });
// });

// Check the Correctness of input data in Real Time
$(document).ready(function () {
    $('#reg-team_name').keyup(function () {
        $('#reg-team_name_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchCommon($('#reg-team_name').val())) {
            $('#reg-team_name_error').text("- Wrong Team Name Format -");
        }
    });
    $('#reg-email').keyup(function () {
        $('#reg-email_error').text("");
        $('#fail-msg').text("");
        if (!validateEmail($('#reg-email').val())) {
            $('#reg-email_error').text("- Wrong Email Format -");
        }
    });
    $('#reg-password').keyup(function () {
        $('#reg-password_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchCommon($('#reg-password').val())) {
            $('#reg-password_error').text("- Wrong Password Format -");
        }
    });
    $('#reg-re_password').keyup(function () {
        $('#reg-re_password_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchCommon($('#reg-re_password').val())) {
            $('#reg-re_password_error').text("- Wrong Re-Password Format -");
        }
    });
    $('#reg-member1_first_name').keyup(function () {
        $('#reg-member1_first_name_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchAlphabets($('#reg-member1_first_name').val())) {
            $('#reg-member1_first_name_error').text("- Wrong First Name Format -");
        }
    });
    $('#reg-member1_last_name').keyup(function () {
        $('#reg-member1_last_name_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchAlphabets($('#reg-member1_last_name').val())) {
            $('#reg-member1_last_name_error').text("- Wrong Last Name Format -");
        }
    });
    $('#reg-member2_first_name').keyup(function () {
        $('#reg-member2_first_name_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchAlphabets($('#reg-member2_first_name').val())) {
            $('#reg-member2_first_name_error').text("- Wrong First Name Format -");
        }
    });
    $('#reg-member2_last_name').keyup(function () {
        $('#reg-member2_last_name_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchAlphabets($('#reg-member2_last_name').val())) {
            $('#reg-member2_last_name_error').text("- Wrong Last Name Format -");
        }
    });
    $('#reg-organisation').keyup(function () {
        $('#reg-organisation_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchCommon($('#reg-organisation').val())) {
            $('#reg-organisation_error').text("- Wrong Organisation Format -");
        }
    });
    $('#reg-locality').keyup(function () {
        $('#reg-locality_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchCommon($('#reg-locality').val())) {
            $('#reg-locality_error').text("- Wrong Locality Format -");
        }
    });
    $('#reg-category').bind("change", function () {
        $('#reg-category_error').text("");
        $('#fail-msg').text("");
    });
    $('#reg-phone_number_code').keyup(function () {
        $('#reg-phone_number_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchNumbers($('#reg-phone_number_code').val())) {
            $('#reg-phone_number_error').text("- Wrong Phone Number Format -");
        }
    });
    $('#reg-phone_number_part1').keyup(function () {
        $('#reg-phone_number_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchNumbers($('#reg-phone_number_part1').val())) {
            $('#reg-phone_number_error').text("- Wrong Phone Number Format -");
        }
    });
    $('#reg-phone_number_part2').keyup(function () {
        $('#reg-phone_number_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchNumbers($('#reg-phone_number_part2').val())) {
            $('#reg-phone_number_error').text("- Wrong Phone Number Format -");
        }
    });
    $('#reg-phone_number_part3').keyup(function () {
        $('#reg-phone_number_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchNumbers($('#reg-phone_number_part3').val())) {
            $('#reg-phone_number_error').text("- Wrong Phone Number Format -");
        }
    });
});

// Check the Correctness of input data before inserting to Database
$(document).ready(function () {
    $('#reg-register-btn').click(function () {
        $('#success-msg').text("");
        $('#fail-msg').text("");

        $('#reg-team_name_error').text("");
        $('#reg-email_error').text("");
        $('#reg-password_error').text("");
        $('#reg-re_password_error').text("");
        $('#reg-member1_first_name_error').text("");
        $('#reg-member1_last_name_error').text("");
        $('#reg-member2_first_name_error').text("");
        $('#reg-member2_last_name_error').text("");
        $('#reg-organisation_error').text("");
        $('#reg-locality_error').text("");
        $('#reg-category_error').text("");
        $('#reg-phone_number_error').text("");

        var team_name = $('#reg-team_name').val();
        var email = $('#reg-email').val();
        var password = $('#reg-password').val();
        var re_password = $('#reg-re_password').val();
        var m1_fname = $('#reg-member1_first_name').val();
        var m1_lname = $('#reg-member1_last_name').val();
        var m2_fname = $('#reg-member2_first_name').val();
        var m2_lname = $('#reg-member2_last_name').val();
        var organisation = $('#reg-organisation').val();
        var locality = $('#reg-locality').val();
        var category = $('#reg-category').val();
        var phone_number = $('#reg-phone_number_code').val() +
            $('#reg-phone_number_part1').val() +
            $('#reg-phone_number_part2').val() +
            $('#reg-phone_number_part3').val();

        var error = false;

        if (category == 0) {
            $('#reg-category_error').text("- Category is required -");
            error = true;
        }

        if (team_name === "") {
            $('#reg-team_name_error').text("- Team name is required -");
            error = true;
        } else if (!pregMatchCommon(team_name)) {
            $('#reg-team_name_error').text("- Wrong Team name format -");
            error = true;
        } else if (team_name.length < 3 || team_name.length > 40) {
            $('#reg-team_name_error').text("- Length must be from 3 to 40 characters -");
            error = true;
        } else if (false) {
            // Reserved
            error = true;
        }

        if (email === "") {
            $('#reg-email_error').text("- Email is required -");
            error = true;
        } else if (!validateEmail(email)) {
            $('#reg-email_error').text("- Wrong Email format -");
            error = true;
        } else if (email.length < 3 || email.length > 40) {
            $('#reg-email_error').text("- Length must be from 3 to 40 characters -");
            error = true;
        } else if (false) {
            // Reserved
            error = true;
        }

        if (password === "") {
            $('#reg-password_error').text("- Password is required -");
            error = true;
        } else if (!pregMatchCommon(password)) {
            $('#reg-password_error').text("- Wrong Password format -");
            error = true;
        } else if (password.length < 3 || password.length > 40) {
            $('#reg-password_error').text("- Length must be from 3 to 40 characters -");
            error = true;
        }

        if (re_password === "") {
            $('#reg-re_password_error').text("- Password is required -");
            error = true;
        } else if (!pregMatchCommon(re_password)) {
            $('#reg-re_password_error').text("- Wrong Password format -");
            error = true;
        } else if (re_password.length < 3 || re_password.length > 40) {
            $('#reg-re_password_error').text("- Length must be from 3 to 40 characters -");
            error = true;
        } else if (password !== re_password) {
            $('#reg-re_password_error').text("- Passwords don't match -");
            error = true;
        }

        if (m1_fname === "") {
            $('#reg-member1_first_name_error').text("- First name is required -");
            error = true;
        } else if (!pregMatchAlphabets(m1_fname)) {
            $('#reg-member1_first_name_error').text("- Only alphabets allowed -");
            error = true;
        } else if (m1_fname.length < 2 || m1_fname.length > 40) {
            $('#reg-member1_first_name_error').text("- Length must be from 2 to 40 characters -");
            error = true;
        }

        if (m1_lname === "") {
            $('#reg-member1_last_name_error').text("- Last name is required -");
            error = true;
        } else if (!pregMatchAlphabets(m1_lname)) {
            $('#reg-member1_last_name_error').text("- Only alphabets allowed -");
            error = true;
        } else if (m1_lname.length < 2 || m1_lname.length > 40) {
            $('#reg-member1_last_name_error').text("- Length must be from 2 to 40 characters -");
            error = true;
        }

        if (m2_fname === "") {
            $('#reg-member2_first_name_error').text("- First name is required -");
            error = true;
        } else if (!pregMatchAlphabets(m2_fname)) {
            $('#reg-member2_first_name_error').text("- Only alphabets allowed -");
            error = true;
        } else if (m2_fname.length < 2 || m2_fname.length > 40) {
            $('#reg-member2_first_name_error').text("- Length must be from 2 to 40 characters -");
            error = true;
        }

        if (m2_lname === "") {
            $('#reg-member2_last_name_error').text("- Last name is required -");
            error = true;
        } else if (!pregMatchAlphabets(m2_lname)) {
            $('#reg-member2_last_name_error').text("- Only alphabets allowed -");
            error = true;
        } else if (m2_lname.length < 2 || m2_lname.length > 40) {
            $('#reg-member2_last_name_error').text("- Length must be from 2 to 40 characters -");
            error = true;
        }

        if (organisation === "") {
            $('#reg-organisation_error').text("- Organisation is required -");
            error = true;
        } else if (!pregMatchCommon(organisation)) {
            $('#reg-organisation_error').text("- Wrong Organisation format -");
            error = true;
        } else if (organisation.length < 3 || organisation.length > 40) {
            $('#reg-organisation_error').text("- Length must be from 3 to 40 characters -");
            error = true;
        }

        if (locality === "") {
            $('#reg-locality_error').text("- Locality is required -");
            error = true;
        } else if (!pregMatchCommon(locality)) {
            $('#reg-locality_error').text("- Wrong Locality format -");
            error = true;
        } else if (locality.length < 3 || locality.length > 120) {
            $('#reg-locality_error').text("- Length must be from 3 to 120 characters -");
            error = true;
        }

        if (phone_number === "") {
            $('#reg-phone_number_error').text("- Phone number is required -");
            error = true;
        } else if (!pregMatchNumbers(phone_number)) {
            $('#reg-phone_number_error').text("- Only numbers allowed -");
            error = true;
        } else if (phone_number.length !== 10) {
            $('#reg-phone_number_error').text("- Length must be equal to 10 numbers -");
            error = true;
        }

        if (error) {
            $('#fail-msg').text("- Error, Check input data! -");
        } else {
            $.post("php/login-register.php", {
                team_name: team_name,
                email: email,
                password: password,
                m1_fname: m1_fname,
                m1_lname: m1_lname,
                m2_fname: m2_fname,
                m2_lname: m2_lname,
                organisation: organisation,
                locality: locality,
                category: category,
                phone_number: phone_number,
                action: "registration"
            }, function (data) {
                if (data === "success") {
                    $('#success-msg').text("- Successful Registration -");
                    $('#fail-msg').text("");
                } else {
                    $('#success-msg').text("");
                    $('#fail-msg').text(data);
                }
            });
        }
    });
});

// Clear Registration fields
$(document).ready(function () {
    $('#reg-clear-btn').click(function () {
        $('#fail-msg').text("");
        $('#success-msg').text("");
        clearRegisterFields();
    });
});

function clearRegisterFields() {
    // Reserve

    $('#reg-team_name').val("");
    $('#reg-email').val("");
    $('#reg-password').val("");
    $('#reg-re_password').val("");
    $('#reg-member1_first_name').val("");
    $('#reg-member1_last_name').val("");
    $('#reg-member2_first_name').val("");
    $('#reg-member2_last_name').val("");
    $('#reg-organisation').val("");
    $('#reg-locality').val("");
    $('#reg-category').val("0");
    $('#reg-phone_number_code').val("");
    $('#reg-phone_number_part1').val("");
    $('#reg-phone_number_part2').val("");
    $('#reg-phone_number_part3').val("");

    $('#reg-team_name_error').text("");
    $('#reg-email_error').text("");
    $('#reg-password_error').text("");
    $('#reg-re_password_error').text("");
    $('#reg-member1_first_name_error').text("");
    $('#reg-member1_last_name_error').text("");
    $('#reg-member2_first_name_error').text("");
    $('#reg-member2_last_name_error').text("");
    $('#reg-organisation_error').text("");
    $('#reg-locality_error').text("");
    $('#reg-category_error').text("");
    $('#reg-phone_number_error').text("");
}

/* --- [Authorization] --- */

// Check the Correctness of input data in Real Time
$(document).ready(function () {
    $('#log-email').keyup(function () {
        $('#log-email-error').text("");
        $('#fail-msg').text("");
        if (!validateEmail($('#log-email').val())) {
            $('#log-email_error').text("- Wrong Email format -");
        }
    });
    $('#log-password').keyup(function () {
        $('#log-password_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchCommon($('#log-password').val())) {
            $('#log-password_error').text("- Wrong Password format -");
        }
    });
});

// Check the Correctness of input data before inserting to Database
$(document).ready(function () {
    $('#log-login-btn').click(function () {
        $('#fail-msg').text("");
        $('#success-msg').text("");

        $('#log-email_error').text("");
        $('#log-password_error').text("");

        var email = $('#log-email').val();
        var password = $('#log-password').val();

        var error = false;

        if (email === "") {
            $('#log-email_error').text("- Email is required -");
            error = true;
        } else if (!validateEmail(email)) {
            $('#log-email_error').text("- Wrong Email format -");
            error = true;
        }
        if (password === "") {
            $('#log-password_error').text("- Password is required -");
            error = true;
        } else if (!pregMatchCommon(password)) {
            $('#log-password_error').text("- Wrong Password format -");
            error = true;
        }

        if (error) {
            $('#fail-msg').text("- Error, Check input data! -");
        } else {
            $.post("php/login-register.php", {
                email: email,
                password: password,
                action: "authorization"
            }, function (data) {
                if (data === "success") {
                    $('#fail-msg').text("");
                    clearLoginFields();
                    window.location.href = "index.php";
                } else {
                    $('#fail-msg').text(data);
                }
            });
        }
    });
});

// Clear Authorization fields
$(document).ready(function () {
    $('#log-clear-btn').click(function () {
        $('#fail-msg').text("");
        clearLoginFields();
    });
});

function clearLoginFields() {
    $('#log-email').val("");
    $('#log-password').val("");

    $('#log-email_error').text("");
    $('#log-password_error').text("");
}