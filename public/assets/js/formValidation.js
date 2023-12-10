function infovalidation() {
    var license_no = document.getElementById("license_no").value;
    var first_name = document.getElementById("first_name").value;
    var last_name = document.getElementById("last_name").value;
    var department_id = document.getElementById("department_id").value;
    var specialization = document.getElementById("specialization").value;
    var nepali_dob = document.getElementById("nepali_date").value;
    var contact = document.getElementById("contact").value;

    var role = document.querySelector('input[name="role"]:checked');
    var gender = document.querySelector('input[name="gender"]:checked');

    var status = document.getElementById("status").value;
    var selectImage = document.getElementById("selectImage").value;
    var province = document.getElementById("province").value;
    var district = document.getElementById("district").value;
    var city = document.getElementById("city").value;
    var ward = document.getElementById("ward").value;
    var tole = document.getElementById("tole").value;
    var municipality = document.getElementById("municipality").value;

    if (
        license_no === "" ||
        first_name === "" ||
        last_name === "" ||
        department_id === "" ||
        specialization === "" ||
        nepali_dob === "" ||
        (role ===  null)  ||
        (gender === null) ||
        contact === "" ||
        status === "" ||
        selectImage === "" ||
        province === "" ||
        district === "" ||
        city === "" ||
        ward === "" ||
        tole === "" ||
        municipality === ""
    ) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Doctor Information Required!',
        });
        return false;
    } else {
        toggleFormOne();
        return true;
    }
}


function educationValidation() {
    var institution = document.getElementById("institution").value;
    var board = document.getElementById("board").value;
    var level = document.getElementById("level").value;
    var marks = document.getElementById("marks").value;
    var completion_date = document.querySelector(".completion_date_bs").value;
    if (
        institution === "" ||
        board === "" ||
        level === "" ||
        marks === "" ||
        completion_date === ""
    ) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Education Required!',
        });
        return false;
    } else {
        toggleFormTwo();
    }
}

function experienceValidation() {
    var organization_name = document.getElementById("organization_name").value;
    var position = document.getElementById("position").value;
    var start_date = document.querySelector(".start_date").value;
    var end_date = document.querySelector(".end_date").value;
    var job_description = document.getElementById("job_description").value;
    if (
        organization_name === "" ||
        position === "" ||
        start_date === "" ||
        end_date === "" ||
        job_description === ""
    ) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Experience Required!',
        });
        return false;
    }
        toggleFormThree();
}

function loginValidation(){
 var email = document.getElementById('email').value;
 var password = document.getElementById('password').value;
 var confirmpassword = document.getElementById('confirmpassword').value;

 if(email === '' || password === '' || confirmpassword === ''){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Credentials Required!',
    });
    return false;
 }else{
    return true;
 }
}
