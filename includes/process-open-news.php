<?php
session_start();

require_once 'dbh.php';

// NEWS PREVIEW
if (isset($_GET['newsId'])) {
    $_SESSION['newsId'] = $_GET['newsId'];
    
    header("Location: ../news-preview.php");
    exit();
} else {
    echo "Invalid or missing newsId.";
    exit();
}

