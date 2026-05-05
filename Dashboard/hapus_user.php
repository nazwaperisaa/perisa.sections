<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$id = $_POST['id'] ?? null;

if (!$id) {
    $_SESSION['error'] = "ID tidak valid!";
    header("Location: dashboard.php?page=users");
    exit;
}

if ($_SESSION['user']['id'] == $id) {
    $_SESSION['error'] = "Tidak bisa menghapus akun sendiri!";
    header("Location: dashboard.php?page=users");
    exit;
}

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['success'] = "User berhasil dihapus!";
} else {
    $_SESSION['error'] = "Gagal menghapus user!";
}

header("Location: dashboard.php?page=users");
exit;
