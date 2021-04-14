<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Only admin will get access to this page. In other case, the user will be retrieved to main page (index.php)
if(!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
} 
?>
<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Таблица cудьей';
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
        <div class="between_content"><br><p class="content">Таблица судьей</p><br></div>
        <div class="middle_content1">        
        <center>
        <br>
        <a href="judge_new.php"><div class='button'><br><p class='caption'>Добавить судью</p><br></div></a>
        <br><br>
        </center>
        <table>
            <tr>
                <th>Логин</th>
	            <th>Имя</th>
		        <th>Категория</th>
		        <th></th>
		        <th></th>
	        </tr>
            <?php foreach($judges as $a): 
            //Get the teamname by using team_id
                $query = sprintf("SELECT id_category FROM category_judge WHERE id_judge=%d", (int)$a['id_judge']);
		        $result = mysqli_query($con, $query);
		        $idtemp = mysqli_fetch_assoc($result);
		        $query = sprintf("SELECT category_name FROM category WHERE id_category=%d", (int)$idtemp['id_category']);
		        $result = mysqli_query($con, $query);
		        $temp = mysqli_fetch_assoc($result);
		        ?>
            <tr>
                <td><?=$a['login']?></td>
	            <td><?=$a['name']?></td>
		        <td><?=$temp['category_name']?></td>
		        <td><a href="judges_control_admin.php?action=edit&id=<?=$a['id_judge']?>">Изменить категорию</a></td>
		        <td><a href="judges_control_admin.php?action=delete&id=<?=$a['id_judge']?>">Удалить</a></td>
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