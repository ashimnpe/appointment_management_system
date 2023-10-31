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
window.onload = function() {

    var elm = document.getElementById("nepali-datepicker");

    elm.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 10,

    });
 };

 function bsToAd() {
  var bsDate = document.getElementById("nepali-datepicker").value;
  var englishdate = document.getElementById("english_dob");
console.log( bsDate)
var adDate = NepaliFunctions.BS2AD(bsDate)

englishdate.value = adDate
}
setInterval(() => {
bsToAd()
}, 30);
