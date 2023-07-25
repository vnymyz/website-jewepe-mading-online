<!-- get_comments.php -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!-- get_comments.php -->

<?php
$comments = file('comments.txt');
$comments = array_reverse($comments);

foreach ($comments as $comment) {
    $comment = trim($comment);

    // Skip empty lines
    if (empty($comment)) {
        continue;
    }

    $data = explode('|', $comment);

    // Ensure there are at least three elements (username, email, and content)
    if (count($data) >= 3) {
        $username = trim($data[0]);
        $email = trim($data[1]);
        $content = trim($data[2]);

        // Sanitize user input to prevent HTML/script injection
        $username = htmlspecialchars($username);
        $email = htmlspecialchars($email);
        $content = htmlspecialchars($content);

        echo '<div class="komentar">';
        echo '<div class="komentar-user">';
        echo '<h4 class="komentar-username">' . $username . '</h4>';
        echo '<span class="komentar-email">' . $email . '</span>';
        echo '</div>';
        echo '<p class="komentar-content">' . $content . '</p>';
        echo '</div>';
    } else {
        // Invalid comment format; handle or log the error here
        // For example, you can use error_log() to log the error:
        error_log("Invalid comment format: $comment");
    }
}
?>
