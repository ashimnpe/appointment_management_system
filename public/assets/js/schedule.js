/// add and remove row in schedule
document.addEventListener("DOMContentLoaded", function () {
    // add row field
    document.getElementById("addTime").addEventListener("click", function () {
            const newRow = document.querySelector(".time-form").cloneNode(true);
            document.querySelector(".time-form").parentNode.appendChild(newRow);
            const inputFields = newRow.querySelectorAll("input");
            inputFields.forEach(function (input) {
                input.value = "";
            });
        });

    // delete row field
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("removeTime")) {
            const rowDelete = e.target.closest(".time-form");
            if (document.querySelectorAll(".time-form").length > 1) {
                rowDelete.parentNode.removeChild(rowDelete);
                e.preventDefault();
            }
        }
});
});
/* --------------------------------------------------------------------------------------------- */
