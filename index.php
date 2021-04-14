<?php
//Resume existing session and helps to work with saved data of user
session_start();
?>
<HTML>
    <?php
    //Receive content of head block from head.php file
    $title = 'RIG - О Клубе';
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
         <div class="between_content"><br><p class="content">Добро Пожаловать на сайт клуба робототехники RIG</p><br></div>
         <div class="middle_content">
              <p class="content">
              <br>
              Занятия в клубе, приоткроют для Вашего ребенка интереснейший мир робототехники, мир фантазий, новых открытий, технологичный мир    будущего. Уже сейчас роботы окружают нас везде, и это только начало! <br><br>
              Кто знает, возможно, Ваш ребенок заинтересовавшись робототехникой или программированием, совершит революцию в роботостроении будущего! <br><br>
              </p>
         </div>
    </ARTICLE>
    <br><br>
    <ARTICLE>
         <div class="between_content"><br><p class="content">Участие клубов в Соревнованиях: Республиканский этап «WRO - 2017»</p><br></div>
         <div class="middle_content">
              <p class="content">
              <br>
              Клубы Робототехники является участниками ежегодных соревнований WRO-Kazakhstan, WRO, Roboland и других соревнований.
              Каждый год на World Robot Olympiad выбирается тема сезона, с которой связаны задания олимпиады. Тема 2017 года — «Sustainobots [Robots for Sustainability]» — «Роботы для устойчивого развития»).<br><br>
              Республиканский этап WRO - 2017 прошел в городе Астана на базе «EXPO - 2017». На данном этапе приняло участие более 200 команд со всех уголков Республики. Вдобавок пару команд стран СНГ приняли участие в младшей категории.<br><br>
              От нашего клуба приняли участие:<br><br>
              Старшая Основная категория: RIG_Senior - 3 место<br>
              Ильясов Олжас и Жусип Улана<br><br>
              Средняя Основная категория: RIG_Junior<br>
              Умурбеков Ильяс и Данияров Мансур<br><br>
              Младшая Основная категория: RIG_Elementary - 3 место<br>
              Музенбаев Чингиз и Кокорина Софья<br><br>
              Старшая Творческая категория: RIG_Nature<br>
              Сейткали Темирлан и Шаткенова Зариат<br><br>
              </p>
         </div>
    </ARTICLE>
    <br><br>
    <div class="between_content"><br><p class="content">Фотография команд клуба RIG в Республиканском этапе «WRO - 2017»</p><br></div>
    <div class="middle_content">
    <img class="top_image" align="middle" src="img/team.jpg">
    </div>
    <br><br><br><br><br>
    </div>
    <?php
    //Receive content of footer block from footer.php file
    include 'footer.php'; ?>
    </BODY>
</HTML>
