<?php
session_start();

$title = "RIG - About Us";
require "includes/header.php"
?>

<div class="wrapper">
    <div id="left-right">
        <div class="block0">
            <h2> Who We are? </h2>
            <p>
                Our club specializes in robotics.
                We teach our students mathematical-logical thinking, engineering
                design and programming skills.
            </p>
            <p>
                All Teachers have the qualifications of Computer Science,
                a Certificate of IELTS with 6.5 and higher
                score, knowledge of at least 2 programming languages.
            </p>
            <p> Chief Supervisor: Meirzhanov Marat Samatovich </p>
            <ul>
                <li>3-fold owner of 1st place in the last few years of World Robot Olympiad</li>
                <li>Winner of the 2nd place of the ICPC Team Olympiad</li>
            </ul>
            <div class="centerLock">
                <img id="aboutWePicture" src="/software_factory/src/stuff/we.jpg"
            </div>
        </div>

        <div class="block1">
            <h2> Competitions:</h2>
            <p>Our club also hosts annual and other competitions where anyone can take part.
                For the competition, participants are invited to our main building located in the city of Nur-Sultan.
                Applications for participation are accepted online on our website.
                Competitions are held in different disciplines.
            </p>
            <p>
                The main disciplines are "<u>Line Follower</u>" and "<u>Kegelring</u>"
            </p>
        </div>

        <div class="block2">
            <h2> Facilities: </h2>
            <p><img src="/software_factory/src/stuff/ev3.jpg" alt="EV3"
                    width="250" height="250" class="rightPicInText">
                The club has a good knowledge base and equipment for working with robots.
                The warehouses of our club are filled with a variety of Lego sets and other equipment.
                List of some equipment: </p>
            <ol>
                <li> LEGO NXT 2.0 Set - the official Lego designers, which is the second generation of designers using
                    motors, sensors and computing controllers.
                </li>
                <li>LEGO EV3 Mindstorm Set - the official Lego constructors that are used for international competitions
                    (WRO). They are the third generation of this type of designers.
                </li>
                <li>BIOLOID - a set from the Korean company, which includes small servos and independent modules. With
                    their help, robots of various designs can be assembled, for example wheeled or walking humanoid
                    robots.
                </li>
                <li>Arduino Uno - hardware and software for building simple automation and robotics systems, aimed at
                    non-professional users.
                </li>
            </ol>
        </div>
    </div>
</div>

<?php
require "includes/footer.php"
?>
