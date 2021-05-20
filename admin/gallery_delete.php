<?php

require "../database/connectDB.php";

if($_GET['action']=="delete"){
    $del_img=$_GET['file_name'];
    $query = "DELETE FROM gallery WHERE image='$del_img'";
    $res = mysqli_query($conn,$query);
    if($res){
        ?>
        <script>
        alert("The image has been deleted");
        window.location.href='../gallery.php';
        </script>

    <?php
    unlink("../src/gallery/$del_img");    
    }
    else{
        ?>
        <script>
        alert("The image not yet delete");
        window.location.href='../gallery.php';
        </script>
        <?php
    }
}

?>