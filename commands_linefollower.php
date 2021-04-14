<?php
//Receive all records from table with title that will be given by special variable (for example: $tablename).
function records_all($con,$tablename){
	//Query for receiving all records from table with title that will be given by special variable (for example: $tablename).
	$query = "SELECT * FROM $tablename ORDER BY sum_scores DESC, timem ASC, times ASC";
	$result = mysqli_query($con, $query);
	
	//if variable $result will be empty, then show error of query.
	if (!$result)
	    die(mysqli_error($con));
	
	//Get number of rows.
	$n = mysqli_num_rows($result);
	$records = array();
	
	//Cycle for making massive.
	for ($i= 0; $i < $n; $i++){
		  $row = mysqli_fetch_assoc($result);
		  $records[] = $row;
	}
	
	//Data massive will be stored in external variable.
	return $records;
}   
//Receive one record from table with title that will be given by special variable (for example: $tablename).
function records_get($con, $id_record, $tablename){
	//Query for receiving one record from table with title that will be given by special variable (for example: $tablename).
	$query = sprintf("SELECT * FROM $tablename WHERE 	id=%d", (int)$id_record);
	$result = mysqli_query($con, $query);
	
	//Check the correctness of query. If the query did not work, the site will not be shown. 
	if (!$result)
        die(mysqli_error($con));
	
	//Save data in variable.
	$record = mysqli_fetch_assoc($result);
	
	//Data variable will be stored in external variable.
	return $record;
}
//This function helps to edit data in table with title that will be given by variable (for example: $tablename).
function records_edit($con, $id, $task1, $task2, $task3, $timem, $times, $tablename){
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
    if (($task1 <> 0) ||($task1 <> 5) || ($task1 <> 10))
        $error = true;
    if (($task2 <> 0) ||($task2 <> 5) || ($task2 <> 10))
        $error = true;
    if (($task3 <> 0) ||($task3 <> 5) || ($task3 <> 10))
        $error = true;
    if (($timem < 0) || ($timem > 2))
        $error = true;
    if (($times < 0) || ($times > 59))
        $error = true;
    if (($timem == 2) && ($times <> 0))
        $error = true;
    if ((!preg_match('/^[0-9]*$/', $times)) || (!preg_match('/^[0-9]*$/', $timem)) || (!preg_match('/^[0-9]*$/', $task1)) || (!preg_match('/^[0-9]*$/', $task2)) || (!preg_match('/^[0-9]*$/', $task3)))
        $error = true;
    
    //If the variable store the value that will be equal to 'true', then sql query will not be made.
    if ($error == false){
        $sum_scores = ($task1 + $task2 + $task3);
        //Query for updating data in table with name that given by external variable ($tablename).
        $sql = "UPDATE $tablename SET task1='%d', task2='%d', task3='%d', sum_scores='%d', timem='%d', times='%d' WHERE id='%d'";
        $query = sprintf($sql,
            mysqli_real_escape_string($con, $task1),
            mysqli_real_escape_string($con, $task2),
            mysqli_real_escape_string($con, $task3),
            mysqli_real_escape_string($con, $sum_scores),
            mysqli_real_escape_string($con, $timem),
            mysqli_real_escape_string($con, $times),
            $id);
            
        //Check the correctness of query. If the query did not work, the site will not be shown. 
        $result = mysqli_query($con, $query);
    
        if (!$result)
            die(mysqli_error($con));
    }
}

