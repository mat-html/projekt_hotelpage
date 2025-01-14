<?php
    require("../includes/dbh.php");
    $sql = "Select * From room";
    $result = mysqli_query($conn, $sql);

    include("header.php");
    include("navbar.php");
?>
<form method="POST" action="../includes/process-room-upload.php" enctype="multipart/form-data">
    Select Image: <input type="file" name="image"><br>
    Name: <input type="text" name="name"><br>
    Description: <textarea name="description" rows="4" cols="50"></textarea>
    Price: <input type="text" name="price"><br>
    <input type="submit" name="upload" value="Upload Now">
</form>

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><?php echo $row["roomName"]?></h4>
                </div>
                <div class="card-body">
                    <div id="room-img"><img src="<?php echo "../" . $row["roomImg"]?>" class="img-fluid"></div>
                    <h1 class="card-title pricing-card-title"><?php echo $row["roomPrice"]?><small
                            class="text-body-secondary fw-light">/Night</small></h1>
                    <p class="card-title" style="font-weight: bold;">
                    <?php
                        $fullTitle = htmlspecialchars($row['roomDescription']);
                        $preview = substr($fullTitle, 0, 100);
                        echo $preview . (strlen($fullTitle) > 100 ? '...' : '');
                    ?>
                </p>
                </div>
            </div>
        </div>
        
        <?php 
            }
        ?>
    </div>
</div>