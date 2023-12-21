<?php

$host = 'localhost';
$dbUsername = 'id21045657_user';
$dbPassword = 'PrateekM@12112001';
$dbName = 'id21045657_webz';

// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
