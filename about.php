<?php
session_start();

$title = "About Us";
require "includes/header.php"
?>

<div class="wrapper">
    <div id="left-right">
        <article class="block0">
            <h2> Who We are? </h2>
            <p> Our club specializes in robotics. We teach our students mathematical-logical thinking, engineering
                design and programming skills.</p>
            <p> All Teachers have the qualifications of Computer Science, a Certificate of IELTS with 6.5 and higher
                score, knowledge of at least 2 programming languages.</p>
            <p> Chief Supervisor: Meirzhanov Marat Samatovich</p>
            <p> 3-fold owner of 1 place in the last few years of World Robot Olympiad. Winner of the 2nd place of the
                ICPC Team Olympiad</p>
        </article>
        <hr>
        <article class="block1">
            <h2> Facilities: </h2>
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
        </article>
        <hr>
    </div>
</div>

<?php
require "includes/footer.php"
?>
