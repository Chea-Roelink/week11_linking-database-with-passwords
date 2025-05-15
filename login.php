<?php
// Start the session to store user data
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (empty(trim($_POST['username']))) {
        $error = "Your username is required!";
    } else {
        $_SESSION['username'] = $_POST['username'];
        header("Location: welcome.php");
        exit();
    }
    if (empty(trim($_POST['password']))) {
        $error = "Your password is required!";
    } else {
        $_SESSION['password'] = $_POST['password'];
        header("Location: welcome.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Introduction to basic HTML elements">
    <meta name="keywords" content="HTML, Doctype, Head, Body, Meta, Paragraph, Headings, Strong, Emphasis">
    <meta name="author: " content="Chea Roelink">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <header>
        <h2>Webpages.inc - The Webpage - Log in</h2>
    </header>
    <form method="post" action="process.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="hidden" name="token" value="abc123">
        <input type="submit" name="Login">
    </form>
    <footer>
        <p id="footer-copyright">Copyright © 2025 Swinburne - All Rights reserved</p>
    </footer>
</body>