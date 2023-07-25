<?php
// Include file konfigurasi database
include("../config/db_conn.php");

// Fungsi untuk menghindari serangan SQL Injection
function sanitizeInput($input)
{
    global $conn;
    return mysqli_real_escape_string($conn, $input);
}

// Tambah artikel
if (isset($_POST['add_artikel'])) {
    $judul = sanitizeInput($_POST['judul']);
    $gambar = sanitizeInput($_POST['gambar']);
    $isi = sanitizeInput($_POST['isi']);
    $tanggal = sanitizeInput($_POST['tgl']);

    // Query untuk menambahkan artikel ke database
    $sql = "INSERT INTO artikel (judul, gambar, isi, tgl) VALUES ('$judul', '$gambar', '$isi', '$tanggal')";
    if ($conn->query($sql) === true) {
        header("Location: artikel.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Edit artikel
if (isset($_POST['edit_artikel'])) {
    $id = sanitizeInput($_POST['id_artikel']);
    $judul = sanitizeInput($_POST['judul']);
    $gambar = sanitizeInput($_POST['gambar']);
    $isi = sanitizeInput($_POST['isi']);
    $tanggal = sanitizeInput($_POST['tgl']);

    // Query untuk mengedit artikel di database
    $sql = "UPDATE artikel SET judul='$judul', gambar='$gambar', isi='$isi', tgl='$tanggal' WHERE id=$id";
    if ($conn->query($sql) === true) {
        header("Location: artikel.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Hapus artikel
if (isset($_GET['delete_artikel'])) {
    $id = $_GET['delete_artikel'];

    // Query untuk menghapus artikel dari database
    $sql = "DELETE FROM artikel WHERE id_artikel=$id";
    if ($conn->query($sql) === true) {
        header("Location: artikel.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data artikel dari database
$sql = "SELECT * FROM artikel";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <!-- Tambahkan file CSS untuk tampilan -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Artikel</h2>
        <a href="admin.php?page=add_artikel" class="btn btn-primary mb-3">Tambah Artikel</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Jika terdapat data artikel
                if ($result->num_rows > 0) {
                    $no = 1;
                    // Tampilkan data artikel ke dalam tabel
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['judul'] . "</td>";
                        echo "<td> <img width='50%'src='../images/" .$row['gambar']. "'></td>";
                        echo "<td>" . $row['isi'] . "</td>";
                        echo "<td>" . $row['tgl'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit_artikel.php?id_artikel=" . $row['id_artikel'] . "' class='btn btn-sm btn-info'>Edit</a>";
                        echo "<a href='hapus_artikel.php?id_artikel=" . $row['id_artikel'] . "' class='btn btn-sm btn-danger'>Hapus</a>";
                        echo "<a href='admin.php?page=tampilan_artikel&id=" . $row['id_artikel'] . "' class='btn btn-sm btn-warning'>Lihat</a>";
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada artikel.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
