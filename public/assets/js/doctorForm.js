/* ------------------------------Toggle Forms---------------------------------------- */

// hide basic info and show education and vice-versa
function toggleFormOne() {
    var info = document.getElementById("basicinfo");
    var education = document.getElementById("education");
    if (info.style.display === "block") {
        info.style.display = "none";

        education.style.display = "block";
        experience.style.display = "none";
    } else {
        info.style.display = "block";
        education.style.display = "none";
    }
}

// hide education and show experience and vice-versa + form validation
function toggleFormTwo() {
    var education = document.getElementById("education");
    var experience = document.getElementById("experience");
    if (education.style.display === "block") {
        education.style.display = "none";
        experience.style.display = "block";
    } else {
        education.style.display = "block";
        experience.style.display = "none";
    }
}

// hide experience and show loginform and vice-versa
function toggleFormThree() {
    var experience = document.getElementById("experience");
    var doctorlogin = document.getElementById("doctorlogin");

    if (experience.style.display === "block") {
        experience.style.display = "none";

        doctorlogin.style.display = "block";
    } else {
        experience.style.display = "block";
        doctorlogin.style.display = "none";
    }
}
/* ------------------------------------------------------------------------------------------------------- */

/* ------------------------------New Education Row Field Creation ---------------------------------------- */
document.addEventListener("DOMContentLoaded", function () {
    const limit = 3;
    var count = 0;
    var i = 1;
    const oldRow = document.querySelector(".education-form");
    const oldRowDate = oldRow.querySelector(".completion_date_bs");
    oldRowDate.id = "completionDate_" + 1;

    function addEducation() {
        if (count < limit) {
            const originalRow = document.querySelector(".education-form");
            const newRow = originalRow.cloneNode(true);
            document.querySelector(".education-form").parentNode.appendChild(newRow);

            const optionField = newRow.querySelector("select");
            optionField.value = "";
            let isEmpty = false;

            const inputFields = newRow.querySelectorAll("input");
            inputFields.forEach(function (input) {
                input.value = "";
                isEmpty = true;
            });

            i++;
            var nepValue = newRow.querySelector(".completion_date_bs");
            nepValue.id = "completionDate_" + i;

            initDatePicker(newRow);
            function rowDateConversion(newRow) {
                var bsDate = newRow.querySelector(".completion_date_bs").value;
                var englishdate = newRow.querySelector(".completion_date_ad");
                var adDate = NepaliFunctions.BS2AD(bsDate);
                englishdate.value = adDate;
            }

            setInterval(() => {
                rowDateConversion(newRow);
            }, 30);

            attachEventListeners(newRow);
            count++;
        } else {
            alert("not more than 4");
        }
    }

        function attachEventListeners(row) {
            const removeButton = row.querySelector("#removeEducation");
            if (removeButton) {
                removeButton.addEventListener("click", function (e) {
                    const rowDelete = e.target.closest(".education-form");
                    if (rowDelete && document.querySelectorAll(".education-form").length > 1) {
                        rowDelete.parentNode.removeChild(rowDelete);
                        e.preventDefault();
                    }
                });
            }
        }

    document.getElementById("addEducation").addEventListener("click", addEducation);
    attachEventListeners(document.querySelector(".education-form"));
});
/* -------------------------------------------------------------------------------------------------------- */

