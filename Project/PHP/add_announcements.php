<?php
include __DIR__ . "/../DB/db.php";

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../admin_announcements.php");
    exit;
}

$title = trim($_POST['title']);
$message = trim($_POST['message']);
$expires_at = $_POST['expires_at'];

if (empty($title) || empty($message) || empty($expires_at)) {
    header("Location: ../admin_announcements.php");
    exit;
}

$sql = "INSERT INTO announcements (title, message, expires_at)
        VALUES ('$title', '$message', '$expires_at')";

$conn->query($sql);

header("Location: ../admin_announcements.php");
exit;
