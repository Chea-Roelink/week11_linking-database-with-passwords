<?php
session_start();
require_once("settings.php");

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
  $username = $_SESSION["username"];
  $new_email = mysqli_real_escape_string($conn, $_POST["email"]);
  $query = "UPDATE users_info SET email = '$new_email' WHERE user_name = '$username'";
  if (mysqli_query($conn, $query)) {
    header("Location: profile.php");
    exit;
  } else {
    echo "<p style='color:red; text-align:center;'>❌ Error updating email.</p>";
  }
} else {
  echo "<p style='color:red; text-align:center;'>Error .</p>";
}

mysqli_close($conn);
?>