$(document).ready(function () {
    $.post("php/regPageDisplay.php", {action: "onUpdate"},
        function (data) {
            if (data === "Closed") {
                window.location.href = "index.php";
            }
        }
    );
});