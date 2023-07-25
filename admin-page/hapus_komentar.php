<?php
// Menghubungkan ke file konfigurasi database
include("../config/db_conn.php");

// Memeriksa apakah parameter 'id' terkirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghapus komentar berdasarkan ID yang diberikan
    $query = "DELETE FROM komentar WHERE id_komentar = $id";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah penghapusan berhasil
    if ($result) {
        // Redirect kembali ke halaman komentar.php
        header('Location: ../admin-page/admin.php?page=komentar');
        exit();
    } else {
        echo "Terjadi kesalahan dalam menghapus komentar.";
    }
} else {
    echo "ID komentar tidak ditemukan.";
}

// Menutup koneksi database
mysqli_close($conn);
?>
