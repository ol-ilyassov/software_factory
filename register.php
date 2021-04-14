<?php
//Resume existing session and helps to work with saved data of user
session_start();
//If session is completed, then the judge will be redirected to main page, if judge got the address to this page.
if(isset($_SESSION['judge_id'])) {
	header("Location: index.php");
}
//If session is completed, then the administrator will be redirected to main page, if administrator got the address to this page.
//Connect to database phpmyadmin by using php file
require_once('dbconnect.php');
$con = db_connect();

$queryaccess = sprintf("SELECT access FROM reg_control WHERE 	id=1");
$resultaccess  = mysqli_query($con, $queryaccess);
$accesstemp = mysqli_fetch_assoc($resultaccess);

if(($accesstemp['access']) == 0) {
	header("Location: index.php");
}

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $participant1name = mysqli_real_escape_string($con, $_POST['participant1name']);
    $participant1surname = mysqli_real_escape_string($con, $_POST['participant1surname']);
    $participant2name = mysqli_real_escape_string($con, $_POST['participant2name']);
    $participant2surname = mysqli_real_escape_string($con, $_POST['participant2surname']);
    $trainername = mysqli_real_escape_string($con, $_POST['trainername']);
    $trainersurname = mysqli_real_escape_string($con, $_POST['trainersurname']);
    $schoolname = mysqli_real_escape_string($con, $_POST['schoolname']);
    $locationname = mysqli_real_escape_string($con, $_POST['locationname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
	$teamname = mysqli_real_escape_string($con, $_POST['teamname']);

    
    //Clean Data from additional spaces
    $category = trim($category);
    $participant1name = trim($participant1name);
    $participant1surname = trim($participant1surname);
    $participant2name = trim($participant2name);
    $participant2surname = trim($participant2surname);
    $trainername = trim($trainername);
    $trainersurname = trim($trainersurname);
    $schoolname = trim($schoolname);
    $locationname = trim($locationname);
    $email = trim($email);
    $telephone = trim($telephone);
	$teamname = trim($teamname);

	
	//Choose category
    if ($category == "0") {
		 $error = true;
		 $category_error = "Выберите категорию для Соревнований!";
	}
    //Full name of participant 1 must consist from only in russian alphabet
    if (!preg_match('/^[а-яё \t]+$/iu',$participant1name)) {
		 $error = true;
		 $participant1name_error = "Имя первого участника должно состоять из букв кириллицы!";
	}
	//Full surname of participant 1 must consist from only in russian alphabet
    if (!preg_match('/^[а-яё \t]+$/iu',$participant1surname)) {
		 $error = true;
		 $participant1surname_error = "Фамилия первого участника должно состоять из букв кириллицы!";
	}
    //Full name of participant 2 must consist from only in russian alphabet
    if (!preg_match('/^[а-яё \t]+$/iu',$participant2name)) {
		 $error = true;
		 $participant2name_error = "Имя второго участника должно состоять из букв кириллицы!";
	}
	//Full surname of participant 2 must consist from only in russian alphabet
    if (!preg_match('/^[а-яё \t]+$/iu',$participant2surname)) {
		 $error = true;
		 $participant2surname_error = "Фамилия второго участника должно состоять из букв кириллицы!";
	}
    //Full name of trainer must consist from only in russian alphabet
    if (!preg_match('/^[а-яё \t]+$/iu',$trainername)) {
		 $error = true;
		 $trainername_error = "Имя тренера должно состоять из букв кириллицы!";
	}
	//Full surname of trainer must consist from only in russian alphabet
    if (!preg_match('/^[а-яё \t]+$/iu',$trainersurname)) {
		 $error = true;
		 $trainersurname_error = "Фамилия тренера должно состоять из букв кириллицы!";
	}
    //Check email for correctness
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		 $error = true;
		 $email_error = "Введите правильный адрес элетронной почты!";
	}
    //Telephone number must consist from 11 figures
    if(strlen($telephone) != 11) {
		 $error = true;
		 $telephone_error = "Номер телефона должен содержать 11 чисел!";
	}
    //First figure of telephone number should be 8
    if(!(substr($telephone, -11, 1) == "8")) {
		 $error = true;
		 $telephone_error = "Номер должен начинаться с числа 8!";
	}
    //Telephone number must consist from figures
	if((!preg_match('/^[0-9]*$/', $telephone))) {
		 $error = true;
		 $telephone_error = "Номер должен состоять только из чисел!";
	}
    //
    if (!preg_match('/^[а-яё \t]+$/iu',$locationname)) {
		 $error = true;
		 $locationname_error = "Название населенного пункта должно состоять из букв кириллицы!";
	}
    //Full team name should consist from only in latin alphabet or numbers
	if (!preg_match("/^[a-z0-9]+$/",$teamname)) {
		 $error = true;
		 $teamname_error = "Название команды может содержать только английские маленькие буквы и  цифры!";
	}
	//The length of teamname must be less than 30 symbols
	if(strlen($teamname) > 30) {
		 $error = true;
		 $telephone_error = "Длина названия команды не может быть больше 30 символов";
	}
    //Check full team name for similarity
    $query=mysqli_query($con, "SELECT teamname FROM teams WHERE teamname='".$teamname."'");
    $numrows=mysqli_num_rows($query);
    if($numrows != 0)
    {
		 $error = true;
		 $teamname_error = "Команда с таким названием уже существует!";
    }

    //Check correctness of given personal data. If all personal data are correct, then make the records into database and show success message. In another case, there will be error message on the page.
	if ($error) {
         $errormsg = "Ошибка в регистрации, проверьте правильность заполнения формы!";
    }
    else {
        if(mysqli_query($con, "INSERT INTO teams(participant1name, participant1surname, participant2name, participant2surname, trainername, trainersurname, schoolname, locationname, email, telephone, teamname) VALUES('" . $participant1name . "','" . $participant1surname . "','" . $participant2name . "','" . $participant2surname . "','" . $trainername . "','" . $trainersurname . "','" . $schoolname . "','" . $locationname . "','" . $email . "','" . $telephone . "','" . $teamname . "')")) {
            $idtemp = mysqli_insert_id($con);

            if ($category == "linefollower") {
                mysqli_query($con, "INSERT INTO linefollower_round1(id_team) VALUES('" . $idtemp . "')");
                mysqli_query($con, "INSERT INTO linefollower_round2(id_team) VALUES('" . $idtemp . "')");
                mysqli_query($con, "INSERT INTO linefollower_round3(id_team) VALUES('" . $idtemp . "')");
                mysqli_query($con, "INSERT INTO linefollower_final(id_team) VALUES('" . $idtemp . "')");
            };
            if ($category == "kegelring") {
                   mysqli_query($con, "INSERT INTO kegelring_round1(id_team) VALUES('" . $idtemp . "')");
                   mysqli_query($con, "INSERT INTO kegelring_round2(id_team) VALUES('" . $idtemp . "')");
                   mysqli_query($con, "INSERT INTO kegelring_round3(id_team) VALUES('" . $idtemp . "')");
                   mysqli_query($con, "INSERT INTO kegelring_final(id_team) VALUES('" . $idtemp . "')");
            }
			$successmsg = "Регистрация прошла успешно!";
        } 
        else $errormsg = "Ошибка в отправке форме, попробуйте позже!";
    }
}
?>

