<?php
session_start();

$title = "Gallery";
require "gallery_upload.php";
require "../includes/header.php";
?>
<div class="wrapper">
    <div id="content">

        <?php
        require "gallery_display.php";
        ?>
    </div>
    <?php
        if(isset($_SESSION['role'])=="admin"){
        ?>
        <form id="gallery_form" method="POST" action="gallery.php" enctype="multipart/form-data">
            <input type="hidden" name="size">
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Description of image..." style="max-width: 300px; max-height: 100px; min-width: 270px; min-height: 65px" required></textarea>
            </div>
            <div>
                <button type="submit" name="upload">POST</button>
            </div>
        </form>
        <?php
            }
            ?>
    </div>
</div>
<?php
require "../includes/footer.php"
?>