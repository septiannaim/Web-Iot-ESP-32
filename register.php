<?php
require 'koneksi/koneksi.php';
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$status  = $_POST["status"];
$password = $_POST["password"];

$query_sql = "INSERT INTO user (fullname, username, status, password)
                VALUES ('$fullname', '$username', '$status', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("location: login.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}