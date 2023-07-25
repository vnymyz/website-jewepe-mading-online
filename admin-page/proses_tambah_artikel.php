<?php
session_start();
include("../config/db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $gambar = $_FILES["gambar"]["name"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];
    $isi = $_POST["isi"];
    $tanggal = $_POST["tanggal"];

    // // Upload gambar
    // $upload_dir = "uploads/"; // Folder tujuan untuk menyimpan gambar
    // $target_file = $upload_dir . basename($gambar);
    // move_uploaded_file($gambar_tmp, $target_file);

    // Simpan data artikel ke database
    $sql = "INSERT INTO artikel (judul, gambar, isi, tgl) VALUES ('$judul', '$gambar', '$isi', '$tanggal')";
    if ($conn->query($sql) === TRUE) {
        // echo "Artikel berhasil ditambahkan.";
        header("Location: ../admin-page/admin.php?page=artikel");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
