<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Unset the username session variable to log the user out
    unset($_SESSION['username']);
    session_destroy(); // Destroy the session

    // Redirect the user to the login page or any other desired page
    header("Location: login.php"); // You can change this to the appropriate page
    exit();
} else {
    // If the user is not logged in, simply redirect them to the login page
    header("Location: login.php");
    exit();
}
?>