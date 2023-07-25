<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komentar</title>
    <!-- Tambahkan file CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Komentar</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Komentar</th>
                    <th>Nama Komentar</th>
                    <th>Email Komentar</th>
                    <th>Isi Komentar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menghubungkan ke file konfigurasi database
                include("../config/db_conn.php");

                // Mengambil data komentar dari database
                $query = "SELECT * FROM komentar";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_komentar'] . "</td>";
                            echo "<td>" . $row['nama_komentar'] . "</td>";
                            echo "<td>" . $row['email_komentar'] . "</td>";
                            echo "<td>" . $row['isi_komentar'] . "</td>";
                            echo "<td><a href='hapus_komentar.php?id=" . $row['id_komentar'] . "' class='btn btn-danger'>Hapus</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada komentar yang ditemukan.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Terjadi kesalahan dalam mengambil data komentar.</td></tr>";
                }

                // Menutup koneksi database
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Tambahkan file JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
