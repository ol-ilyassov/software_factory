<?php
  //Receive all records from table with title that will be given by special variable $tablename.
  function records_all($conn, $tablename) {
    $tablename = trim($tablename);
    $tablename = mysqli_real_escape_string($conn, $tablename);
    $tablename = stripslashes($tablename);

  	//Query for receiving all records from table with inputted title that will be given by special variable $tablename.
	  $query = "SELECT * FROM $tablename ORDER BY sum_scores DESC, timem ASC, times ASC";
	  $result = mysqli_query($conn, $query);

	  //if variable $result will be empty, then show error of query.
  	if (!$result)
	    die(mysqli_error($conn));

   	//Get number of rows.
  	$n = mysqli_num_rows($result);
	  $records = array();

  	//Cycle for making massive.
  	for ($i= 0; $i < $n; $i++) {
	    $row = mysqli_fetch_assoc($result);
	  	$records[] = $row;
	  }

	  //Data massive will be stored in external variable.
	  return $records;
  }

  //Receive one record by id from table with title that will be given by special variable $tablename.
  function record_get($conn, $id_record, $tablename) {
    $tablename = trim($tablename);
    $tablename = mysqli_real_escape_string($conn, $tablename);
    $tablename = stripslashes($tablename);
    $id_record = trim($id_record);
    $id_record = mysqli_real_escape_string($conn, $id_record);
    $id_record = stripslashes($id_record);

  	//Query for receiving one record from table with title that will be given by special variable $tablename.
  	$query = sprintf("SELECT * FROM $tablename WHERE 	id=%d", (int)$id_record);
  	$result = mysqli_query($conn, $query);

   	//Check the correctness of query. If the query did not work, the site will not be shown.
	  if (!$result)
      die(mysqli_error($conn));

    //Save data in variable.
  	$record = mysqli_fetch_assoc($result);

  	//Data variable will be stored in external variable.
  	return $record;
  }

  //This function helps to edit data in table with title that will be given by variable $tablename.
  function record_edit($conn, $id, $task1, $task2, $task3, $timem, $times, $tablename) {
  	//Prepare variables and save it in integer type.
    $id = (int)$id;
    $task1 = (int)$task1;
    $task2 = (int)$task2;
    $task3 = (int)$task3;
    $times = (int)$times;
    $timem = (int)$timem;

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

  //Displays proper time view.
  function getProperTime($timeM, $timeS) {
    $result = '0'.$timeM.':';
    if ($timeS < 10) {
      $result .= '0'.$timeS;
    } else {
      $result .= $timeS;
    }
    return $result;
  }
?>
