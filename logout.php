<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    // Unset and destroy the session
    session_unset();
    session_destroy();
}

// Redirect the user to the login page
header("Location: login.php");
exit();
?>
