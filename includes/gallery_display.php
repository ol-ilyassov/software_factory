<?php
  $result = mysqli_query($conn, "SELECT * FROM gallery");
while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img id='image' src='src/gallery/".$row['image']."' >";
      	echo "<p>".$row['description']."</p>";
        //if(isset($_SESSION['admin'])){
        echo "<a href='includes/gallery_delete.php?action=delete&file_name=".$row['image']."'>Delete</a>";
        //};
      echo "</div>";
    }
?>    