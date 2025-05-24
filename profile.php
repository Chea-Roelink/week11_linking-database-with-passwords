<?php
session_start();
$_SESSION["username"] = $_POST["username"];
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
require_once("settings.php");
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_username = trim($_POST['username']);
    $entered_password = trim($_POST['password']);
    $entered_email = trim($_POST['email']);

    $query = "SELECT * FROM users_info WHERE user_name = '$entered_username' AND password = '$entered_password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {

        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Username</th><th>Password</th><th>email</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        
    } else {
        // If login failed, store an error message and go back to the login page
        $_SESSION['error'] = "Invalid username or password. Please try again.";
        header('Location: login.php');
        exit;
    }

}
?>
<!DOCTYPE html>
<html>
    <body>
        <?php include 'header.inc'; ?>
        <label for="update">Update Information</label>
        <form method="post" action="update_profile.php">

            <label for="email">email:</label>
            <input type="text" name="email" required placeholder="enter new email"><br>

            <input type="hidden" name="token"value="abc123">
            <input type="submit" name="Update">
        </form>
        <?php include 'footer.inc'; ?>
    </body>
</html>

