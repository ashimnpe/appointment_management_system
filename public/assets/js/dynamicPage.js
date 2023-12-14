function toggleFields() {
    var selectedType = document.getElementById("type").value;
    // Hide all form groups
    if (selectedType === "1") {
        document.getElementById("form1").style.display = "block";
        document.getElementById("form2").style.display = "none";
        document.getElementById("form3").style.display = "none";
    } else if (selectedType === "2") {
        document.getElementById("form2").style.display = "block";
        document.getElementById("form1").style.display = "none";
        document.getElementById("form3").style.display = "none";
    } else {
        document.getElementById("form3").style.display = "block";
        document.getElementById("form1").style.display = "none";
        document.getElementById("form2").style.display = "none";
    }
}
