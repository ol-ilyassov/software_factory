<?php
require "../database/connectDB.php";

function recordEdit($conn, $id, $task1, $task2, $task3, $time, $tableName)
{
    $id = mysqli_real_escape_string($conn, $id);
    $id = (int)$id;
    $task1 = mysqli_real_escape_string($conn, $task1);
    $task1 = (int)$task1;
    $task2 = mysqli_real_escape_string($conn, $task2);
    $task2 = (int)$task2;
    $task3 = mysqli_real_escape_string($conn, $task3);
    $task3 = (int)$task3;
    $time = mysqli_real_escape_string($conn, $time);

    $error = false;

    if ($task1 < 0 || $task1 > 10)
        $error = true;
    if ($task2 < 0 || $task2 > 10)
        $error = true;
    if ($task3 < 0 || $task3 > 10)
        $error = true;
    if ($time < "00:00:00" || $time > "00:02:00")
        $error = true;

    if ($error == false) {
        $query = sprintf("UPDATE `%s` SET task1=%d, task2=%d, task3=%d, time='%s' WHERE id=%d",
            $tableName, $task1, $task2, $task3, $time, $id);

        echo $query;

        $result = mysqli_query($conn, $query);
        echo "<br>".$result;
        if (!$result)
            die(mysqli_error($conn));

    }
}

echo recordEdit($conn, 1, 5, 5, 5, "00:01:00", "lineFollower");

