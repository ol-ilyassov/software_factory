<?php
//Resume existing session and helps to work with saved data of user
session_start();
//Only admin will get access to this page. In other case, the user will be retrieved to main page (index.php)
if(!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
} 
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();

//set validation error flag as false
$error = false;

//When the administrator submit the data about new judge, the entered data must be verified.
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $login = mysqli_real_escape_string($con, $_POST['login']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
    $name = trim($name);
    $login = trim($login);
	$password = trim($password);
	$cpassword = trim($cpassword);
	
    //Full name of judge must consist from only in russian alphabet
    if (!preg_match('/^[а-яё \t]+$/iu',$name)) {
		 $error = true;
		 $name_error = "Имя судьи должно состоять из букв кириллицы!";
	}
    //Full login should consist from only in latin alphabet or numbers
	if (!preg_match("/^[a-z0-9]+$/",$login)) {
		 $error = true;
		 $login_error = "Логин может содержать только английские маленькие буквы и  цифры!";
	}
	//The length of login must be less than 30 symbols
	if(strlen($login) > 30) {
		 $error = true;
		 $telephone_error = "Длина логина не может быть больше 30 символов";
	}
    //Check full login for similarity
    $query=mysqli_query($con, "SELECT login FROM judges WHERE login='".$login."'");
    $numrows=mysqli_num_rows($query);
    if($numrows != 0)
    {
		 $error = true;
		 $login_error = "Логин с таким названием уже существует!";
    }
    //The length of password must be bigger than 6 symbols
    if((strlen($password) < 6) && (strlen($password) > 50)) {
		 $error = true;
		 $password_error = "Пароль должен состоять от 6 до 50 символов!";
	}
    //Password must consist from latin alphabet,figures and special characters
    if ((!preg_match("/^[a-zA-Z0-9-!@#$%^&*_+=]+$/",$password))) {
		 $error = true;
		 $password_error = "Пароль может содержать только английские буквы, цифры и некоторые символы(!@#$%^&*_+=)!";
	}
    //Repeated password must be same as written password
	if($password != $cpassword) {
		 $error = true;
		 $cpassword_error = "Пароли не совпадают!";
	};
    //Check correctness of given personal data. If all personal data are correct, then make the records into database and show success message. In another case, there will be error message on the page.
	if ($error) {
         $errormsg = "Ошибка в регистрации, проверьте правильность заполнения формы!";
    }
    else {
        if(mysqli_query($con, "INSERT INTO judges(name, login, password) VALUES('" . $name . "','" . $login . "', '" . md5($password) . "')")) {
            $idtemp = mysqli_insert_id($con);
            $zero = 0;
            mysqli_query($con, "INSERT INTO category_judge(id_judge, id_category) VALUES('" . $idtemp . "','" . $zero . "')");
			$successmsg = "Регистрация прошла успешно!";
        } 
        else $errormsg = "Ошибка в отправке форме, попробуйте позже!";
    }
}
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
    //Receive header block content from header.php file
    include 'header_standart.php'; 
    ?> 
    <ARTICLE>
        <div class="between_content"><br><p class="content">Инструкция</p><br></div>
        <div class="middle_content">
            <p class="content">
            <br>
            Данная форма предназначена для проведения регистрации судьи на соревнования.<br><br>
            Личная информация может помочь в случае необходимости идентификации пользователя. Поэтому просим вас отнестись отвественно и ввести все данные корректно.<br><br>
            Правила для регистрации:<br><br>
            1) Имя  должно быть написано русскими буквами(буквы кириллицы).<br><br>
            2) Логин может содержать только английские маленькие буквы и  цифры.<br><br>
            3) логин должнен быть уникальным и в случае нахождения совпадения, нужно будет придумать новый логин или добавить дополнительные символы.<br><br>
            4) Длина логина не может быть больше 30 символов.<br><br>
            5) Пароль должен состоять от 6 до 50 символов.<br><br>
            6) Пароль может содержать только английские буквы, цифры и некоторые символы(!@#$%^&*_+=).<br><br>
            7) Для подтверждения пароля, пароль нужно будет ввести второй раз и они должны совпадать.<br><br>
            Примечание: Для того, чтобы судья получил доступ к определенной категории, нужно будет выбрать пункт 'Изменить категорию' в таблице судей.<br><br>
            </p>
        </div>
    </ARTICLE>
    <br><br>
<ARTICLE>
    <div class="between_content"><br><p class="content">Регистрация судьи</p><br></div>
    <div class="middle_content">
    <center>
    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
    <fieldset>
        <br>
        <label for="name">Имя судьи</label><br>
	     <input class="register" type="text" name="name" placeholder="Введите полное имя" required value="<?php if($error) echo $name; ?>" />
        <br><span class="error">
        <!-- If written information connected with name of judge is wrong, then will be shown error message-->
        <?php if (isset($name_error)) echo $name_error; ?> </span>
        
        <br><br>
        <label for="login">Логин</label><br>
	    <input class="register" type="text" name="login" placeholder="Введите логин" required value="<?php if($error) echo $loginname; ?>" />
        <br><span class="error">
        <?php if (isset($login_error)) echo $login_error; ?></span>
        <!-- If written information connected with login is wrong, then will be shown error message-->
        
	    <br><br>
        <label for="password">Пароль</label><br>
        <input class="register" type="password" name="password" placeholder="Пароль" required value="<?php if($error) echo $password; ?>" />
        <br><span class="error"> 
        <!-- If written information connected with password is wrong, then will be shown error message-->
        <?php if (isset($password_error)) echo $password_error; ?></span>
        
        <br><br>
        <label for="cpassword">Подтвердите пароль</label><br>
        <input class="register" type="password" name="cpassword" placeholder="Подтвердите пароль" required value="<?php if($error) echo $cpassword; ?>" />
        <br><span class="error">
        <!-- If re-password is not similar, then will be shown error message--> 
        <?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
        
        <br><br>
        <input class="register" type="submit" name="signup" value="Регистрация" />
        
	    <br><br>
	</fieldset>
	<!-- If the registration process is successful, then the success message will be shown -->
    <span class="success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
    <!-- If the registration process is failed, then the error message will be shown -->
    <span class="error"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>  
    <br><br>
    </form>
    <br><br>
    <a class="content" href="judges_control_admin.php"><div class='button'><br><p class='caption'>Обратно...</p><br></div></a><br><br>
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