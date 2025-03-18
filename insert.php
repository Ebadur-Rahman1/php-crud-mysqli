<?php
require 'db_connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "User added successfully!";
        $_SESSION['message_type'] = "alert-success";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
        $_SESSION['message_type'] = "alert-danger";
    }

    header("Location: index.php");
    exit;
}
?>
