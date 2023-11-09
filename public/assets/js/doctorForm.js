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

// add and remove row in education
document.addEventListener("DOMContentLoaded", function () {
    // add row field
    if (document.getElementById("addEducation")) {
        document
            .getElementById("addEducation")
            .addEventListener("click", function (e) {
                const newRow = document.querySelector(".education-form").cloneNode(true);
                document.querySelector(".education-form").parentNode.appendChild(newRow);

                const dateSelect = newRow.querySelectorAll(".bscompletion_date");

                dateSelect.forEach(function(inputDate){
                    inputDate.nepaliDatePicker();
                });

                bsToAd();

                const inputFields = newRow.querySelectorAll("input");
                inputFields.forEach(function (input) {
                    input.value = "";
                });
            });
    }

    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("removeEducation")) {
            const rowDelete = e.target.closest(".education-form");
            if (document.querySelectorAll(".education-form").length > 1) {
                rowDelete.parentNode.removeChild(rowDelete);
                console.log("delete");
                e.preventDefault();
            }
        }
    });
});

/// add and remove row in education
document.addEventListener("DOMContentLoaded", function () {
    // add row field
    document
        .getElementById("addExperience")
        .addEventListener("click", function () {
            const newRow = document
                .querySelector(".experience-form")
                .cloneNode(true);
            document
                .querySelector(".experience-form")
                .parentNode.appendChild(newRow);
            const inputFields = newRow.querySelectorAll("input");
            inputFields.forEach(function (input) {
                input.value = "";
            });
        });

    // delete row field
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("removeExperience")) {
            const rowDelete = e.target.closest(".experience-form");
            if (document.querySelectorAll(".experience-form").length > 1) {
                rowDelete.parentNode.removeChild(rowDelete);
                console.log("delete");
                e.preventDefault();
            }
        }
    });
});

// nepali date-picker
window.onload = function () {
    var mainInput = document.getElementById("nepali_date");
    mainInput.nepaliDatePicker();

    // const dateInputs = document.querySelectorAll(".bscompletion_date");
    // dateInputs.forEach(function (dateInput) {
    //     dateInput.nepaliDatePicker();
    // });
    const dateInputs = document.getElementById("bscompletion_date");
    dateInputs.nepaliDatePicker();
    // dateInputs1.nepaliDatePicker();
};

function bsToAd() {
    // date of birth
    var bsDate = document.getElementById("nepali_date").value;
    var englishdate = document.getElementById("english_date");
    var adDate = NepaliFunctions.BS2AD(bsDate);
    englishdate.value = adDate;

    // completion date
    // const bscompletion_date = document.querySelectorAll(".bscompletion_date");

    // bscompletion_date.forEach(function (nep_date) {
    //     var eng_date = document.getElementById(`adcompletion_date_[]`);
    //     if (eng_date) {
    //         var valueDate = nep_date.value;
    //         var dateConversion = NepaliFunctions.BS2AD(valueDate);
    //         eng_date.value = dateConversion;
    //         console.log(eng_date.value)
    //     }
    //     // index++;
    //     // console.log(index)

    // });

    var nep_date = document.getElementById("bscompletion_date").value;
    var eng_date = document.getElementById("adcompletion_date");
    var adDatevalue = NepaliFunctions.BS2AD(nep_date);
    eng_date.value = adDatevalue;
}
setInterval(() => {
    bsToAd(this);
}, 30);
