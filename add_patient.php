<?php
$host = 'sql11.freemysqlhosting.net';
$port = '3306';
$service_name = 'sql11679096';
$username = 'sql11679096';
$password = 'YdfLiJdJpb';

// Remove Permissions-Policy header
header_remove("Permissions-Policy");

$conn = new mysqli($host, $username, $password, $service_name, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form (make sure to validate and sanitize user input)
$name = $conn->real_escape_string($_POST["name"]);
$condition = $conn->real_escape_string($_POST["condition"]);

// Insert the patient into the database using prepared statement to prevent SQL injection
$sql = "INSERT INTO patients (name, medical_condition) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $name, $condition);
    $stmt->execute();
    $stmt->close();

    echo "Patient data successfully stored in the database!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
