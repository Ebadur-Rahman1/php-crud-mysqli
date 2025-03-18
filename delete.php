<?php
require 'db_connection.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "User deleted successfully!";
        $_SESSION['message_type'] = "alert-warning";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
        $_SESSION['message_type'] = "alert-danger";
    }

    header("Location: index.php");
    exit;
}
?>
