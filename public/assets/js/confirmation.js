function deleteConfirm(msg) {
    var del = confirm(`Are you sure want to ${msg} ?`);
    if (del) {
        return true;
    } else {
        return false;
    }
}

function editConfirm(msg) {
    var edit = confirm(`Are you sure want to ${msg} ?`);
    if (edit) {
        return true;
    } else {
        return false;
    }
}

selectImage.onchange = (evt) => {
    preview = document.getElementById("preview");
    preview.style.display = "block";
    const [file] = selectImage.files;
    if (file) {
        preview.src = URL.createObjectURL(file);
    }
};

// // nepali date-picker
// window.onload = function () {
//     var mainInput = document.getElementById("nepali_dob");
//     mainInput.nepaliDatePicker();

//     var dateInput = document.getElementById("completion_date");
//     dateInput.nepaliDatePicker();

// };

// function bsToAd() {
//     // date of birth
//     var bsDate = document.getElementById("nepali_dob").value;
//     var englishdate = document.getElementById("english_dob");
//     var adDate = NepaliFunctions.BS2AD(bsDate);
//     englishdate.value = adDate;

//     // completion date
//     var nep_date = document.getElementById("completion_date").value;
//     var eng_date = document.getElementById("adcompletion_date");
//     var adDatevalue = NepaliFunctions.BS2AD(nep_date);
//     eng_date.value = adDatevalue;
// }
// setInterval(() => {
//     bsToAd();
// }, 30);
