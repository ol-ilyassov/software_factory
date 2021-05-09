<?php
session_start();

$title = "Gallery";
require "includes/gallery_upload.php";
require "includes/header.php";
?>
<div class="wrapper">
    <div id="content">

        <?php
        require "includes/gallery_display.php"
        ?>

        <form id="gallery_form" method="POST" action="gallery.php" enctype="multipart/form-data">
            <input type="hidden" name="size">
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Description of image..."
                          required></textarea>
            </div>
            <div>
                <button type="submit" name="upload">POST</button>
            </div>
        </form>
    </div>
</div>
<?php
require "includes/footer.php"
?>