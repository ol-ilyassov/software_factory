<?php
    //Function for receiving all data about judges from database
    function judges_all($con)
	{
		//Запрос
		$query = "SELECT * FROM judges ORDER BY id_judge DESC";
		$result = mysqli_query($con, $query);
		
		if (!$result)
			die(mysqli_error($con));
		
		//Извлечение из БД
		$n = mysqli_num_rows($result);
		$judges = array();
		
		for ($i= 0; $i < $n; $i++)
		{
			$row = mysqli_fetch_assoc($result);
			$judges[] = $row;
		}
		
		return $judges;
    }
    //Function for receiving 1 data about judge from database
    function judges_get($con, $id_temp)
	{
		//Запрос
		$query = sprintf("SELECT * FROM judges WHERE id_judge=%d", (int)$id_temp);
		$result = mysqli_query($con, $query);
		
		if (!$result)
			die(mysqli_error($con));
		
		$judge = mysqli_fetch_assoc($result);
		
		return $judge;
	}

	//Function for editing one special judge account
	function judges_edit($con, $id, $id_category){
		//Подготовка
              $id_category = (int)$id_category;
              $id = (int)$id;
        
        //Проверка
              if (($id_category < 0)||($id_category > 2))
                  return false;
        
        //Запрос
              $sql = "UPDATE category_judge SET id_category='%d' WHERE id_category_judge='%d'";
        
        $query = sprintf($sql,
            mysqli_real_escape_string($con, $id_category),
                         $id);
        $result = mysqli_query($con, $query);
        
        if (!$result)
            die(mysqli_error($con));
        
        return mysqli_affected_rows($con);     
	}
	//Function for deleting one special judge
	function judges_delete($con, $id){
		$id = (int)$id;
        //Проверка
        if($id == 0)
            return false;
        
        //Запрос
        $query = sprintf("DELETE FROM category_judge WHERE id_judge='%d'",$id);
        $result = mysqli_query($con,$query);
        
        if(!$result)
            die(mysqli_error($con));
            
        $query = sprintf("DELETE FROM judges WHERE id_judge='%d'",$id);
        $result = mysqli_query($con,$query);
        
        return mysqli_affected_rows($con);
	}

?>