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