<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Receive functions that are stored in commands_kegelring.php file. 
require_once("commands_kegelring.php");
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();
?>

<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Таблицы Kegelring';
    include 'head.php'; ?>
    <BODY >
    <div class='body'>
    <?php 
    //Receive navigation for website from navigation.php file
    include 'navigation.php'; 
    //Receive header block content from header.php file
    include 'header_standart.php'; 
    ?>  
    <ARTICLE>
        <div class="between_content"><br><p class="content">Kegelring - Таблица Результатов (1 Раунд): </p><br></div>
        <div class="middle_content1">
        <br><br>
        <table>
            <tr>
	            <th>Команда</th>
		        <th>К-во. белых (макс.5)</th>
                <th>К-во. черных (макс.2)</th>
                <th>Сумма очков (макс.25)</th>
                <th>Время <br>(макс. 02:00) </th> 
	        </tr>
            <?php
            //Receive all records from kegelring_round1 table
            $tablename = 'kegelring_round1';
            $records = records_all($con,$tablename);
            //Loop for working with each record
            foreach($records as $a): 
            //Get the teamname by using team_id
            $query = sprintf("SELECT teamname FROM teams WHERE id_team=%d", (int)$a['id_team']);
		    $result = mysqli_query($con, $query);
		    $idtemp = mysqli_fetch_assoc($result);
		    ?>
            <tr>
	            <td><?=$idtemp['teamname']?></td>
                <td><?=$a['white_count']?></td>
                <td><?=$a['black_count']?></td>
		        <td><?=$a['sum_scores']?></td>
                <td><?php //Helps to regulate the time view for a friendly interface for users
                echo '0'; echo $a['timem'];echo ':'; if ($a['times']<10) {echo '0';echo $a['times'];} else {echo $a['times'];}; ?></td>
	        </tr>
            <?php endforeach ?>
        </table>
        <br><br>
        </div>
    </ARTICLE>
    <br><br>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Kegelring - Таблица Результатов (2 Раунд): </p><br></div>
        <div class="middle_content1">
        <br><br>
        <table>
            <tr>
	            <th>Команда</th>
		            <th>К-во. белых (макс.5)</th>
                    <th>К-во. черных (макс.2)</th>
                    <th>Сумма очков (макс.25)</th>
                    <th>Время <br>(макс. 02:00) </th> 
	        </tr>
            <?php
            //Receive all records from kegelring_round2 table
            $tablename = 'kegelring_round2';
            $records = records_all($con,$tablename);
            //Loop for working with each record
            foreach($records as $a): 
            //Get the teamname by using team_id
            $query = sprintf("SELECT teamname FROM teams WHERE id_team=%d", (int)$a['id_team']);
		    $result = mysqli_query($con, $query);
		    $idtemp = mysqli_fetch_assoc($result);
		    ?>
            <tr>
	                <td><?=$idtemp['teamname']?></td>
                    <td><?=$a['white_count']?></td>
                    <td><?=$a['black_count']?></td>
		            <td><?=$a['sum_scores']?></td>
                    <td><?php //Helps to regulate the time view for a friendly interface for users
                    echo '0'; echo $a['timem'];echo ':'; if ($a['times']<10) {echo '0';echo $a['times'];} else {echo $a['times'];}; ?></td>
	        </tr>
            <?php endforeach ?>
        </table>
        <br><br>
        </div>
    </ARTICLE>
    <br><br>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Kegelring - Таблица Результатов (3 Раунд): </p><br></div>
        <div class="middle_content1">
        <br><br>
        <table>
            <tr>
	            <th>Команда</th>
		        <th>К-во. белых (макс.5)</th>
                <th>К-во. черных (макс.2)</th>
                <th>Сумма очков (макс.25)</th>
                <th>Время <br>(макс. 02:00) </th> 
	        </tr>
            <?php
            //Receive all records from kegelring_round3 table
            $tablename = 'kegelring_round3';
            $records = records_all($con,$tablename);
            //Loop for working with each record
            foreach($records as $a): 
            //Get the teamname by using team_id
            $query = sprintf("SELECT teamname FROM teams WHERE id_team=%d", (int)$a['id_team']);
		    $result = mysqli_query($con, $query);
		    $idtemp = mysqli_fetch_assoc($result);
		    ?>
            <tr>
	            <td><?=$idtemp['teamname']?></td>
                <td><?=$a['white_count']?></td>
                <td><?=$a['black_count']?></td>
		        <td><?=$a['sum_scores']?></td>
                <td><?php //Helps to regulate the time view for a friendly interface for users
                echo '0'; echo $a['timem'];echo ':'; if ($a['times']<10) {echo '0';echo $a['times'];} else {echo $a['times'];}; ?></td>
	        </tr>
            <?php endforeach ?>
        </table>
        <br><br>
        </div>
    </ARTICLE>
    <br><br><br><br>
    </div>
    <?php 
    //Receive content of footer block from footer.php file
    include 'footer.php'; ?>
    </BODY>
</HTML>