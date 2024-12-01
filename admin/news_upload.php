<?php
    include("header.php");
    include("navbar.php");
?>
<form method="POST" action="news_upload.php" enctype="multipart/form-data">
    Select Image: <input type="file" name="image"><br>
    Caption: <input type="text" name="caption"><br>
    <input type="submit" name="upload" value="Upload Now">
</form>

<?php
    if(isset($_POST['upload'])){
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];
        $image_temp = $_FILES['image']['tmp_name'];
        $caption = $_POST['caption'];

         // Define allowed file types
         $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

         // Check if file type is allowed
         if (!in_array($image_type, $allowed_types)) {
             echo "Only JPEG, PNG, and GIF files are allowed.";
         } 
         // Check if the file size is less than 5MB (5 * 1024 * 1024)
         elseif ($image_size > 25 * 1024 * 1024) {
             echo "File size should not exceed 5MB.";
         } 
         else {
             // Define the target directory to save the uploaded image
             $target_dir = "../uploads/";
             $target_file = $target_dir . basename($image_name);
 
             // Move the uploaded file to the target directory
             if (move_uploaded_file($image_temp, $target_file)) {
                 echo "Image uploaded successfully!";
 
                 // Save the caption into a text file
                 $caption_file = 'captions.txt'; // Text file to save captions
 
                 // Append the caption and image filename to the text file
                 $entry = "Image: " . $image_name . " | Caption: " . $caption . "\n";
                 file_put_contents($caption_file, $entry, FILE_APPEND);
 
                 echo "<br>Caption saved successfully!";
             } else {
                 echo "There was an error uploading your file.";
             }
         }
    }