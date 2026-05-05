<?php
session_start();
include "../koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$password = $_POST['password'];

if($nama=="" || $email=="" || $no_hp=="" || $password==""){
    $_SESSION['error'] = "Semua field wajib diisi!";
    header("Location: dashboard.php?page=users");
    exit;
}
$cek = $conn->prepare("SELECT id FROM users WHERE email=?");
$cek->bind_param("s",$email);
$cek->execute();
$result = $cek->get_result();

if($result->num_rows > 0){
    $_SESSION['error'] = "Email sudah terdaftar!";
    header("Location: dashboard.php?page=users");
    exit;
}
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users(nama,email,no_hp,password) VALUES(?,?,?,?)");
$stmt->bind_param("ssss",$nama,$email,$no_hp,$hash);
$stmt->execute();

$_SESSION['success'] = "User berhasil ditambahkan!";
header("Location: dashboard.php?page=users");
