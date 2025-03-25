<?php
$host = 'localhost';
$user = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$database = 'zoo_management';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
