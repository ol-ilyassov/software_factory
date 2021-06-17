<?php
session_start();

require_once '../database/connectDB.php';
require_once 'config.php';

function validateData($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "REGISTRATION":
            $teamName = validateData($_POST['teamName']);
            $email = validateData($_POST['email']);
            $password = validateData($_POST['password']);
            $m1Fname = validateData($_POST['m1Fname']);
            $m1Lname = validateData($_POST['m1Lname']);
            $m2Fname = validateData($_POST['m2Fname']);
            $m2Lname = validateData($_POST['m2Lname']);
            $organisation = validateData($_POST['organisation']);
            $locality = validateData($_POST['locality']);
            $category = validateData($_POST['category']);
            $phoneNumber = validateData($_POST['phoneNumber']);

            $password = md5($password . secretKey1);

            $categoryId = 0;
            $categoryQuery = "";
            switch ($category) {
                case 'Line Follower':
                    $categoryId = 1;
                    $categoryQuery = "INSERT INTO linefollower(
                         team_id, round, time, task1, task2, task3) 
                         VALUES (?, ?, 0, 0, 0, 0)";
                    break;
                case 'Kegelring':
                    $categoryId = 2;
                    $categoryQuery = "INSERT INTO kegelring(
                         team_id, round, time, task1, task2, task3) 
                         VALUES (?, ?, 0, 0, 0, 0)";
                    break;
            }

            $stmt = $conn->prepare("INSERT INTO team(
                 teamname, email, password, p1_fname, p1_lname,
                 p2_fname, p2_lname, organisation, locality,
                 category_id, phonenumber)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                 ");
            $stmt->bind_param("sssssssssis", $teamName,
                $email, $password, $m1Fname, $m1Lname,
                $m2Fname, $m2Lname, $organisation, $locality,
                $categoryId, $phoneNumber);
            $stmt->execute();
            $tempId = $stmt->insert_id;
            $stmt->close();

            $stmtRound1 = $conn->prepare($categoryQuery);
            $round1 = 1;
            $stmtRound1->bind_param("ii", $tempId, $round1);

            $stmtRound2 = $conn->prepare($categoryQuery);
            $round2 = 2;
            $stmtRound2->bind_param("ii", $tempId, $round2);

            $stmtRound3 = $conn->prepare($categoryQuery);
            $round3 = 3;
            $stmtRound3->bind_param("ii", $tempId, $round3);

            if ($stmtRound1->execute() &&
                $stmtRound2->execute() &&
                $stmtRound3->execute()) {
                echo "success";
            } else {
                echo mysqli_error($conn);
            }
            $stmtRound1->close();
            $stmtRound2->close();
            $stmtRound3->close();
            $conn->close();
            break;
        case "AUTHORIZATION":
            $email = validateData($_POST['email']);
            $password = validateData($_POST['password']);
            $password = md5($password . secretKey1);
            $result = [];
            $flag = false;

            // Team Validation
            $queryTeam = "SELECT team_id, teamname FROM team WHERE email=? AND password=?";
            $stmtTeam = $conn->prepare($queryTeam);
            $stmtTeam->bind_param("ss", $email, $password);
            if ($stmtTeam->execute()) {
                $result = $stmtTeam->get_result();
                $record = mysqli_fetch_array($result);
                if ($record['team_id'] != "") {
                    $_SESSION["id"] = $record['team_id'];
                    $_SESSION["name"] = $record['teamname'];
                    $_SESSION["role"] = "team";
                    echo "success";
                } else {
                    // Judge Validation
                    $queryJudge = "SELECT judge_id, fname FROM judge WHERE email=? AND password=?";
                    $stmtJudge = $conn->prepare($queryJudge);
                    $stmtJudge->bind_param("ss", $email, $password);
                    if ($stmtJudge->execute()) {
                        $result = $stmtJudge->get_result();
                        $record = mysqli_fetch_array($result);
                        if ($record['judge_id'] != "") {
                            $_SESSION["id"] = $record['judge_id'];
                            $_SESSION["name"] = $record['fname'];
                            $_SESSION["role"] = "judge";
                            echo "success";
                        } else {
                            // Admin Validation
                            $queryAdmin = "SELECT admin_id, fname FROM administrator WHERE email=? AND password=?";
                            $stmtAdmin = $conn->prepare($queryAdmin);
                            $stmtAdmin->bind_param("ss", $email, $password);
                            if ($stmtAdmin->execute()) {
                                $result = $stmtAdmin->get_result();
                                $record = mysqli_fetch_array($result);
                                if ($record['admin_id'] != "") {
                                    $_SESSION["id"] = $record['admin_id'];
                                    $_SESSION["name"] = $record['fname'];
                                    $_SESSION["role"] = "admin";
                                    echo "success";
                                } else {
                                    echo "not found";
                                }
                            } else {
                                echo mysqli_error($conn);
                            }
                            $stmtAdmin->close();
                        }
                    } else {
                        echo mysqli_error($conn);
                    }
                    $stmtJudge->close();
                }
            } else {
                echo mysqli_error($conn);
            }
            $stmtTeam->close();
            $conn->close();
            break;
        default:
            echo "No Action";
    }
}
