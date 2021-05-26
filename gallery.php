<?php
session_start();

$title = "RIG - Gallery";
require "includes/header.php";
require "database/connectDB.php";

?>

    <div class="wrapper">
        <div id="left-right">
            <div class="block0">
                <h2>Gallery</h2>
                <div id="content">
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM gallery");
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='card'>";
                        echo "<img id='image' src='src/gallery/" . $row['image'] . "' >";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php
require "includes/footer.php"
?>