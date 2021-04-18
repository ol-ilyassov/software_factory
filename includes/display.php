<?php
while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img id='image' src='src/gallery/".$row['image']."' >";
      	echo "<p>".$row['description']."</p>";
      echo "</div>";
    }
?>    