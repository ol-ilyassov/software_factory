<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();

//If session is completed, then the judge will be redirected to main page, if judge got the address to this page.
if(isset($_SESSION['judge_id'])) {
	header("Location: index.php");
}
//If session is completed, then the administrator will be redirected to main page, if administrator got the address to this page.
if(isset($_SESSION['admin_id'])) {
	header("Location: index.php");
}
//Check if form is submitted
if (isset($_POST['login'])) {
	$judgelogin = mysqli_real_escape_string($con, $_POST['judgelogin']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT id_judge, name FROM judges WHERE login = '" . $judgelogin. "' and password = '" . md5($password) . "'");

    //If the system will find similar login and password in database user, then make session
	if ($row = mysqli_fetch_array($result)) {
        $_SESSION['judge_id'] = $row['id_judge'];
		$_SESSION['judge_name'] = $row['name'];
		$query = mysqli_query($con, "SELECT id_category FROM category_judge WHERE id_judge = '" . $row['id_judge']. "'");
		$record = mysqli_fetch_array($query);
		$_SESSION['judge_category'] = $record['id_category'];
        header("Location: index.php");  
	} 
    else { $errormsg = "Неправильный Логин или Пароль!";};    
}
?>
<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Авторизация(Судья)';
    include 'head.php'; ?>
    <BODY>
    <div class="body">
    <?php 
    //Receive navigation for website from navigation.php file
    include 'navigation.php'; 
    //Receive header block content from header.php file
    include 'header_standart.php'; 
    ?> 
    <div class="between_content"><br><p class="content">Авторизация(Судья)</p><br></div>
    <div class="middle_content">
    <center>
    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
    <fieldset>  
        <br>
        <label for="judgelogin">Логин</label><br>
        <input class="register" type="text" name="judgelogin" placeholder="Введите логин" required/>
        <br><br>
          
        <label for="password">Пароль</label><br>
        <input class="register" type="password" name="password" placeholder="Введите пароль" required/>
        <br><br>
         
        <input class="register" type="submit" name="login" value="Авторизация"/>
        <br><br>
    </fieldset>
    <!-- If the authorization process is failed, then the error message will be shown -->
    <span class="error"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
    <br><br>
    </form>
    <br><br>
    <a class="content" href="index.php"><div class='button'><br><p class='caption'>Обратно...</p><br></div></a>
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
