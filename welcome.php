<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <body>
        <?php include 'header.inc'; ?>
        <?php if (isset($_SESSION["user"])) {
                echo"Welcome, " . $_SESSION["user"];
                } else {
                    header("Location: login.php");
                    exit();
                }
        ?>
        <?php include 'footer.inc'; ?>
    </body>
</html>