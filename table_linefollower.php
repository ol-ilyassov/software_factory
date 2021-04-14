<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Receive functions that are stored in commands_linefollower.php file. 
require_once("commands_linefollower.php");
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();
?>

<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Таблицы Line Follower';
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
        <div class="between_content"><br><p class="content">Line Follower - Таблица Результатов (1 Раунд): </p><br></div>
        <div class="middle_content1">
        <br><br>
        <table>
            <tr>
	            <th>Команда</th>
		        <th>Задание 1 (макс.10)</th>
                <th>Задание 2 (макс.10)</th>
                <th>Задание 3 (макс.10)</th>
                <th>Сумма очков (макс.30)</th>
                <th>Время <br>(макс. 02:00) </th> 
	        </tr>
            <?php
            //Receive all records from linefollower_round1 table
            $tablename = 'linefollower_round1';
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
                <td><?=$a['task1']?></td>
                <td><?=$a['task2']?></td>
                <td><?=$a['task3']?></td>
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
        <div class="between_content"><br><p class="content">Line Follower - Таблица Результатов (2 Раунд): </p><br></div>
        <div class="middle_content1">
        <br><br>
        <table>
            <tr>
	            <th>Команда</th>
		            <th>Задание 1 (макс.10)</th>
                    <th>Задание 2 (макс.10)</th>
                    <th>Задание 3 (макс.10)</th>
                    <th>Сумма очков (макс.30)</th>
                    <th>Время <br>(макс. 02:00) </th> 
	        </tr>
            <?php
            //Receive all records from linefollower_round2 table
            $tablename = 'linefollower_round2';
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
                    <td><?=$a['task1']?></td>
                    <td><?=$a['task2']?></td>
                    <td><?=$a['task3']?></td>
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
        <div class="between_content"><br><p class="content">Line Follower - Таблица Результатов (3 Раунд): </p><br></div>
        <div class="middle_content1">
        <br><br>
        <table>
            <tr>
	            <th>Команда</th>
		        <th>Задание 1 (макс.10)</th>
                <th>Задание 2 (макс.10)</th>
                <th>Задание 3 (макс.10)</th>
                <th>Сумма очков (макс.30)</th>
                <th>Время <br>(макс. 02:00) </th> 
	        </tr>
            <?php
            //Receive all records from linefollower_round3 table
            $tablename = 'linefollower_round3';
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
                <td><?=$a['task1']?></td>
                <td><?=$a['task2']?></td>
                <td><?=$a['task3']?></td>
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