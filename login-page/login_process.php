<?php
include("../config/db_conn.php");
session_start();

// Login process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user_name"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_fetch_object($result);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $result;
        echo '<script>window.location="../admin-page/admin.php"</script>';
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

$conn->close();
?>
