<?php

require_once "database/connectDB.php";
function finalTable($conn, $tableName, $round) {
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

function bubbleSort($array) {
    if (!$length = count($array)) {
        return $array;
    }
    for ($outer = 0; $outer < $length; $outer++) {
        for ($inner = 0; $inner < $length; $inner++) {
            if ($array[$outer]["total"] > $array[$inner]["total"]) {
                $tmp = $array[$outer];
                $array[$outer] = $array[$inner];
                $array[$inner] = $tmp;
            } else if ($array[$outer]["total"] == $array[$inner]["total"]) {
                if ($array[$outer]["time"] < $array[$inner]["time"]) {
                    $tmp = $array[$outer];
                    $array[$outer] = $array[$inner];
                    $array[$inner] = $tmp;
                }
            }
        }
    }
    return $array;
}

function getFinalResults($conn, $category) {
    $arr1 = finalTable($conn, $category, 1);
    $arr2 = finalTable($conn, $category, 2);
    $arr3 = finalTable($conn, $category, 3);
    $arrFinal = [];

    $counter = 0;
    foreach ($arr1 as $value) {
        $arrFinal[$counter]["id"] = $value["id"];
        $arrFinal[$counter]["teamname"] = $value["teamname"];

        $teamname = $value["teamname"];
        $id = 0;

        foreach ($arr2 as $a => $b) {
            if ($b["teamname"] == $teamname) {
                $id = $a;
            }
        }

        if ($value["total"] > $arr2[$id]["total"]) {
            $arrFinal[$counter]["task1"] = $value["task1"];
            $arrFinal[$counter]["task2"] = $value["task2"];
            $arrFinal[$counter]["task3"] = $value["task3"];
            $arrFinal[$counter]["total"] = $value["total"];
            $arrFinal[$counter]["time"] = $value["time"];
        } else if ($value["total"] < $arr2[$id]["total"]) {
            $arrFinal[$counter]["task1"] = $arr2[$id]["task1"];
            $arrFinal[$counter]["task2"] = $arr2[$id]["task2"];
            $arrFinal[$counter]["task3"] = $arr2[$id]["task3"];
            $arrFinal[$counter]["total"] = $arr2[$id]["total"];
            $arrFinal[$counter]["time"] = $arr2[$id]["time"];
        } else {
            if ($value["time"] < $arr2[$id]["time"]) {
                $arrFinal[$counter]["task1"] = $value["task1"];
                $arrFinal[$counter]["task2"] = $value["task2"];
                $arrFinal[$counter]["task3"] = $value["task3"];
                $arrFinal[$counter]["total"] = $value["total"];
                $arrFinal[$counter]["time"] = $value["time"];
            } else {
                $arrFinal[$counter]["task1"] = $arr2[$id]["task1"];
                $arrFinal[$counter]["task2"] = $arr2[$id]["task2"];
                $arrFinal[$counter]["task3"] = $arr2[$id]["task3"];
                $arrFinal[$counter]["total"] = $arr2[$id]["total"];
                $arrFinal[$counter]["time"] = $arr2[$id]["time"];
            }
        }
        $counter++;
    }

    foreach ($arrFinal as $key=>$value) {
        $teamname = $value["teamname"];
        $id = 0;

        foreach ($arr3 as $a => $b) {
            if ($b["teamname"] == $teamname) {
                $id = $a;
            }
        }

        if ($value["total"] < $arr3[$id]["total"]) {
            $arrFinal[$key]["task1"] = $arr3[$id]["task1"];
            $arrFinal[$key]["task2"] = $arr3[$id]["task2"];
            $arrFinal[$key]["task3"] = $arr3[$id]["task3"];
            $arrFinal[$key]["total"] = $arr3[$id]["total"];
            $arrFinal[$key]["time"] = $arr3[$id]["time"];
        } else if (($value["total"] == $arr3[$id]["total"]) && ($value["time"] > $arr3[$id]["time"])) {
            $arrFinal[$key]["task1"] = $arr3[$id]["task1"];
            $arrFinal[$key]["task2"] = $arr3[$id]["task2"];
            $arrFinal[$key]["task3"] = $arr3[$id]["task3"];
            $arrFinal[$key]["total"] = $arr3[$id]["total"];
            $arrFinal[$key]["time"] = $arr3[$id]["time"];
        }
    }

    return bubbleSort($arrFinal);
}

//foreach ($arrFinal as $a) {
//    echo $a["teamname"] . " - ";
//    echo $a["total"] . " - ";
//    echo $a["time"];
//    echo "<br>";
//}