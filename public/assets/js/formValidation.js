function infovalidation() {
    var check = false;
    var license_no = document.getElementById("license_no").value;
    var first_name = document.getElementById("first_name").value;
    var middle_name = document.getElementById("middle_name").value;
    var last_name = document.getElementById("last_name").value;
    var department_id = document.getElementById("department_id").value;
    var specialization = document.getElementById("specialization").value;
    var nepali_dob = document.getElementById("nepali_dob").value;
    var contact = document.getElementById("contact").value;
    var role = document.getElementsByName("role").value;
    var gender = document.getElementsByName("gender");
    var status = document.getElementById("status").value;
    var selectImage = document.getElementById("selectImage").value;
    var province = document.getElementById("province").value;
    var district = document.getElementById("district").value;
    var city = document.getElementById("city").value;
    var ward = document.getElementById("ward").value;
    var tole = document.getElementById("tole").value;
    var municipality = document.getElementById("municipality").value;

    if (
        license_no == "" && first_name == "" && middle_name == "" && last_name == "" && department_id == "" && specialization == "" &&
        nepali_dob == "" &&
        role == "" &&
        gender == "" &&
        contact == "" &&
        status == "" &&
        selectImage == "" &&
        province == "" &&
        district == "" &&
        city == "" &&
        ward == "" &&
        tole == "" &&
        municipality == ""
    ) {
        check = true;
    } else {
        check = false;
    }
    for (var i = 0; i < gender.length; i++) {
        if (gender[i].checked) {
        }
        {
            check = true;
            break;
        }
    }
}

function educationValidation() {
    var institution = document.getElementById("institution").value;
    var board = document.getElementById("board").value;
    var level = document.getElementById("level").value;
    var marks = document.getElementById("marks").value;
    var completion_date = document.getElementById("completion_date").value;
    if (
        institution == "" &&
        board == "" &&
        level == "" &&
        marks == "" &&
        completion_date == ""
    ) {
        alert("education required");
    } else {
    }
}

function experienceValidation() {
    var organization_name = document.getElementById("organization_name").value;
    var position = document.getElementById("position").value;
    var start_date = document.getElementById("start_date").value;
    var end_date = document.getElementById("end_date").value;
    var job_description = document.getElementById("job_description").value;
    if (
        organization_name == "" &&
        position == "" &&
        start_date == "" &&
        end_date == "" &&
        job_description == ""
    ) {
        alert("experiennce required");
    }
}
