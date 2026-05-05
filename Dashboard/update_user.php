<?php
session_start();
include "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$password = $_POST['password'];

if($nama=="" || $email=="" || $no_hp==""){
    $_SESSION['error'] = "Field tidak boleh kosong!";
    header("Location: dashboard.php?page=users");
    exit;
}

if(!empty($password)){
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET nama=?, email=?, no_hp=?, password=? WHERE id=?");
    $stmt->bind_param("ssssi",$nama,$email,$no_hp,$hash,$id);

}else{
    $stmt = $conn->prepare("UPDATE users SET nama=?, email=?, no_hp=? WHERE id=?");
    $stmt->bind_param("sssi",$nama,$email,$no_hp,$id);
}

$stmt->execute();

$_SESSION['success'] = "Data berhasil diupdate!";
header("Location: dashboard.php?page=users");
