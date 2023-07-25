<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Jewepe - Komentar</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../css/komentar.css" />
    <!-- File CSS untuk komentar -->
</head>
  <body>
    <section>
      <header>
        <h2><a href="#" class="logo">jewepe</a></h2>
        <div class="navigation">
           <a href="index.php">Beranda</a>
          <a href="tentang.php">Tentang Kita</a>
          <a href="mading.php">Mading</a>
          <a href="komentar.php">Komentar</a>
          <a href="login.php">Login</a>
        </div>
      </header>

      <div class="komentar-container">
        <h3 class="komentar-title">Komentar</h3>
        <div class="komentar-list">
           <?php 
           include('get_comments.php'); 
           ?>
        </div>
        <!-- form -->
       
        <div class="komentar-form">
          <h3 class="form-title">Beri Komentar</h3>
          <form action="save_comment.php" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Nama</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
            </div>
            <div class="mb-3">
              <label for="komentar" class="form-label">Isi Komentar</label>
              <textarea class="form-control" id="komentar" name="komentar" rows="4" placeholder="Comment" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
          </form>
        </div>

      <!-- footer -->
      <footer>
        <div class="footer-container">
          <div class="media-icons">
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#"><i class="fa-brands fa-discord"></i></a>
          </div>
          <p>&copy; 2023 Web Jewepe. All rights reserved.</p>
        </div>
      </footer>
    </section>
  </body>
</html>
