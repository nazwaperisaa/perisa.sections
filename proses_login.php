<?php
session_start();
include "koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];

if($email=="" || $password==""){
    $_SESSION['error'] = "Input tidak lengkap!";
    header("Location: login.php");
    exit;
}

$query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

if(!$data){
    $_SESSION['error'] = "Email tidak ditemukan, login gagal!";
    header("Location: login.php");
    exit;
}

if(!password_verify($password,$data['password'])){
    $_SESSION['error'] = "Password salah, login gagal!";
    header("Location: login.php");
    exit;
}

$_SESSION['user'] = $data;

$_SESSION['success'] = "Login berhasil!";
header("Location: Dashboard/dashboard.php");