<?php
  //Connect to Database and get array with team Names.
  //After, encode it in Json and send to Register page.
  require '../database/dbconnect.php';

  $errMsg = "";

  if (true) {

  }

  $sql = "SELECT login FROM clients";
  $stmt = $conn->prepare($sql);
  if ($stmt->execute()) {
    $result = $stmt->get_result();
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    $errMsg = mysqli_error($conn);
  }

  $stmt->close();
  $conn->close();

  if ($errMsg != "") {
    echo $errMsg;
  } else {
    echo json_encode($records);
  }
?>
