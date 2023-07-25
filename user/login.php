<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css-login/formlogin.css">
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
          <a href="login.php">Login Admin</a>
        </div>
      </header>

      <div class="container">
        <div class="content">
        <div class="login-form">
          <h2>Login Admin</h2>
          <form action="../login-page/login_process.php" method="POST">
            <input type="text" name="user_name" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Login</button>
          </form>
        </div>
      </div>
      </div>
      
      <!-- footer icon -->
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