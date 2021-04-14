<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();
//Only admin will get access to this page. In other case, the user will be retrieved to main page (index.php)
if(!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
}

?>

<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Личный Кабинет';
    include 'head.php'; ?>
    <BODY >
    <div class='body'>
    <?php 
    //Receive navigation for website from navigation.php file
    include 'navigation.php'; 
    //Receive header block content from header.php file
    include 'header_standart.php'; 
    ?>
    <div class="between_content"><br><p class="content">Профиль</p><br></div>
    <div class="middle_content">
        <br><br>
        <center>
        <p class="content"><span style="color:grey;">Администратор: </span> <?=$_SESSION['admin_name']?></p>
        </center>
        <br><br>
    </div>    
    <br><br>
    <div class="between_content"><br><p class="content">Функции</p><br></div>
    <div class="middle_content">
        <br><br>
        <center>
        <a href='judges_control_admin.php'><div class='button'><br><br><p class='caption'>Управление Судьями</p><br><br></div></a>
        <br><br>
        <a href='team_control_admin.php'><div class='button'><br><br><p class='caption'>Управление Участниками</p><br><br></div></a>
        <br><br>
        <a href='register_page_control.php'><div class='button'><br><br><p class='caption'>Доступ к странице Регистрации</p><br><br></div></a>
        </center>
        <br><br>
    </div>
    <br><br><br><br>
    </div>
    <?php 
    //Receive content of footer block from footer.php file
    include 'footer.php'; ?>
    </BODY>
</HTML>