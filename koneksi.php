<?php
$conn = mysqli_connect("localhost","root","","perisa");

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>