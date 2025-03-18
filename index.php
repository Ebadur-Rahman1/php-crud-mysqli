<?php
require 'db_connection.php';
session_start();

// Fetch users from database
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD with MySQLi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">PHP CRUD Application (MySQLi)</h2>

    <!-- Alert Messages -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php endif; ?>

    <!-- Add User Form -->
    <form action="insert.php" method="POST" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="col-md-4">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Add User</button>
            </div>
        </div>
    </form>

    <!-- Users Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['created_at']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
