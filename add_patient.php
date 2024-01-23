<?php
$host = 'sql11.freemysqlhosting.net';
$port = '3306';
$service_name = 'sql11679096';
$username = 'sql11679096';
$password = 'YdfLiJdJpb';

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$name = $_POST["name"];
$condition = $_POST["condition"];

// Insert the patient into the database
$sql = "INSERT INTO patients (name, medical_condition) VALUES ('$name', '$condition')";
$conn->query($sql);

$conn->close();
?>
