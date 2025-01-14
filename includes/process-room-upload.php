<?php

if (isset($_POST['upload'])) {
    // Get file details
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];
    $image_temp = $_FILES['image']['tmp_name'];
    
    // Get title and description
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    require_once 'dbh.php';
    
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

            $sql = "INSERT INTO room (roomName, roomDescription, roomPrice, roomImg) VALUES (?, ?, ?, ?)";
            
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $name, $description, $price, $target_file);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                
                header("location: ../admin/rooms.php");
            } else {
                header("location: ../admin/rooms.php");
            }
        } else {
            header("location: ../admin/rooms.php");
        }
    }
}