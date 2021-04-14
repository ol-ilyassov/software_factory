<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Receive functions that are stored in commands_linefollower.php file.
require_once("commands_linefollower.php");
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();

function records_winners($con,$tablename){
    //Запрос
    $query = "SELECT * FROM $tablename ORDER BY sum_scores DESC, timem ASC, times ASC LIMIT 3";
    $result = mysqli_query($con, $query);
	
    if (!$result)
    	die(mysqli_error($con));
	
    //Извлечение из БД
    $n = mysqli_num_rows($result);
    $records = array();
	
    for ($i= 0; $i < $n; $i++){
    	$row = mysqli_fetch_assoc($result);
    	$records[] = $row;
    }
    return $records;
}
$tablename ='linefollower_final';
$linefollower_databased = records_all($con,$tablename);
$linefollower_records = records_winners($con,$tablename);
$tablename ='kegelring_final';
$kegelring_databased = records_all($con,$tablename);
$kegelring_records = records_winners($con,$tablename);
$count = '0';
$n = '0';
$averagescore = '0';
$averagetimem = '0';
$averagetimes = '0';
$successtask = '0';
?>

<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Итоговые Результаты';
    include 'head.php'; ?>
    <BODY>
    <div class='body'>    
    <?php 
    //Receive navigation for website from navigation.php file
    include 'navigation.php'; 
    //Receive header block content from header.php file
    include 'header_standart.php'; 
    ?>  
    <ARTICLE>
        <div class="between_content"><br><p class="content">Line Follower - Призовые места: </p><br></div>
        <div class="middle_content">
        <br><br>
        <table class="admin-table">
            <tr>
	            <th>Команда</th>
		        <th>Набранные Баллы</th>
                <th>Время <br>(макс. 02:00) </th>
                <th>Место</th>
	        </tr>
            <?php 
            foreach($linefollower_records as $a): 
                $count = ($count+1);
                $query = sprintf("SELECT teamname FROM teams WHERE id_team=%d", (int)$a['id_team']);
                $result = mysqli_query($con, $query);
		        $idtemp = mysqli_fetch_assoc($result);
            ?>
            <tr>
	            <td><?=$idtemp['teamname']?></td>
                <td><?=$a['sum_scores']?></td>
                <td><?php echo '0'; echo $a['timem'];echo ':'; if ($a['times']<10) {echo '0';echo $a['times'];} else {echo $a['times'];};  ?></td>
                <td><?=$count?></td>
	        </tr>
            <?php endforeach ?>
        </table>
        <br><br>
        </div>
    </ARTICLE>
    <br><br>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Line Follower - Сводка: </p><br></div>
        <div class="middle_content">
        <br><br>
        <?php foreach($linefollower_databased as $a):
            if($a['id_team'] != "")
                $n = ($n+1);
            if($a['sum_scores'] == 30)
                $successtask = ($successtask+1);
            $averagescore = ($a['sum_scores'] + $averagescore);
            $averagetimem = ($a['timem'] + $averagetimem);
            $averagetimes = ($a['times'] + $averagetimes);
        endforeach;
        $averagescore = ($averagescore / $n); $averagescore = round($averagescore);  
        $averagetimem = ($averagetimem * 60);
        $averagetimes = ($averagetimem + $averagetimes);
        $averagetimem = 0;
        $averagetimes = ($averagetimes / $n);
        $averagetimes = round($averagetimes);
        if(($averagetimes > 0) && ($averagetimes < 60)){
            $averagetimem = 0;
        };
        if(($averagetimes > 60) && ($averagetimes < 120)){ 
            $averagetimem = 1;
            $averagetimes = $averagetimes - 60;
        };
        if($averagetimes == 120){
            $averagetimem = 2;
            $averagetimes = 0;
        };    
        $successtaskprocent= (($successtask / $n) *100)
        ?>
        <p class="content"><span style="color:grey;">Средний балл за соревнования:</span> <?=$averagescore?> / 30 (макс.)</p><br>
        <p class="content"><span style="color:grey;">Среднее время прохождения:</span> <?php echo '0'; echo $averagetimem;echo ':'; if ($averagetimes<10) {echo '0';echo $averagetimes;} else {echo $averagetimes;}; ?> / 02:00 (макс.)</p><br>
        <p class="content"><span style="color:grey;">Процент полного успешного прохождения карты:</span> <?=$successtask?> / <?=$n?> участников (<?=$successtaskprocent?>%)</p>
        <br><br>
        </div>
    </ARTICLE>
    <br><br>
    <!--Kegelring -->
    <?php
    $count = '0';
    $n = '0';
    $averagescore = '0';
    $averagetimem = '0';
    $averagetimes = '0';
    $successtask = '0';
    ?>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Kegelring - Призовые места: </p><br></div>
        <div class="middle_content">
        <br><br>
        <table class="admin-table">
            <tr>
	            <th>Команда</th>
		        <th>Набранные Баллы</th>
                <th>Время <br>(макс. 02:00) </th>
                <th>Место</th>
	        </tr>
            <?php 
            foreach($kegelring_records as $a): 
                $count = ($count+1);
                $query = sprintf("SELECT teamname FROM teams WHERE id_team=%d", (int)$a['id_team']);
                $result = mysqli_query($con, $query);
		        $idtemp = mysqli_fetch_assoc($result);
            ?>
            <tr>
	            <td><?=$idtemp['teamname']?></td>
                <td><?=$a['sum_scores']?></td>
                <td><?php echo '0'; echo $a['timem'];echo ':'; if ($a['times']<10) {echo '0';echo $a['times'];} else {echo $a['times'];};  ?></td>
                <td><?=$count?></td>
	        </tr>
            <?php endforeach ?>
        </table>
        <br><br>
        </div>
    </ARTICLE>
    <br><br>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Kegelring - Сводка: </p><br></div>
        <div class="middle_content">
        <br><br>
        <?php foreach($kegelring_databased as $a):
            if($a['id_team'] != "")
                $n = ($n+1);
            if($a['sum_scores'] == 25)
                $successtask = ($successtask+1);
            $averagescore = ($a['sum_scores'] + $averagescore);
            $averagetimem = ($a['timem'] + $averagetimem);
            $averagetimes = ($a['times'] + $averagetimes);
        endforeach;
        $averagescore = ($averagescore / $n); $averagescore = round($averagescore);  
        $averagetimem = ($averagetimem * 60);
        $averagetimes = ($averagetimem + $averagetimes);
        $averagetimem = 0;
        $averagetimes = ($averagetimes / $n);
        $averagetimes = round($averagetimes);
        if(($averagetimes > 0) && ($averagetimes < 60)){
            $averagetimem = 0;
        };
        if(($averagetimes > 60) && ($averagetimes < 120)){ 
            $averagetimem = 1;
            $averagetimes = $averagetimes - 60;
        };
        if($averagetimes == 120){
            $averagetimem = 2;
            $averagetimes = 0;
        };    
        $successtaskprocent= (($successtask / $n) *100)
        ?>
        <p class="content"><span style="color:grey;">Средний балл за соревнования:</span> <?=$averagescore?> / 30 (макс.)</p><br>
        <p class="content"><span style="color:grey;">Среднее время прохождения:</span> <?php echo '0'; echo $averagetimem;echo ':'; if ($averagetimes<10) {echo '0';echo $averagetimes;} else {echo $averagetimes;}; ?> / 02:00 (макс.)</p><br>
        <p class="content"><span style="color:grey;">Процент полного успешного прохождения карты:</span> <?=$successtask?> / <?=$n?> участников (<?=$successtaskprocent?>%)</p>
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