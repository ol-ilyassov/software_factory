<?php

  //Returns records about teams from specific table ($tablename).
  function teams_all_onecategory($conn, $tablename) {
    $tablename = trim($tablename);
    $tablename = mysqli_real_escape_string($conn, $tablename);
    $tablename = stripslashes($tablename);
    $query = "SELECT team_id FROM $tablename ORDER BY team_id DESC";
    $result = mysqli_query($conn, $query);
    if (!$result)
      die(mysqli_error($conn));
    $n = mysqli_num_rows($result);
    $records = array();
    for ($i= 0; $i < $n; $i++) {
      $row = mysqli_fetch_assoc($result);
      $records[] = $row;
    }
    return $records;
  }

  //Returns all information about team by using inputted id.
  function getTeamInfoById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM teams WHERE team_id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
      $result = $stmt->get_result();
      $record = mysqli_fetch_array($result);
    } else {
      echo "ERROR";
    }
    $stmt->close();
    return $record;
  }
?>