<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Регистрация Участников';
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
            Данная форма предназначена для проведения регистрации участников на соревнования.<br><br>
            Каждая команда в обязательном порядке должна пройти регистрацию для допуска к соревнованиям.<br><br>
            Личная информация может помочь в случае необходимости идентификации пользователя. Поэтому просим вас отнестись отвественно и ввести все данные корректно.<br><br>
            Правила для регистрации:<br><br>
            1) В обязательном порядке нужна выбрать категорию для участия в соревнованиях.<br><br>
            2) Имена, фамилия, название населенного пункта должны быть написаны на русском языке (буквы кириллицы).<br><br>
            3) Введенная электронная почта одного из участников должна быть подленная и действующая.<br><br>
            4) Введенный номер телефона одного из участников должен содержать 11 чисел и начинаться с числа 8.<br><br>
            5) Название команды может содержать только английские маленькие буквы и  цифры.<br><br>
            6) Название команды должно быть уникально и в случае нахождения совпадения, нужно будет придумать новое название или добавить дополнительные символы.<br><br>
            7) Длина названия команды не может быть больше 30 символов.<br><br>
            </p>
        </div>
    </ARTICLE>
    <br><br>
    <ARTICLE>
        <div class="between_content"><br><p class="content">Тех.Поддержка</p><br></div>
        <div class="middle_content">
            <p class="content">
            <br>
            В случае возникновения ошибок связанных с функционалом сайта, обращаться на почту: kanapov_k@kt.nis.edu.kz<br><br>
            </p>
        </div>
    </ARTICLE>
    <br><br>
        <div class="between_content"><br><p class="content">Регистрация</p><br></div>
        <div class="middle_content">
    <center>
    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
    <fieldset>
        <br>
        <label for="category">Категория для Соревнований</label><br>
        <select class="register" name="category" required value="<?php if($error) echo $category; ?>">
            <option value="0"></option>
            <option value="linefollower">Line Follower</option>
            <option value="kegelring">Kegelring</option>
        </select>
        <!-- If written information connected with category is wrong, then will be shown error message-->
        <br><span class="error"><?php if (isset($category_error)) echo $category_error; ?> </span>
        
        <br><br>
        <label for="participant1name">Имя участника 1</label><br>
	    <input class="register" type="text" name="participant1name" placeholder="Введите полное имя" required value="<?php if($error) echo $participant1name; ?>" />
        <br><span class="error">
        <!-- If written information connected with name of participant1 is wrong, then will be shown error message-->
        <?php if (isset($participant1name_error)) echo $participant1name_error; ?> </span>
    
        <br><br>
        <label for="participant1surname">Фамилия участника 1</label><br>
	    <input class="register" type="text" name="participant1surname" placeholder="Введите полную фамилию" required value="<?php if($error) echo $participant1surname; ?>" />
        <br><span class="error">
        <!-- If written information connected with surname of participant1 is wrong, then will be shown error message-->
        <?php if (isset($participant1surname_error)) echo $participant1surname_error; ?> </span>
    
        <br><br>
        <label for="participant2name">Имя участника 2</label><br>
	    <input class="register" type="text" name="participant2name" placeholder="Введите полное имя" required value="<?php if($error) echo $participant2name; ?>" />
        <br><span class="error">
        <!-- If written information connected with name of participant2 is wrong, then will be shown error message-->    
        <?php if (isset($participant2name_error)) echo $participant2name_error; ?> </span>
    
        <br><br>
        <label for="participant2surname">Фамилия участника 2</label><br>
	    <input class="register" type="text" name="participant2surname" placeholder="Введите полную фамилию" required value="<?php if($error) echo $participant2surname; ?>" />
        <br><span class="error">
        <!-- If written information connected with surname of participant2 is wrong, then will be shown error message-->    
        <?php if (isset($participant2surname_error)) echo $participant2surname_error; ?> </span>
        
        <br><br>
        <label for="trainername">Имя тренера</label><br>
	    <input class="register" type="text" name="trainername" placeholder="Введите полное имя" required value="<?php if($error) echo $trainername; ?>" />
        <br><span class="error">
        <!-- If written information connected with name of trainer is wrong, then will be shown error message-->    
        <?php if (isset($trainername_error)) echo $trainername_error; ?> </span>   
    
        <br><br>
        <label for="trainersurname">Фамилия тренера</label><br>
	    <input class="register" type="text" name="trainersurname" placeholder="Введите полную фамилию" required value="<?php if($error) echo $trainersurname; ?>" />
        <br><span class="error">
        <!-- If written information connected with surname of trainer is wrong, then will be shown error message-->    
        <?php if (isset($trainersurname_error)) echo $trainersurname_error; ?> </span>    
        
        <br><br>
        <label for="schoolname">Название школы (вашего клуба)</label><br>
	    <input class="register" type="text" name="schoolname" placeholder="Название школы" required value="<?php if($error) echo $schoolname; ?>" />
        <br><span class="error">
        <!-- If written information connected with name of school (club) is wrong, then will be shown error message-->    
        <?php if (isset($schoolname_error)) echo $schoolname_error; ?> </span>
        
        <br><br>
        <label for="locationname">Название Населенного пункта</label><br>
	    <input class="register" type="text" name="locationname" placeholder="Название населенного пункта" required value="<?php if($error) echo $locationname; ?>" />
        <br><span class="error">
        <!-- If written information connected with name of living place is wrong, then will be shown error message-->    
        <?php if (isset($locationname_error)) echo $locationname_error; ?> </span>        
        
        <br><br>
        <label for="email">Электронная почта</label><br>
        <input class="register" type="text" name="email" placeholder="Электронная почта" required value="<?php if($error) echo $email; ?>"  />
        <br><span class="error"> 
        <!-- If written information connected with email is wrong, then will be shown error message-->
        <?php if (isset($email_error)) echo $email_error; ?></span>

        <br><br>
        <label for="telephone">Номер мобильного телефона</label><br>
        <input class="register" type="text" name="telephone" placeholder="Номер мобильного телефона" required value="<?php if($error) echo $telephone; ?>"  />
        <br><span class="error"> 
        <!-- If written information connected with mobile number is wrong, then will be shown error message-->
        <?php if (isset($telephone_error)) echo $telephone_error; ?></span>    

        <br><br>
        <label for="teamname">Название Команды</label><br>
	    <input class="register" type="text" name="teamname" placeholder="Название команды" required value="<?php if($error) echo $teamname; ?>" />
        <br><span class="error">
        <?php if (isset($teamname_error)) echo $teamname_error; ?> </span>
        <!-- If written information connected with name team is wrong, then will be shown error message-->
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