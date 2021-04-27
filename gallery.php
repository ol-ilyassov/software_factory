<?php
session_start();

$title = "Gallery";
include "includes/upload.php";
include "includes/header.php";
?>

<div id="content">

  <?php
    include "includes/display.php"
  ?>

  <form id="gallery_form" method="POST" action="gallery.php" enctype="multipart/form-data">
  	<input type="hidden" name="size">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Description of image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>

<?php
include "includes/footer.php"
?>