<?php
include("include()/navbar.php");

require("includes/dbh.php"); // Include database connection

// Check if 'newsId' is available in the session or URL
if (isset($_SESSION['newsId'])) {
    $newsId = $_SESSION['newsId'];
} elseif (isset($_GET['newsId'])) {
    $newsId = $_GET['newsId'];
} else {
    echo "Invalid or missing newsId.";
    exit();
}

// Fetch news by 'newsId' from the database
$sql = "SELECT * FROM news WHERE newsId = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $newsId); // 'i' for integer
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // If the news item is found
    if (mysqli_num_rows($result) > 0) {
        $news = mysqli_fetch_assoc($result);
    } else {
        echo "News not found!";
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Database query failed.";
    exit();
}


?>

<div class="container mt-5">
    <h1><?php echo $news['newsTitle']; ?></h1>
    <p><small><?php echo date("F j, Y, g:i a", strtotime($news['newsDate'])); ?></small></p>
    <div class="container">
        <img src="<?php echo $news['newsImg']; ?>" alt="<?php echo $news['newsTitle']; ?>" style="max-width: 100%; height: auto;">
    </div>
    <div>
        <p><?php echo nl2br($news['newsDescription']); ?></p>
    </div>
    <a href="news.php" class="btn btn-nav btn-outline mt-3">Back to News</a>
</div>

<?php include("include()/footer.php"); ?>
