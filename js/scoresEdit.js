
function pregMatchNumbers(input) {
    const regExp = /^[0-9]*$/;
    return regExp.test(input);
}

$(document).ready(function () {
    const btnSave = $('#btnSave');
    const task1 = $('#task1');
    const task1Error = $('#task1Error');
    const task2 = $('#task2');
    const task2Error = $('#task2Error');
    const task3 = $('#task3');
    const task3Error = $('#task3Error');
    const time = $('#time');
    const timeError = $('#timeError');

    let error = false;

    task1.on('input', function () {
        task1Error.text("");
        let value = task1.val();
        error = false;

        if (value === "") {
            error = true;
        } else if (!pregMatchNumbers(value)) {
            task1Error.text("- Invalid characters used -");
            error = true;
        } else if (value < 0 || value > 10) {
            task1Error.text("- Value boundaries violated -");
            error = true;
        }
        checkButton()
    });
    task2.on('input', function () {
        task2Error.text("");
        let value = task2.val();
        error = false;

        if (value === "") {
            error = true;
        } else if (!pregMatchNumbers(value)) {
            task2Error.text("- Invalid characters used -");
            error = true;
        } else if (value < 0 || value > 10) {
            task2Error.text("- Value boundaries violated -");
            error = true;
        }
        checkButton()
    });
    task3.on('input', function () {
        task3Error.text("");
        let value = task3.val();
        error = false;

        if (value === "") {
            error = true;
        } else if (!pregMatchNumbers(value)) {
            task3Error.text("- Invalid characters used -");
            error = true;
        } else if (value < 0 || value > 10) {
            task3Error.text("- Value boundaries violated -");
            error = true;
        }
        checkButton()
    });
    time.on('input', function () {
        timeError.text("");
        let value = time.val();
        error = false;

        if (value > "00:02:00") {
            timeError.text("- Value boundaries violated -");
            error = true;
        }
        checkButton()
    });

    function checkButton() {
        if (error === false) {
            btnSave.prop("disabled", false);
        } else {
            btnSave.prop("disabled", true);
        }
    }
});