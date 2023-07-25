<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = ''; // Ubah password sesuai dengan konfigurasi database Anda
$database = 'dblogin';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
