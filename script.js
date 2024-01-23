// Function to add a patient
function addPatient() {
    var name = document.getElementById("patientName").value;
    var condition = document.getElementById("medicalCondition").value;

    // AJAX request to add patient to the database
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_patient.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Refresh the patient list after adding
            getPatients();
        }
    };
    console.log(name)
    console.log(condition)
    xhr.send("name=" + name + "&condition=" + condition);
}

// Function to get and display the list of patients
function getPatients() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_patients.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the patients list
            document.getElementById("patients").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Initial load of patients list
getPatients();
