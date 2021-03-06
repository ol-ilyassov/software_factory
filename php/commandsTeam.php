<?php
  //Returns teamName by using inputted id.
  function getTeamName($conn, $input) {
    $input = (int)$input;
    $stmt = $conn->prepare("SELECT teamname FROM team WHERE team_id = ?");
    $stmt->bind_param('i', $input);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row["teamname"];
  }

  //Returns records about teams from specific table ($tablename).
  function teams_all_onecategory($conn, $categoryId) {
    $tablename = trim($categoryId);
    $tablename = mysqli_real_escape_string($conn, $categoryId);
    $tablename = stripslashes($categoryId);
    $query = "SELECT team_id FROM team WHERE category_id = '$categoryId' ORDER BY team_id DESC";
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
    $stmt = $conn->prepare("SELECT teamname, email, p1_fname, p2_fname, p1_lname, p2_lname, organisation, locality, phonenumber, category.title FROM team INNER JOIN category ON team.category_id = category.category_id  WHERE team_id=?");
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
