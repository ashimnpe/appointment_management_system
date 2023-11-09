const departmentSelect = document.getElementById('department');
const doctorsGroup = document.getElementById('doctors-group');
const doctorSelect = document.getElementById('doctor');
const departments = {!! json_encode($departments) !!};

departmentSelect.addEventListener('change', () => {
    if (departmentSelect.value === '') {
        doctorsGroup.style.display = 'none';
        doctorSelect.innerHTML = '<option value="">Select a Doctor</option>'; // Reset the doctor select
    } else {
        doctorsGroup.style.display = 'block';

        // Get the selected department object
        const selectedDepartment = departments.find(department => department.id == departmentSelect.value);

        // Access the doctors through the 'doctors' relation on the department
        const selectedDoctors = selectedDepartment.doctors;

        // Populate the doctor select based on the selected department
        const doctorOptions = selectedDoctors.map(doctor => {
            return `<option value="${doctor.id}">${doctor.name}</option>`;
        });
        doctorSelect.innerHTML = '<option value="">Select a Doctor</option>' + doctorOptions.join('');
    }
});
