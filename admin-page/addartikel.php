<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
</head>
<body>
    <h2>Tambah Artikel</h2>
    <form action="proses_tambah_artikel.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" required>
        </div>
        <div>
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" required>
        </div>
        <div>
            <label for="isi">Isi:</label>
            <textarea id="isi" name="isi" rows="4" required></textarea>
        </div>
        <div>
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>
        </div>
        <div>
            <button type="submit">Tambah Artikel</button>
        </div>
    </form>
</body>
</html>
