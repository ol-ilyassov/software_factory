<?php
session_start();

if (empty($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: /software_factory/");
}

require "../database/connectDB.php";
require "scores_commands.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "";
}

if ($action == "edit") {
    if (!isset($_GET["id"]))
        header("Location: scores.php");
    $id = (int)$_GET["id"];
    $tableName = $_GET["tableName"];

    if (!empty($_POST) && $id > 0) {
        recordEdit($conn, $id, $_POST["task1"], $_POST["task2"], $_POST["task3"], $_POST["time"], $tableName);
        header("Location: scores.php");
    } else {
        $record = recordGet($conn, $id, $tableName);
    }
    require "scores_record.php";
} else {
    require "scores_records.php";
}
