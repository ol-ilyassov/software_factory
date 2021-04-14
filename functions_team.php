<?php
function teams_delete($con, $id){
	$id = (int)$id;
    //Проверка
    if($id == 0)
        return false;
        
    //Запрос
    $query = sprintf("DELETE FROM kegelring_final WHERE id_team='%d'",$id);
    $result = mysqli_query($con,$query);
    if(!$result)
        die(mysqli_error($con));
    $query = sprintf("DELETE FROM kegelring_round1 WHERE id_team='%d'",$id);
    $result = mysqli_query($con,$query);
    if(!$result)
        die(mysqli_error($con));
    $query = sprintf("DELETE FROM kegelring_round2 WHERE id_team='%d'",$id);
    $result = mysqli_query($con,$query);
    if(!$result)
        die(mysqli_error($con));
    $query = sprintf("DELETE FROM kegelring_round3 WHERE id_team='%d'",$id);
    $result = mysqli_query($con,$query);
    if(!$result)
        die(mysqli_error($con));    
        
    $query = sprintf("DELETE FROM linefollower_final WHERE id_team='%d'",$id);
    $result = mysqli_query($con,$query);
    if(!$result)
        die(mysqli_error($con));
    $query = sprintf("DELETE FROM linefollower_round1 WHERE id_team='%d'",$id);
    $result = mysqli_query($con,$query);
    if(!$result)
        die(mysqli_error($con));
    $query = sprintf("DELETE FROM linefollower_round2 WHERE id_team='%d'",$id);
    $result = mysqli_query($con,$query);
    if(!$result)
        die(mysqli_error($con));
    $query = sprintf("DELETE FROM linefollower_round3 WHERE id_team='%d'",$id);
    $result = mysqli_query($con,$query);
    if(!$result)
        die(mysqli_error($con));
            
    $query = sprintf("DELETE FROM teams WHERE id_team='%d'",$id);
    $result = mysqli_query($con,$query);
    if(!$result)
        die(mysqli_error($con));
        
    return mysqli_affected_rows($con);
}
function teams_all_onecategory($con,$tablename){
	//Запрос
	$query = "SELECT id_team FROM $tablename ORDER BY id_team DESC";
	$result = mysqli_query($con, $query);
		
	if (!$result)
		die(mysqli_error($con));
		
	//Извлечение из БД
	$n = mysqli_num_rows($result);
	$teams = array();
		
	for ($i= 0; $i < $n; $i++)
	{
		$row = mysqli_fetch_assoc($result);
		$teams[] = $row;
	}
		
	return $teams;
}
function teams_get($con, $id_temp){
	//Запрос
	$query = sprintf("SELECT * FROM teams WHERE id_team=%d", (int)$id_temp);
	$result = mysqli_query($con, $query);
		
	if (!$result)
		die(mysqli_error($con));
		
	$team = mysqli_fetch_assoc($result);
		
	return $team;
}
?>