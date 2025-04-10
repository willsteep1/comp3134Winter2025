<?php
session_start();

$session_token = $_SESSION['confirmation'] ?? '';
$post_token = $_POST['confirmation'] ?? '';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($session_token && $post_token && $session_token === $post_token) {
    if ($username === 'host' && $password === 'pass') {
        echo "<div style='color: green;'>Login successful (valid session)!</div>";
    } else {
        echo "<div style='color: red;'>Invalid credentials.</div>";
    }
} else {
    echo "<div style='color: red;'>CSRF validation failed.</div>";
}
?>
