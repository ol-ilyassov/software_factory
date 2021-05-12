
$(document).ready(function () {
    const registerAccessBtn = $('#registerAccessBtn');
    const registerPageStatus = $('#registerPageStatus');

    $.post("/software_factory/php/regPageAccess.php", {
        signal: "registerAccess",
        action: "GET"
    }, function (data) {
        if (data === "Open" || data === "Closed") {
            registerPageStatus.text("Open");
        } else {
            registerPageStatus.text("Error");
        }
    });

    registerAccessBtn.on('click', function () {
        $.post("/software_factory/php/regPageAccess.php", {
            signal: "registerAccess",
            action: "GET"
        }, function (data) {
            if (data === "Open") {
                setRegisterAccessStatus("Closed");
                registerPageStatus.text("Closed");
            } else if (data === "Closed") {
                setRegisterAccessStatus("Open");
                registerPageStatus.text("Open");
            } else {
                registerPageStatus.text("Error");
            }
        });
    });

    function setRegisterAccessStatus(input) {
        $.post("/software_factory/php/regPageAccess.php", {
            signal: "registerAccess",
            action: "SET",
            value: input
        }, function (data) {
            if (data !== "1") {
                alert("Error:" + data);
            }
        });
    }
});