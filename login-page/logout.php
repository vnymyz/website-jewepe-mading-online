<?php
session_start();
session_unset();
session_destroy();
header("Location: web/user/index.php"); // Redirect to homepage
exit();
?>
