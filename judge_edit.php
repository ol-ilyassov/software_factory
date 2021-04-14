<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Only admin will get access to this page. In other case, the user will be retrieved to main page (index.php)
if(!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
} 

$sql = sprintf("SELECT id_category FROM category_judge WHERE id_judge=%d", (int)$judge['id_judge']);
$categorycheck = mysqli_query($con, $sql);
$idtemp = mysqli_fetch_assoc($categorycheck);

?>
<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Судья';
    include 'head.php'; ?>
    <BODY>
    <div class="body">
    <?php 
    //Receive navigation for website from navigation.php file
    include 'navigation.php'; 
    //Receive header block content from header_standart.php file
    include 'header_standart.php'; 
    ?> 
    <ARTICLE>
        <div class="between_content"><br><p class="content">Правила</p><br></div>
        <div class="middle_content">
        <p class="content">
        <br>
        Для того чтобы изменить категорию, нужно ввести ввести определенное значение:<br><br>
        1) Вне категории -> Значение: '0'<br><br>
        2) Line Follower -> Значение: '1' <br><br>
        3) Kegelring -> Значение: '2'
        <br><br>
        </p>
        </div>
    </ARTICLE>
    <br><br>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Судья</p><br></div>
        <div class="middle_content">
        <p class="content">
        <br>
        <center>
        Логин: <?=$judge['login']?> <br><br>
        Имя: <?=$judge['name']?> <br><br>
        </p>
        <form method="post" action="judges_control_admin.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
            <label>Категория<br>
			<input class='register' type="text" name="id_category" value="<?=$idtemp['id_category']?>"  required>
			</label>
            <br><br>  
            <input class='register' type="submit" value="Сохранить" class="btn">
        </form>
        <br><br>
        <a class="content" href="judges_control_admin.php"><div class='button'><br><p class='caption'>Обратно...</p><br></div></a>
        <br><br>
        </center>
        </div>
    </ARTICLE>
    <br><br><br><br>
    </div>
    <?php 
    //Receive content of footer block from footer.php file
    include 'footer.php'; ?>
    </BODY>
</HTML>