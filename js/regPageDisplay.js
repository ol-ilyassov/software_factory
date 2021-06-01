$(document).ready(function () {
    $.post("php/regPageDisplay.php", {action: "onUpdate"},
        function (data) {
            if (data === "Open") {
                $('#regPage').css("display", "block");
            } else if (data === "Closed") {
                $('#regPage').css("display", "none");
            } else {
                $('#regPage').css("display", "none");
            }
        }
    );
});
