<?php

$db = mysqli_connect("localhost", "root", "", "factory");

if($_GET['action']=="delete"){
    $del_img=$_GET['file_name'];
    $query = "DELETE FROM gallery WHERE image='$del_img'";
    $res = mysqli_query($db,$query);
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