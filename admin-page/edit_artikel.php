<?php
include("../config/db_conn.php");

// Mengecek apakah ada parameter ID yang dikirim melalui URL
if (isset($_GET["id_artikel"])) {
    $id = $_GET["id_artikel"];

    // Query untuk mendapatkan data artikel berdasarkan ID
    $sql = "SELECT * FROM artikel WHERE id_artikel = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $judul = $row["judul"];
        $gambar = $row["gambar"];
        $isi = $row["isi"];
        $tgl = $row["tgl"];
    } else {
        // Artikel tidak ditemukan
        echo "Artikel not found.";
        exit();
    }
} else {
    // Parameter ID tidak ditemukan
    echo "Invalid request.";
    exit();
}

// Memproses form jika ada data yang dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judulBaru = $_POST["judul"];
    $gambarBaru = $_FILES["gambar"]["name"];
    $isiBaru = $_POST["isi"];
    $tglBaru = $_POST["tanggal"];

    // Memeriksa apakah ada file gambar yang diupload
    if (!empty($gambarBaru)) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($gambarBaru);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Memeriksa apakah file gambar valid
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Invalid image file.";
            exit();
        }

        // Memeriksa apakah file gambar sudah ada
        if (file_exists($targetFile)) {
            echo "File already exists.";
            exit();
        }

        // Memeriksa ukuran file gambar
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "File is too large.";
            exit();
        }

        // Memeriksa jenis file gambar yang diperbolehkan
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
            exit();
        }

        // Upload file gambar ke folder
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            // Hapus file gambar lama jika berhasil diupload yang baru
            if (!empty($gambar)) {
                unlink($targetDir . $gambar);
            }
        } else {
            echo "Error uploading image file.";
            exit();
        }
    } else {
        // Jika tidak ada file gambar yang diupload, gunakan gambar lama
        $gambarBaru = $gambar;
    }

    // Query untuk mengupdate data artikel
    $sql = "UPDATE artikel SET judul = '$judulBaru', gambar = '$gambarBaru', isi = '$isiBaru', tgl = '$tglBaru' WHERE id_artikel = '$id'";

    if ($conn->query($sql) === TRUE) {
        // Artikel berhasil diupdate
        header("Location: ../admin-page/admin.php?page=artikel");
        exit();
    } else {
        // Terjadi kesalahan saat mengupdate artikel
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
</head>
<body>
    <h1>Edit Artikel</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" value="<?php echo $judul; ?>"><br><br>

        <label for="gambar">Gambar:</label>
        <?php echo $gambar; ?><br>
        <input type="file" id="gambar" name="gambar"><br><br>

        <label for="isi">Isi:</label><br>
        <textarea id="isi" name="isi"><?php echo $isi; ?></textarea><br><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="<?php echo $tgl; ?>"><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
