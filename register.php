<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters.";
        exit;
    }

    $db = db_connection();

    // Check if user exists
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        echo "Username already taken.";
        exit;
    }

    // Hash password
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $insert = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $insert->execute([$username, $hashed]);

    echo "Registration successful.";
}
?>
