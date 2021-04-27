<?php

require '../database/connectDB.php';

function validateData($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "REGISTRATION":
            // Work 1
            $teamName = validateData($_POST['teamName']);
            $email = validateData($_POST['email']);
            $password = validateData($_POST['password']);
            $m1Fname = validateData($_POST['participant1Name']);
            $m1Lname = validateData($_POST['participant1Surname']);
            $m2Fname = validateData($_POST['participant2Name']);
            $m2Lname = validateData($_POST['participant2Surname']);
            $organisation = validateData($_POST['organisation']);
            $locality = validateData($_POST['locality']);
            $category = validateData($_POST['category']);
            $phoneNumber = validateData($_POST['phoneNumber']);


            $stmt = $conn->prepare("INSERT INTO team(
                 teamname, email, password, p1_fname, p1_lname,
                 p2_fname, p2_lname, organisation, locality,
                 category_id, phonenumber)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                 ");
            $stmt->bind_param("sssssssssds", $teamName,
                $email, $password, $m1Fname, $m1Lname,
                $m2Fname, $m2Lname, $organisation, $locality,
                $category, $phoneNumber);

            $stmt->execute();
            $idtemp = $stmt->insert_id;
            $stmt->close();

//            if ($category == "Line Follower") {
//                $stmt1 = $conn->prepare("INSERT INTO linefollower(team_id)
//        VALUES (?)");
//                $stmt1->bind_param("i", $idtemp);
//            } else if ($category == "Kegelring") {
//                $stmt1 = $conn->prepare("INSERT INTO kegelring(team_id)
//        VALUES (?)");
//                $stmt1->bind_param("i", $idtemp);
//            }
//
//            if ($stmt1->execute()) {
//                echo "success";
//            } else {
//                echo mysqli_error($conn);
//            }
//
//            $stmt1->close();
            $conn->close();


            break;
        case "AUTHORIZATION":
            // Work 2
            break;
        default:
            // Incorrect POST Request
    }

}
