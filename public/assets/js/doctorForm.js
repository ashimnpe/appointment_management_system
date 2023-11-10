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
/* --------------------------------------------------------------------------------------------- */

/* ------------------------------New Row Field Creation ---------------------------------------- */
// add and remove row in education
document.addEventListener("DOMContentLoaded", function () {
    // add row field

        let count = 0;
        var limit = 3;
        var i=1;

        // var row = document.querySelector('.education-form');
        // var dateRow = row.querySelector('.bscompletion_date');
        // dateRow.id = `bscompletion_date_$asd`;
        // console.log(dateRow.id)
        document.getElementById("addEducation").addEventListener("click", function (e) {
            if(count < limit){
                const newRow = document.querySelector(".education-form").cloneNode(true);
                document.querySelector(".education-form").parentNode.appendChild(newRow);


                const inputFields = newRow.querySelectorAll("input");
                inputFields.forEach(function (input) {
                    input.value = "";
                });
                count++;
            }else{
                alert('count limit is 4')
            }
            });

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
    document.getElementById("addExperience").addEventListener("click", function () {
            const newRow = document.querySelector(".experience-form").cloneNode(true);
            document.querySelector(".experience-form").parentNode.appendChild(newRow);
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
/* --------------------------------------------------------------------------------------------- */

/* ----------------------------------Nepali-Date-Picker ---------------------------------------- */

// nepali date-picker
window.onload = function () {
    var mainInput = document.getElementById("nepali_date");
    mainInput.nepaliDatePicker();

    var nepaliDate = document.querySelector(".bscompletion_date");
    nepaliDate.nepaliDatePicker();
};

function bsToAd() {
    // date of birth
    var bsDate = document.getElementById("nepali_date").value;
    var englishdate = document.getElementById("english_date");
    var adDate = NepaliFunctions.BS2AD(bsDate);
    englishdate.value = adDate;
}


function dateConversion(newRow){
    // for(var i=0; i<newRow; i++){
        var bsDate = document.getElementById("bscompletion_date_").value;
        var englishdate = document.getElementById("adcompletion_date_");
        var adDate = NepaliFunctions.BS2AD(bsDate);
        englishdate.value = adDate;
    // }
}


setInterval(() => {
    bsToAd();
    dateConversion();
}, 30);

/* --------------------------------------------------------------------------------------------- */
