<?php
session_start();
include "koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$password = $_POST['password'];

if($nama=="" || $email=="" || $no_hp=="" || $password==""){
    $_SESSION['error'] = "Semua field wajib diisi!";
    header("Location: register.php");
    exit;
}

$cek = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
if(mysqli_num_rows($cek)>0){
    $_SESSION['error'] = "Email sudah terdaftar!";
    header("Location: register.php");
    exit;
}

$hash = password_hash($password,PASSWORD_DEFAULT);

$query = mysqli_query($conn,"INSERT INTO users(nama,email,no_hp,password) 
VALUES('$nama','$email','$no_hp','$hash')");

if(!$query){
    die("Error query: " . mysqli_error($conn));
}

$_SESSION['success'] = "Daftar berhasil!";
header("Location: login.php");
exit;