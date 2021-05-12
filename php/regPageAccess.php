<?php

require_once "../database/connectDB.php";

if (isset($_POST["signal"])) {
    if ($_POST["signal"] == "registerAccess") {
        switch ($_POST["action"]) {
            case "GET":
                $stmt = "SELECT value FROM settings WHERE parameter = 'registerAccess'";
                $query = $conn->prepare($stmt);
                if ($query->execute()) {
                    $result = $query->get_result();
                    $record = mysqli_fetch_array($result);
                    echo $record["value"];
                }
                $query->close();
                $conn->close();
                break;
            case "SET":
                $stmt = "UPDATE settings SET value=? WHERE parameter='registerAccess'";
                $query = $conn->prepare($stmt);
                $query->bind_param("s", $_POST["value"]);
                $result = $query->execute();
                echo $result;
                $query->close();
                $conn->close();
                break;
        }
    }
}
