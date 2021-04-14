<?php
session_start();
require_once('dbconnect.php');
$con = db_connect();

if((isset($_SESSION['admin_id'])) || (isset($_SESSION['judge_id']))) {
} 
else {
    header("Location: index.php");
}
$query = sprintf("SELECT * FROM teams WHERE id_team=%d", (int)$id);
$result = mysqli_query($con, $query);
if (!$result)
	die(mysqli_error($con));
$personaldata= mysqli_fetch_assoc($result);	


?>

<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Информация про команду';
    include 'head.php'; ?>
    <BODY>
    <div class="body">
    <?php 
    //Receive navigation for website from navigation.php file
    include 'navigation.php'; 
    //Receive header block content from header.php file
    include 'header_standart.php'; 
    ?> 
    <div class="between_content"><br><p class="content">Профиль команды</p><br></div>
    <div class="middle_content">
    <br><br>
    <p><span style="color:grey;">Название Команды:</span> <?=$personaldata['teamname']?></p>
    <br>
    <p><span style="color:grey;">Имя Участника 1:</span> <?=$personaldata['participant1name']?></p>
    <br>
    <p><span style="color:grey;">Фамилия Участника 1:</span> <?=$personaldata['participant1surname']?></p>
    <br>
    <p><span style="color:grey;">Имя Участника 2:</span> <?=$personaldata['participant2name']?></p>
    <br>
    <p><span style="color:grey;">Фамилия Участника 2:</span> <?=$personaldata['participant2surname']?></p>
    <br>
    <p><span style="color:grey;">Имя Тренера:</span> <?=$personaldata['trainername']?></p>
    <br>
    <p><span style="color:grey;">Фамилия Тренера:</span> <?=$personaldata['trainersurname']?></p>
    <br>
    <p><span style="color:grey;">Название школы:</span> <?=$personaldata['schoolname']?></p>
    <br>
    <p><span style="color:grey;">Название Населенного пункта:</span> <?=$personaldata['locationname']?></p>
    <br>
    <p><span style="color:grey;">Электронная почта:</span> <?=$personaldata['email']?></p>
    <br>
    <p><span style="color:grey;">Номер мобильного телефона:</span> <?=$personaldata['telephone']?></p>
    <center>
    <br><br>
    <?php
    if(isset($_SESSION['admin_id'])) {
        $page = 'team_control_admin.php';
    }
    else {
        if(isset($_SESSION['judge_id'])) {
            $page = 'team_control_judge.php';
        }
    }
    ?>
    <a class="content" href="<?=$page?>"><div class='button'><br><p class='caption'>Обратно...</p><br></div></a>
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