<!-- save_comment.php -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user input from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $content = $_POST['komentar'];

    // Create a new comment entry
    $comment = "$username|$email|$content\n";

    // Save the comment to a text file (e.g., comments.txt)
    file_put_contents('comments.txt', $comment, FILE_APPEND);
}

// Redirect back to the page after saving the comment
header('Location: komentar.php');
exit;
?>
