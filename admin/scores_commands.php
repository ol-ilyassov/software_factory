<?php

function recordsAll($conn, $tableName, $round)
{
    $tableName = trim($tableName);
    $tableName = mysqli_real_escape_string($conn, $tableName);
    $tableName = stripslashes($tableName);

    $query = "SELECT id, teamname, task1, task2, task3, (task1 + task2 + task3) as 'total', time FROM $tableName INNER JOIN `team` ON $tableName.team_id=team.team_id WHERE round = $round ORDER BY total DESC, time ASC";
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

    $query = sprintf("SELECT id, teamname, round, task1, task2, task3, time FROM $tableName INNER JOIN `team` ON $tableName.team_id = team.team_id WHERE id=%d", $recordId);
    $result = mysqli_query($conn, $query);

    if (!$result)
        die(mysqli_error($conn));

    return mysqli_fetch_assoc($result);
}

/** -EDIT- */

function recordEdit($conn, $id, $task1, $task2, $task3, $time, $tableName)
{
    $id = (int)$id;
    $task1 = (int)$task1;
    $task2 = (int)$task2;
    $task3 = (int)$task3;
    $time = (int)$time;

    //Make the error flag.
    $error = false;

    //Check the variables. The variable must store certain values. task1,task2,task3 must store 0;5 ro 10.
    //Timem must store value from 0 to 2.
    //Times must store value from 0 to 59.
    if (($task1 < 0) || ($task1 > 10))
        $error = true;
    if (($task2 < 0) || ($task2 > 10))
        $error = true;
    if (($task3 < 0) || ($task3 > 10))
        $error = true;
    if (($timem < 0) || ($timem > 2))
        $error = true;
    if (($times < 0) || ($times > 59))
        $error = true;
    if (($timem == 2) && ($times <> 0))
        $error = true;
    if ((!preg_match('/^[0-9]*$/', $times)) || (!preg_match('/^[0-9]*$/', $timem)) || (!preg_match('/^[0-9]*$/', $white_count)) || (!preg_match('/^[0-9]*$/', $black_count)))
        $error = true;

    //If the variable store the value that will be equal to 'true', then sql query will not be made.
    if ($error == false) {
        $sum_scores = ($task1 + $task2 + $task3);
        //Query for updating data in table with name that given by external variable ($tablename).
        $sql = "UPDATE $tablename SET task1='%d', task2='%d', task3='%d', sum_scores='%d', timem='%d', times='%d' WHERE id='%d'";
        $query = sprintf($sql,
            mysqli_real_escape_string($conn, $task1),
            mysqli_real_escape_string($conn, $task2),
            mysqli_real_escape_string($conn, $task3),
            mysqli_real_escape_string($conn, $sum_scores),
            mysqli_real_escape_string($conn, $timem),
            mysqli_real_escape_string($conn, $times),
            $id);

        //Check the correctness of query. If the query did not work, the site will not be shown.
        $result = mysqli_query($conn, $query);

        if (!$result)
            die(mysqli_error($conn));
    }
}

?>
