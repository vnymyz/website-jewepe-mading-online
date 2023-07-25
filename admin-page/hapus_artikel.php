<?php
include("../config/db_conn.php");

// Mengecek apakah ada data yang dikirim melalui metode POST
    if (isset($_GET['id_artikel'])) {
    // Mendapatkan ID artikel yang akan dihapus
    $id = $_GET["id_artikel"];

    // Query untuk menghapus artikel dari tabel
    $sql = "DELETE FROM artikel WHERE id_artikel = '$id'";

    if ($conn->query($sql) === TRUE) {
        // Artikel berhasil dihapus
        header("Location: ../admin-page/admin.php?page=artikel");
        exit();
    } else {
        // Terjadi kesalahan saat menghapus artikel
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
