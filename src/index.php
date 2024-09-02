<?php

session_start();

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: views/login.php");
    exit;
}

// Include the desktop view if it exists
if (file_exists('views/desktop.php')) {
    include 'views/desktop.php';
} else {
    // Handle the error appropriately
    echo "Error: The desktop view is unavailable.";
}