//Compare data in three tables 
function record_final($con,$id){
    //Get all data from table and store in data massive
    $tablename = 'linefollower_round1';
    $record_round1 = records_get($con, $id,$tablename);
        
    $tablename = 'linefollower_round2';
    $record_round2 = records_get($con, $id,$tablename);
        
    $tablename = 'linefollower_round3';
    $record_round3 = records_get($con, $id,$tablename);
        
    //Compare data from record_round1 with data from record_round2. The best scores will be stored in $best_record massive
    if($record_round1['sum_scores'] > $record_round2['sum_scores']){
        $best_record['task1'] = $record_round1['task1'];
        $best_record['task2'] = $record_round1['task2'];
        $best_record['task3'] = $record_round1['task3'];
        $best_record['sum_scores'] = $record_round1['sum_scores'];
        $best_record['timem'] = $record_round1['timem'];
        $best_record['times'] = $record_round1['times'];
    }
    else {
        if($record_round1['sum_scores'] < $record_round2['sum_scores']){
            $best_record['task1'] = $record_round2['task1'];
            $best_record['task2'] = $record_round2['task2'];
            $best_record['task3'] = $record_round2['task3'];
            $best_record['sum_scores'] = $record_round2['sum_scores'];
            $best_record['timem'] = $record_round2['timem'];
            $best_record['times'] = $record_round2['times'];
        }
        else {
            $timetemp1 = (($record_round1['timem']*60)+$record_round1['times']);
            $timetemp2 = (($record_round2['timem']*60)+$record_round2['times']);
            if($timetemp1 > $timetemp2){
                $best_record['task1'] = $record_round2['task1'];
                $best_record['task2'] = $record_round2['task2'];
                $best_record['task3'] = $record_round2['task3'];
                $best_record['sum_scores'] = $record_round2['sum_scores'];
                $best_record['timem'] = $record_round2['timem'];
                $best_record['times'] = $record_round2['times'];
            }
            else {
                $best_record['task1'] = $record_round1['task1'];
                $best_record['task2'] = $record_round1['task2'];
                $best_record['task3'] = $record_round1['task3'];
                $best_record['sum_scores'] = $record_round1['sum_scores'];
                $best_record['timem'] = $record_round1['timem'];
                $best_record['times'] = $record_round1['times'];
            }
        }
    }
    
    //Moreover, We must take into account that we have the data from the third table. So The best scores will be stored in $best_record massive
    if($best_record['sum_scores'] < $record_round3['sum_scores']){
        $best_record['task1'] = $record_round3['task1'];
        $best_record['task2'] = $record_round3['task2'];
        $best_record['task3'] = $record_round3['task3'];
        $best_record['sum_scores'] = $record_round3['sum_scores'];
        $best_record['timem'] = $record_round3['timem'];
        $best_record['times'] = $record_round3['times'];
    }
    else {
        if($best_record['sum_scores'] > $record_round3['sum_scores']){
            $best_record['task1'] = $best_record['task1'];
            $best_record['task2'] = $best_record['task2'];
            $best_record['task3'] = $best_record['task3'];
            $best_record['sum_scores'] = $best_record['sum_scores'];
            $best_record['timem'] = $best_record['timem'];
            $best_record['times'] = $best_record['times'];
        }
        else{
            $timetemp1 = (($best_record['timem']*60)+$best_record['times']);
            $timetemp2 = (($record_round3['timem']*60)+$record_round3['times']);
            if($timetemp1 > $timetemp2){
                $best_record['task1'] = $record_round3['task1'];
                $best_record['task2'] = $record_round3['task2'];
                $best_record['task3'] = $record_round3['task3'];
                $best_record['sum_scores'] = $record_round3['sum_scores'];
                $best_record['timem'] = $record_round3['timem'];
                $best_record['times'] = $record_round3['times'];
            }
        }
    }
    
    //Finally, best record data will be stored in database of phpmyadmin   
    $sql = "UPDATE linefollower_final SET task1='%d', task2='%d', task3='%d', sum_scores='%d', timem='%d', times='%d' WHERE id='%d'";
    $query = sprintf($sql,
        mysqli_real_escape_string($con, $best_record['task1']),
        mysqli_real_escape_string($con, $best_record['task2']),
        mysqli_real_escape_string($con, $best_record['task3']),
        mysqli_real_escape_string($con, $best_record['sum_scores']),
        mysqli_real_escape_string($con, $best_record['timem']),
        mysqli_real_escape_string($con, $best_record['times']),
        $id);
    
    //Check the correctness of query. If the query did not work, the site will not be shown.  
    $result = mysqli_query($con, $query);
    
    if (!$result)
        die(mysqli_error($con));
}
?>