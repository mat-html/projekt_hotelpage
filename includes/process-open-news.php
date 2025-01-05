<?php
session_start(); // Start the session

require_once 'dbh.php'; // Include database connection

// Check if the 'newsId' is set via GET
if (isset($_GET['newsId'])) {
    // Store the 'newsId' in the session (optional)
    $_SESSION['newsId'] = $_GET['newsId'];
    
    // Redirect to the preview page to display the news
    header("Location: ../news-preview.php");
    exit();
} else {
    echo "Invalid or missing newsId.";
    exit();
}

