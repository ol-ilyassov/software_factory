<?php

function recordsAll($conn, $tableName, $round)
{
    $tableName = trim($tableName);
    $tableName = mysqli_real_escape_string($conn, $tableName);
    $tableName = stripslashes($tableName);

    $stmt = "SELECT id, teamname, task1, task2, task3, 
       (task1 + task2 + task3) as 'total', time FROM `%s` 
       INNER JOIN `team` ON `%s`.team_id=team.team_id WHERE 
       round = %d ORDER BY total DESC, time ASC";
    $query = sprintf($stmt, $tableName, $tableName, $round);
    $result = mysqli_query($conn, $query);
    if (!$result)
        die(mysqli_error($conn));

    $n = mysqli_num_rows($result);
    $records = array();

    for ($i = 0; $i < $n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $records[] = $row;
    }

    return $records;
}

function recordGet($conn, $recordId, $tableName)
{
    $tableName = trim($tableName);
    $tableName = mysqli_real_escape_string($conn, $tableName);
    $tableName = stripslashes($tableName);
    $recordId = trim($recordId);
    $recordId = mysqli_real_escape_string($conn, $recordId);
    $recordId = (int)stripslashes($recordId);

    $stmt = "SELECT id, teamname, round, task1, task2, task3, time FROM `%s` INNER JOIN `team` ON `%s`.team_id = team.team_id WHERE id=%d";
    $query = sprintf($stmt, $tableName, $tableName, $recordId);
    $result = mysqli_query($conn, $query);
    if (!$result)
        die(mysqli_error($conn));

    return mysqli_fetch_assoc($result);
}

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
        $stmt = "UPDATE `%s` SET task1=%d, task2=%d, task3=%d, time='%s' WHERE id=%d";
        $query = sprintf($stmt, $tableName, $task1, $task2, $task3, $time, $id);
        $result = mysqli_query($conn, $query);
        if (!$result)
            die(mysqli_error($conn));
    }
}
