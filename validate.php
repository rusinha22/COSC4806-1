<?php
session_start();
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['username']) || !isset($_POST['password'])) {
header("Location: login.php");
exit;
}
$username = $_POST['username'];
$password = $_POST['password'];

$db = db_connection();
$stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['authenticated'] = true;
    $_SESSION['username'] = $username;
    header('Location: index.php');
} else {
    if (!isset($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = 1;
    } else {
        $_SESSION['failed_attempts']++;
    }

    echo "This is unsuccessful attempt number " . $_SESSION['failed_attempts'];
}
?>
