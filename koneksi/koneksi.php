<?php
$servername = "localhost";
$database = "dashboard_iot";
$username = "root";
$password = "";

// cek koneksi

$conn = mysqli_connect($servername,$username, $password,$database);

if (!$conn) {
    die("Koneksi Gagal : " . mysqli_connect_error());
} else {
    echo "Koneksi Berhasil";
}