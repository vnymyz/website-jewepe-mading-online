<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Jewepe - Mading Online</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/mading.css" />
    <!-- File CSS untuk mading -->
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

      <div class="mading-container">
        <div class="mading">
          <h3 class="mading-title">Mading Online</h3>
          <!-- search mading -->
          <div class="search-container">
            <input
              type="text"
              id="search-input"
              placeholder="Cari postingan..."
            />
            <button id="search-button"><i class="fas fa-search"></i></button>
          </div>


                <?php
        // Melakukan koneksi ke database
        include("../config/db_conn.php");

        // Query untuk mengambil data artikel
        $query = "SELECT * FROM artikel";
        $result = mysqli_query($conn, $query);
        ?>
        
       <div class="mading-posts">
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="post">';
            echo '<h4 class="post-title">' . $row['judul'] . '</h4>';
            echo '<img src="../images/' . $row['gambar'] . '" alt="' . $row['judul'] . '" class="post-image" />';
            echo '<p class="post-content">' . $row['isi'] . '</p>';
            echo '<span class="post-date">Posted on ' . $row['tgl'] . '</span>';
            echo '</div>';
          }
          ?>
        </div>


        </div>
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
