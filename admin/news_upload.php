<?php
include("header.php");
include("navbar.php");

?>
<form method="POST" action="news_upload.php" enctype="multipart/form-data">
    Select Image: <input type="file" name="image"><br>
    Title: <input type="text" name="title"><br>
    Description: <input type="text" name="description"><br>
    <input type="submit" name="upload" value="Upload Now">
</form>

<?php
if (isset($_POST['upload'])) {
    // Get file details
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];
    $image_temp = $_FILES['image']['tmp_name'];
    
    // Get title and description
    $title = $_POST['title'];
    $description = $_POST['description'];

    require_once '../includes/dbh.php'; // Include your DB connection
    
    // Define allowed file types
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $imageExtension = explode('.', $image_name);
    $imageExtension = strtolower(end($imageExtension));
    
    // Check if file type is allowed
    if (!in_array($image_type, $allowed_types)) {
        echo "Only JPEG, PNG, and GIF files are allowed.";
    }
    // Check if file size is less than 25MB
    elseif ($image_size > 25 * 1024 * 1024) {
        echo "File size should not exceed 25MB.";
    } else {
        // Define the target directory to save the uploaded image
        $target_dir = "uploads/";
        
        // Ensure the directory exists
        if (!is_dir("../" . $target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Define a unique filename for the uploaded image 
        $target_file = $target_dir . uniqid() . '.' . $imageExtension;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($image_temp, "../" . $target_file)) {
            // Get the current date and time
            $newsDate = date('Y-m-d H:i:s'); // Current date and time in 'YYYY-MM-DD HH:MM:SS' format

            // SQL to insert image name, title, description, and date into the database
            $sql = "INSERT INTO news (newsImg, newsTitle, newsDescription, newsDate) VALUES (?, ?, ?, ?)";
            
            // Prepare the statement
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $target_file, $title, $description, $newsDate);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                echo "Image uploaded and data saved successfully!";
            } else {
                echo "Error in SQL query!";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    }
}
?>
