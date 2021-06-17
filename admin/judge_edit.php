<?php
$title = "Judge Edit Page";
include "../includes/header.php";
include "../database/connectDB.php";
$id = $_REQUEST['id'];
$query = "SELECT * from judge where judge_id='" . $id . "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$status = "";
if (isset($_POST['new']) && $_POST['new'] == 1) {
    $id = $_REQUEST['id'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $description = $_REQUEST['description'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $update = "update judge set fname='" . $fname . "', lname='" . $lname . "',
description='" . $description . "', email='" . $email . "', password='" . $password . "'  
where judge_id='" . $id . "'";
    mysqli_query($conn, $update);
    header("Location: judgeControlPanel.php");
} else {
    ?>
    <div class="wrapper">
        <div id="left-right">
            <div class="block0">
                <h2>Update Judge Info.</h2>
                <form name="form" method="post" action="">
                    <input type="hidden" name="new" value="1"/>
                    <input name="id" type="hidden" value="<?php echo $row['judge_id']; ?>"/>
                    <div id="fnameDiv">
                        <label for="fname" class="label">First Name:</label>
                        <input id="fname" type="text" name="fname" placeholder="Enter First Name"
                               required value="<?php echo $row['fname']; ?>"/>
                    </div><br>
                    <div id="lnameDiv">
                        <label for="lname" class="label">Last Name:</label>
                        <input id="lname" type="text" name="lname" placeholder="Enter Last Name"
                               required value="<?php echo $row['lname']; ?>"/>
                    </div><br>
                    <div id="descriptionDiv">
                        <label for="description" class="label">Description:</label>
                        <input id="description" type="text" name="description" placeholder="Enter Description"
                               required value="<?php echo $row['description']; ?>"/>
                    </div><br>
                    <div id="emailDiv">
                        <label for="email" class="label">Email:</label>
                        <input id="email" type="text" name="email" placeholder="Enter Email"
                               required value="<?php echo $row['email']; ?>"/>
                    </div><br>
                    <div id="passwordDiv">
                        <label for="password" class="label">Password:</label>
                        <input id="password" type="text" name="password" placeholder="Enter Password"
                               required value="<?php echo $row['password']; ?>"/>
                    </div><br>
                    <div id="buttons">
                        <input class="btn" name="submit" type="submit" value="Update"/>
                        <a class="btnLink" href="control.php">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php };
include "../includes/footer.php";
?>