/* ------------------------------New Experience Row Field Creation ---------------------------------------- */
document.addEventListener("DOMContentLoaded", function () {
    const limit = 4;
    var count = 0;
    var i = 1;

    const oldExperienceRow = document.querySelector(".experience-form");

    const startOldRow = oldExperienceRow.querySelector(".start_date");
    const endOldRow = oldExperienceRow.querySelector(".end_date");

    startOldRow.id = "start_date_" + 1;
    endOldRow.id = "end_date_" + 1;

    function addExperienceRow() {
        let isEmpty = false;

        if (isEmpty) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Education Required!",
            });
        }
        if (count < limit) {
            const originalRow = document.querySelector(".experience-form");
            const newRow = originalRow.cloneNode(true);
            document
                .querySelector(".experience-form")
                .parentNode.appendChild(newRow);

            i++;

            const textareaField = newRow.querySelector("textarea");
            textareaField.value = "";

            const inputFields = newRow.querySelectorAll("input");
            inputFields.forEach(function (input) {
                input.value = "";
                isEmpty = true;
            });

            var start_nepValue = newRow.querySelector(".start_date");
            var end_nepValue = newRow.querySelector(".end_date");

            start_nepValue.id = "start_date_" + i;
            end_nepValue.id = "end_date_" + i;

            initDatePicker1(newRow);
            function rowDateExpConversion(newRow) {
                var bsDate = newRow.querySelector(".start_date").value;
                var bsDate2 = newRow.querySelector(".end_date").value;
                var englishdate = newRow.querySelector(".start_date_ad");
                var englishdate2 = newRow.querySelector(".end_date_ad");
                var adDate = NepaliFunctions.BS2AD(bsDate);
                var adDate2 = NepaliFunctions.BS2AD(bsDate2);
                englishdate.value = adDate;
                englishdate2.value = adDate2;
            }

            setInterval(() => {
                rowDateExpConversion(newRow);
            }, 30);

            attachEventListeners(newRow, i);
            count++;
        } else {
            alert("not more than 5");
        }
    }

    function attachEventListeners(row) {
        const removeButton = row.querySelector(".removeExperience");
        if (removeButton) {
            removeButton.addEventListener("click", function (e) {
                const rowDelete = e.target.closest(".experience-form");
                if (
                    rowDelete &&
                    document.querySelectorAll(".experience-form").length > 1
                ) {
                    rowDelete.parentNode.removeChild(rowDelete);
                    e.preventDefault();
                }
            });
        }
    }
    document
        .getElementById("addExperience")
        .addEventListener("click", addExperienceRow);
    attachEventListeners(document.querySelector(".experience-form"));
});

/* --------------------------------------------------------------------------------------------- */

/* ----------------------------------Nepali-Date-Picker ---------------------------------------- */
// nepali date-picker
window.onload = function () {
    // dob picker
    var mainInput = document.getElementById("nepali_date");
    mainInput.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,
    });

    // education completion date picker
    var rowDate = document.querySelectorAll(".completion_date_bs");
    rowDate.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,
    });

    // experience start date picker
    var rowDate1 = document.querySelectorAll(".start_date");
    rowDate1.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,
    });

    // experience end date picker
    var rowDate2 = document.querySelectorAll(".end_date");
    rowDate2.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,
    });
};

// dob conversion
function bsToAd() {
    var bsDate = document.getElementById("nepali_date").value;
    var englishdate = document.getElementById("english_date");
    var adDate = NepaliFunctions.BS2AD(bsDate);
    englishdate.value = adDate;
}

// education completion date conversion
function RowbsToAd() {
    var bsDate = document.querySelector(".completion_date_bs").value;
    var englishdate = document.querySelector(".completion_date_ad");
    var adDate = NepaliFunctions.BS2AD(bsDate);
    englishdate.value = adDate;
}

// experience start and end date conversion
function ExpRowbsToAd() {
    var bsDate = document.querySelector(".start_date").value;
    var bsDate2 = document.querySelector(".end_date").value;
    var englishdate = document.querySelector(".start_date_ad");
    var englishdate2 = document.querySelector(".end_date_ad");
    var adDate = NepaliFunctions.BS2AD(bsDate);
    var adDate2 = NepaliFunctions.BS2AD(bsDate2);
    englishdate.value = adDate;
    englishdate2.value = adDate2;
}

// education date new row picker
function initDatePicker(newRow) {
    var newDateInput = newRow.querySelector(".completion_date_bs");
    newDateInput.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,
    });
}

// experience date new row picker

function initDatePicker1(newRow) {
    var newDateInput = newRow.querySelector(".start_date");
    newDateInput.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,
    });

    var newDateInput2 = newRow.querySelector(".end_date");
    newDateInput2.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 100,
    });
}

setInterval(() => {
    bsToAd();
    RowbsToAd();
    ExpRowbsToAd();
}, 30);

/* --------------------------------------------------------------------------------------------- */
