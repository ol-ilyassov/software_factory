<?php  
//Resume existing session and helps to work with saved data of user
session_start();
//If session is completed, then the judge will be redirected to main page, if judge got the address to this page.
if(!isset($_SESSION['admin_id'])) {
	header("Location: index.php");
}
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();

$query1 = sprintf("SELECT access FROM reg_control WHERE 	id=1");
$result1 = mysqli_query($con, $query1);
$accesstemp = mysqli_fetch_assoc($result1);

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['reg_control_form_submit'])) {
    $access = mysqli_real_escape_string($con, $_POST['access']);
    
    //Clean Data from additional spaces
    $access =trim($access);
    
	if((!preg_match('/^[0-9]*$/', $access))) {
		 $error = true;
		 $access_error = "Значение должна быть числом!";
	}
    if (($access < 0)|| ($access >1)) {
		 $error = true;
		 $access_error = "Должно быть значение 0 или 1!";
    }
	if ($error) {
         $errormsg = "Ошибка в данных, проверьте правильность заполнения формы!";
    }
    else {
		$sql = "UPDATE reg_control SET access='%d' WHERE id=1";
        $query = sprintf($sql,
            mysqli_real_escape_string($con, $access));
            
        //Check the correctness of query. If the query did not work, the site will not be shown. 
        $result = mysqli_query($con, $query);
    
        if ($result)
		$successmsg = "Процесс успешно завершен!";
		else
		$errormsg = "Ошибка в отправлении формы, попробуйте позже!";
    }
}
?>

<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Доступ к странице Регистрации';
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
        <div class="between_content"><br><p class="content">Страница Регистрации</p><br></div>
        <div class="middle_content">
            <br>
            <?php
            if($accesstemp['access'] == 1){
            ?>
                <p class="content">Страница Регистрация - <span class="success">общедоступна</span>.</p>
            <?php
            }
            else {
            ?>
                <p class="content">Страница Регистрация - <span class="error">закрыта</span>.</p>
            <?php
            }
            ?>
            <br>
            </p>
        </div>
    </ARTICLE>
    <br><br>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Инструкция</p><br></div>
        <div class="middle_content">
            <p class="content">
            <br>
            Данная форма предназначена для открытия доступа к странице регистрации.<br><br>
            Чтобы открыть доступ к странице, нужно ввести значение = 1.<br><br>
            Чтобы закрыть доступ к странице, нужно ввести значение = 0.<br><br>
            </p>
        </div>
    </ARTICLE>
    <br><br>
    <ARTICLE>
    <div class="between_content"><br><p class="content">Доступ участников к странице регистрация</p><br></div>
    <div class="middle_content">
    <center>
    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="time_control_form">
    <fieldset>
    <br>
    <label for="access">Доступ</label><br>
    <input class="register" type="text" name="access" required value="<?php if($error) echo $access; ?>" />
    <br><span class="error">
    <!-- If written information connected with access is wrong, then will be shown error message-->
    <?php if (isset($access_error)) echo $access_error; ?> </span>
    
    <br><br>
    <input class="register" type="submit" name="reg_control_form_submit" value="Установить" />
	<br><br>
    </fieldset>
    </form>
	<!-- If the registration process is successful, then the success message will be shown -->
    <span class="success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
    <!-- If the registration process is failed, then the error message will be shown -->
    <span class="error"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>  
    <br><br>
    <a class="content" href="account_admin.php"><div class='button'><br><p class='caption'>Обратно...</p><br></div></a>
    <br><br>
    </center> 
    </div>
    </ARTICLE>
    <br><br>
    <br><br>
    <br>
    </div>
    </BODY>
</HTML>
