<?php
//Resume existing session and helps to work with saved data of user
session_start();
?>
<HTML>
    <?php 
    //Receive content of head block from head.php file
    $title = 'RIG - Правила Line Follower';
    include 'head.php'; ?>
    <BODY>
    <div class='body'>  
    <?php 
    //Receive navigation for website from navigation.php file
    include 'navigation.php'; 
    //Receive header block content from header.php file
    include 'header_standart.php'; 
    ?>  
        
    <div class="between_content"><br><p class="content">Карта - Line Follower</p><br></div>
    <div class="middle_content">
    <img class="top_image" align="middle" src="img/linefollowermap.jpg">
    </div>
    <br><br><br>
    <ARTICLE>
         <div class="between_content"><br><p class="content">Основные правила категории</p><br></div>
         <div class="middle_content">
              <p class="content">
              <br>
              Название категории: Line Follower<br><br>
              Кол-во роботов от команды: 1<br><br>
              Максимальное время для попытки: 02:00 минуты<br><br>
              Размеры робота: 25cm x 25cm x 25cm<br><br>
              Управление роботом: Автономный (программирование)<br><br>
              Допустимые детали для сборки: «LEGO EV3 MINDSTORMS» или «LEGO NXT MINDSTORMS»<br><br>
              Основной принцип прохождения карты: Робот должен следовать по линии(цвет может варироваться) и выбирать специальные пути для начисления очков и пройти карту за наименьшее время.<br><br>
              Дополнительные правила: <br><br>
              1) Размеры робота: Каждый робот должен пройти проверку до карантина. Размеры роботы обязательно должны соответствовать заданных параметрам, иначе команда пропускает попытку.<br><br>
              2) Ограничение по времени: Робот должен набрать максимальное количество баллов за 2 минуты. По истечению 02:00 минут робот должен быть остановлен и команда получает баллы, которые были заработаны за отведенное время.<br><br>
              3) Автономное управление: Робот должен быть полностью автономным и двигаться по программе, которая была загружена до карантина. Если будет выявлено данное нарушение, то команда будет дисквалифицирована.<br><br>
              4) Во время прохождения карты, участникам запрещается касаться роботы и стола. Команда может получить возможность забрать робота лишь по разрешению судьи. <br><br>
              5) Карантин: По истечению времени для сборки и калибровки, робот должен быть сдан на проверку по размерам и отключен до начала попытки (раунда).<br><br> В случае если команда не успевает сдать робота на карантин, то команда пропускает попытку(раунд).<br><br> Если команда нарушает роботоспособность чужого робота, который находится на карантине, то эта команда будет дисквалифицирована.<br><br> Так же запрещается касаться своего робота, который находится на карантине. В этом случае команда пропускает попытку (раунд).<br><br>
              6) Плагиат: Командам запрещается копирование сборки других команд. Если будет выявлено данное нарушение, то будет проводится расследования и нарушевшая команда будет дисквалифицирована.<br><br>
              </p>
         </div>
    </ARTICLE>
    <br><br> 
    <div class="between_content"><br><p class="content">Карта - Line Follower (Обозначения)</p><br></div>
    <div class="middle_content">
    <img class="top_image" align="middle" src="img/linefollowermapred.jpg">
    </div>
    <br><br><br>
    <ARTICLE class="block_orange">
         <div class="between_content"><br><p class="content">Начисление баллов</p><br></div>
         <div class="middle_content">
              <p class="content">
              <br>
              Баллы начисляются в случае выполнения следующих инструкций:<br><br>
              Пункты: <br><br>
              (1) - одно из двух <br>
              <br> Проехать по извилистой линии = 5 баллов <br><br>
              Проехать по зебре с инверсией = 10 баллов <br><br>
              (2) <br>
              <br> Проехать по прямой линии с зеброй = 5 баллов <br><br>
              Дополнительные баллы за финиширование (+5 баллов) <br><br>
              (3) - одно из двух <br>
              <br> Проехать по прямой линии с инверсией = 5 баллов <br><br>
              Проехать по извилистой линии с прямыми углами = 10 баллов <br><br>
              </p>
         </div>
    </ARTICLE>
    <br><br><br><br>
    </div>
    
    <?php 
    //Receive content of footer block from footer.php file
    include 'footer.php'; ?>
    </BODY>
</HTML>