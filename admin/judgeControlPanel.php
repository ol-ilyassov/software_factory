<?php
session_start();

$title = "Judge Control Panel";
include "../database/connectDB.php";
include "../includes/header.php";
?>
    <div class="wrapper">
        <div id="left-right">

            <div class="block0">
                <h2>Judges: </h2>
                <?php include "judge_display.php"; ?>
            </div>
            <br><br>
            <hr>
            <div class="block1">
                <form id="gallery_form" name="form" method="post" action="judge_register.php">
                    <input type="hidden" name="new" value="1"/>
                    <h2>Judge Registration Form</h2><br>
                    <div>
                        <label class="label" for="fname">First Name: </label>
                        <input id="fname" type="text" name="fname" placeholder="Enter First Name" required/>
                    </div>
                    <br>
                    <div>
                        <label class="label" for="lname">Last Name: </label>
                        <input id="lname" type="text" name="lname" placeholder="Enter Last Name" required/>
                    </div>
                    <br>
                    <div>
                        <label class="label" for="description">Description: </label>
                        <input id="description" type="text" name="description" placeholder="Enter Description"
                               required/>
                    </div>
                    <br>
                    <div>
                        <label class="label" for="email">Email: </label>
                        <input id="email" type="text" name="email" placeholder="Enter Email" required/>
                    </div>
                    <br>
                    <div>
                        <label class="label" for="category">Category: </label>
                        <select id="category" name="judgeCategory">
                            <option value="-"></option>
                            <option value="Line Follower">Line Follower</option>
                            <option value="Kegelring">Kegelring</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label class="label" for="password">Password: </label>
                        <input id="password" type="text" name="password" placeholder="Enter Password" required/><br>
                        <div id="buttons">
                            <input class="btn" name="submit" type="submit" value="Submit"/>
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php
include "../includes/footer.php"
?>