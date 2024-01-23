<?php
$host = 'sql11.freemysqlhosting.net';
$port = '3306';
$service_name = 'sql11679096';
$username = 'sql11679096';
$password = 'YdfLiJdJpb';

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    error_log('wdws');
}

// Retrieve the list of patients
$sql = "SELECT id, name, medical_condition FROM patients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<li>ID: " . $row["id"] . " - Name: " . $row["name"] . " - Condition: " . $row["medical_condition"] . "</li>";
    }
} else {
    echo "<li>No patients found.</li>";
}

$conn->close();
?>
