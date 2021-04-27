<?php

/** Retrieve records from Database and Send JSON Encoded Result */

require '../database/connectDB.php';

function validateData($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$errorMsg = "";
$record = [];
$response = "";

if (isset($_POST['field'])) {
    switch ($_POST['field']) {
        case "teamname":
            $teamName = strtolower(validateData($_POST['teamName']));
            $stmt = "SELECT teamname FROM team WHERE LOWER(teamname)=?";
            $query1 = $conn->prepare($stmt);
            $query1->bind_param("s", $teamName);
            if ($query1->execute()) {
                $queryResult = $query1->get_result();
                $record = mysqli_fetch_array($queryResult);
            } else {
                $errorMsg = mysqli_error($conn);
            }
            $query1->close();
            $conn->close();

            if ($record['teamname'] == null) {
                $response = "Free";
            } else if ($record['teamname'] != null) {
                $response = "Reserved";
            } else {
                $response = $errorMsg;
            }
            echo json_encode($response);
            break;
        case "email":
            $email = strtolower(validateData($_POST['email']));
            $stmt = "SELECT email FROM team WHERE LOWER(email)=?";
            $query2 = $conn->prepare($stmt);
            $query2->bind_param("s", $email);
            if ($query2->execute()) {
                $queryResult = $query2->get_result();
                $record = mysqli_fetch_array($queryResult);
            } else {
                $errorMsg = mysqli_error($conn);
            }
            $query2->close();
            $conn->close();

            if ($record['email'] == null) {
                $response = "Free";
            } else if ($record['email'] != null) {
                $response = "Reserved";
            } else {
                $response = $errorMsg;
            }
            echo json_encode($response);
            break;
        default:
            echo json_encode("No Action");
    }

}
