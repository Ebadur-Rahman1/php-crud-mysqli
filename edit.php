<?php
require 'db_connection.php';
session_start();

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "User updated successfully!";
        $_SESSION['message_type'] = "alert-info";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
        $_SESSION['message_type'] = "alert-danger";
    }

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="" method="POST">
        <input type="text" name="name" value="<?= $user['name']; ?>" required>
        <input type="email" name="email" value="<?= $user['email']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
