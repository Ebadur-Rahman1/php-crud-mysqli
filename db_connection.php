<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php_crud_pdo";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
