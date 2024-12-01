<?php

require_once 'dbh.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        
        // Handle image upload
        if (isset($_FILES['image'])) {
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            $uploadDir = 'uploads/';  // Directory where images will be saved
            $imagePath = $uploadDir . basename($imageName);

            // Move the uploaded image to the desired directory
            function upload($conn, $title, $description, $price, $image)
            {
                $sql = "INSERT INTO rooms (roomName, roomDescription, roomPrice, roomImg) VALUES (?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../sign_up.php?error=stmtfailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $price, $image);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("location: ../login.php?error=none");
                exit();
            }

        }
    }
?>
