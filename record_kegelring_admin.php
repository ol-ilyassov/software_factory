<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Запись Kegelring';
    include 'head.php'; ?>
    <BODY>
    <div class="body">
    <?php 
    //Receive navigation for website from navigation.php file
    include 'navigation.php'; 
    //Receive header block content from header.php file
    include 'header_standart.php'; 
    //For showing teamname, we should get it from teams table in database by using id_team
    $query = sprintf("SELECT teamname FROM teams WHERE id_team=%d", (int)$record['id_team']);
	$result = mysqli_query($con, $query);
	$idtemp = mysqli_fetch_assoc($result);
	
	//It helps to represent which table(round) will be edited by judge
	$tablename = $_GET['tablename'];
	if($tablename =='kegelring_round1'){
	    $round = '1';
	}
	else {
	    if($tablename =='kegelring_round2'){
	        $round = '2';
	    }
	    else {
	        if($tablename == 'kegelring_round3'){
	            $round = '3';
	        }
	        else {$round = 'error';}
	    }
	}
	
    ?> 
    <div class="between_content"><br><p class="content">Правила</p><br></div>
    <div class="middle_content"><br>
        <p class="content">Для того чтобы изменения вступили в силу, нужно вводить определенные значения:<br><br>
        Количество белых банок: 0 - 5<br><br>
        Количество черных банок: 0 - 2<br><br>
        Количество минут: 0 - 2<br><br>
        Количество секунд: 0 - 59<br><br>
        Примечание: Если количество минут равно 02:00, то количество секунд не может быть больше 00:00 <br><br>
        </p>
    </div>  
    <br><br>
    <!--This part represents round and teamname for understanding what will be edited-->
    <div class="between_content"><br><p class="content">Раунд: <?=$round?> <br> Команда: <?=$idtemp['teamname']?></p><br></div>
    <div class="middle_content">
    <center><br>
    <form method="post" action="table_kegelring_admin.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>&tablename=<?=$_GET['tablename']?>">
		<label>К-во. белых (max.5)<br></label>
		<input class="register" type="text" name="white_count" value="<?=$record['white_count']?>" class="form-item" autofocus required>
		
		<br><br>
        <label>К-во. черных (max.2)<br></label>
		<input class="register" type="text" name="black_count" value="<?=$record['black_count']?>" class="form-item" autofocus required>
		<br><br>
                    
		<label>Время (минуты)<br></label>
		<input class="register" type="text" name="timem" value="<?=$record['timem']?>" class="form-item" required>
        <br><br>
        
		<label>Время (секунды)<br></label>
		<input class="register" type="text" name="times" value="<?=$record['times']?>" class="form-item" required>
        <br><br>
                    
        <input class="register" type="submit" value="Сохранить" class="btn">
        <br><br>
    </form>
    <br><br>
    <a class="content" href="table_kegelring_admin.php"><div class='button'><br><p class='caption'>Обратно...</p><br></div></a>
    <br><br>
    </center> 
    </div>
    <br><br><br><br>
    </div>
    <?php 
    //Receive content of footer block from footer.php file
    include 'footer.php'; ?>
    </BODY>
</HTML>