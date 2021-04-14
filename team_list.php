<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Only admin will get access to this page. In other case, the user will be retrieved to main page (index.php)
if((isset($_SESSION['admin_id'])) || (isset($_SESSION['judge_id']))) {
} 
else {
    header("Location: index.php");
}
?>
<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Таблица команд';
    include 'head.php'; ?>
    <BODY>
    <div class='body'>
    <?php 
    //Receive navigation for website from navigation.php file
    include 'navigation.php'; 
    //Receive header block content from header.php file
    include 'header_standart.php'; 
    
    if (($_SESSION['judge_category'] == 1) || (isset($_SESSION['admin_id']))) {
    ?>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Участники Line Follower</p><br></div>
        <div class="middle_content1">
        <br><br>        
        <table>
            <tr>
                <th>Название команды</th>
		        <th></th>
		        <th></th>
	        </tr>
            <?php foreach($teams_linefollower as $a): 
            //Get the teamname by using team_id
                $query = sprintf("SELECT teamname FROM teams WHERE id_team=%d", (int)$a['id_team']);
		        $result = mysqli_query($con, $query);
		        $idtemp = mysqli_fetch_assoc($result);
		        ?>
            <tr>
                <td><?=$idtemp['teamname']?></td>
		        <?php 
		        if(isset($_SESSION['admin_id'])) { ?>
		        <td><a href="team_control_admin.php?action=show&id=<?=$a['id_team']?>">Подробнее</a></td>
		        <td><a href="team_control_admin.php?action=delete&id=<?=$a['id_team']?>">Удалить</a></td>
		        <?php } 
		        else {
		            if(isset($_SESSION['judge_id'])) { ?>
		                <td><a href="team_control_judge.php?action=show&id=<?=$a['id_team']?>">Подробнее</a></td>
		                <td><a href="team_control_judge.php?action=delete&id=<?=$a['id_team']?>">Удалить</a></td>
		            <?php
		            }
		        }
		        ?>
	        </tr>
            <?php endforeach ?>
        </table>
        <br><br>
        </div>
    </ARTICLE>
    <br><br>
    <?php 
    }
    if (($_SESSION['judge_category'] == 2) || (isset($_SESSION['admin_id']))) {
    ?>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Участники Kegelring</p><br></div>
        <div class="middle_content1">
        <br><br>
        <table>
            <tr>
                <th>Название команды</th>
		        <th></th>
		        <th></th>
	        </tr>
            <?php foreach($teams_kegelring as $a): 
            //Get the teamname by using team_id
                $query = sprintf("SELECT teamname FROM teams WHERE id_team=%d", (int)$a['id_team']);
		        $result = mysqli_query($con, $query);
		        $idtemp = mysqli_fetch_assoc($result);
		    ?>
            <tr>
                <td><?=$idtemp['teamname']?></td>
		        <?php 
		        if(isset($_SESSION['admin_id'])) { ?>
		        <td><a href="team_control_admin.php?action=show&id=<?=$a['id_team']?>">Подробнее</a></td>
		        <td><a href="team_control_admin.php?action=delete&id=<?=$a['id_team']?>">Удалить</a></td>
		        <?php } 
		        else {
		            if(isset($_SESSION['judge_id'])) { ?>
		                <td><a href="team_control_judge.php?action=show&id=<?=$a['id_team']?>">Подробнее</a></td>
		                <td><a href="team_control_judge.php?action=delete&id=<?=$a['id_team']?>">Удалить</a></td>
		            <?php
		            }
		        }
		        ?>
	        </tr>
            <?php endforeach ?>
        </table>
        <br><br>
        </div>
    </ARTICLE>
    <?php 
    }
    ?>
    <br><br><br><br>        
    </div>
    <?php 
    //Receive content of footer block from footer.php file
    include 'footer.php'; ?>
    </BODY>
</HTML>