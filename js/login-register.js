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
    $('#reg-phone_number_code').keyup(function () {
        $('#reg-phone_number_error').text("");
        $('#fail-msg').text("");
        if (!pregMatchNumbers($('#reg-email').val())) {
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
        var re_password = $('#reg-password').val();
        var m1_fname = $('#reg-member1_first_name').val();
        var m1_lname = $('#reg-member1_last_name').val();
        var m2_fname = $('#reg-member2_first_name').val();
        var m2_lname = $('#reg-member2_last_namet').val();
        var organisation = $('#reg-organisation').val();
        var locality = $('#reg-locality').val();
        var category = $('#reg-category').val();
        var phone_number = $('#reg-phonenumber_code').val() +
            $('#reg-phonenumber_part1').val() +
            $('#reg-phonenumber_part2').val() +
            $('#reg-phonenumber_part3').val();

        var error = false;

    });
});