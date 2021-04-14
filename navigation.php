<?php
//Resume existing session and helps to work with saved data of user
if(!isset($_SESSION)) {
        session_start();
    }
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();
//Get the value from database that impact on access to register page
$queryaccess = sprintf("SELECT access FROM reg_control WHERE id=1");
$resultaccess = mysqli_query($con, $queryaccess);
$accesstemp = mysqli_fetch_assoc($resultaccess);
?>

<input type="checkbox" id="nav-toggle" hidden>
<NAV class="nav">
    <label for="nav-toggle" class="nav-toggle" onclick></label>
    <h2>Навигация</h2>
    <ul>
        <li><a href="index.php">Начало</a></li>
        <li><a href="linefollowerrules.php">Правила Line Follower</a></li>
        <li><a href="kegelringrules.php">Правила Kegelring</a></li>
        <?php
        //Session checking. Depending on the session, certain pages become available.
        if((isset($_SESSION['judge_id']))&&($_SESSION['judge_category'] == '1')) {
        ?>
            <li><a href="table_linefollower_admin.php">Таблицы Line Follower</a></li>
        <?php
        }
        else {
            if (isset($_SESSION['admin_id'])) { ?>
                <li><a href="table_linefollower_admin.php">Таблицы Line Follower</a></li>
            <?php
            }
            else { ?>
            <li><a href="table_linefollower.php">Таблицы Line Follower</a></li>
            <?php
            }
        }
        if((isset($_SESSION['judge_id']))&&($_SESSION['judge_category'] == '2')) { ?>
            <li><a href="table_kegelring_admin.php">Таблицы Kegelring</a></li>
        <?php
        }
        else {
            if(isset($_SESSION['admin_id'])) { ?>
                <li><a href="table_kegelring_admin.php">Таблицы Kegelring</a></li>
            <?php
            }
            else { ?>
            <li><a href="table_kegelring.php">Таблицы Kegelring</a></li>
            <?php
            }
        } ?>
        <li><a href="statistics.php">Итоговые Результаты</a></li>

        <?php
        if(isset($_SESSION['judge_id'])) { ?>
            <li><a href="account_judge.php">Аккаунт(Судья): <?php echo $_SESSION['judge_name']; ?></a></li>
        <?php
        }
        else {
            if(isset($_SESSION['admin_id'])) { ?>
                <li class="nav-item"><a href="account_admin.php">Аккаунт(Админ): <?php echo $_SESSION['admin_name']; ?></a></li>
        <?php
            }
        }
        if((isset($_SESSION['judge_id'])) || (isset($_SESSION['admin_id']))) {
        ?>
        <li class="nav-item"><a href="logout.php">Выйти</a></li>
        <?php
        }
        if((!isset($_SESSION['judge_id'])) && (!isset($_SESSION['admin_id']))) { ?>
			<li class="nav-item"><a href="login_admin.php">Авторизация(Админ)</a></li>
            <li class="nav-item"><a href="login_judge.php">Авторизация(Судья)</a></li>
        <?php
        if(($accesstemp['access']) == 1) { ?>
            <li class="nav-item"><a href="register.php">Регистрация Участников</a></li>
        <?php } ?>
        <?php } ?>
    </ul>
</NAV>
