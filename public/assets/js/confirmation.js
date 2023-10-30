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

// window.onload = function () {
//     var nep_dob = document.getElementById("nepali-datepicker");
//     nep_dob.nepaliDatePicker();
// };

// nepali date
window.onload = function () {
    year = NepaliFunctions.GetCurrentBsYear();
    month = NepaliFunctions.GetCurrentBsMonth();
    day = NepaliFunctions.GetCurrentBsDay();
    var currentdate = year + "-" + month + "-" + day;
    var nep_dob = document.getElementById("nepali-datepicker");
    nep_dob.nepaliDatePicker();
    console.log(currentdate);
};

setInterval(() => {
    getDate();
}, 10);

function getDate() {
    var nepali = document.getElementById("nepali-datepicker").value;
    converted = NepaliFunctions.BS2AD(nepali);

    var english = document.getElementById("english_dob");
    english.value = converted;
}
