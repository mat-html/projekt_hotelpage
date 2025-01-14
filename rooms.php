<?php 
    require("includes/dbh.php");
    $sql = "Select * From room";
    $result = mysqli_query($conn, $sql);
    include("./include()/navbar.php"); 
?>

<div class="container-fluid page-title">
    <h1 class="h1">Rooms</h1>
</div>
<div class="mb-3 mt-4">
<form action="./includes/process-reservation.php" method="POST">
    <div class="container mb-1 mt-1" id="form">
        <div class="row">
            <div class="col">
                <input class="form-control mb-3" type="date" name="check-in" placeholder="check-in date">
            </div>
            <div class="col">
                <input class="form-control mb-3" type="date" name="check-out" placeholder="check-out date">
            </div>

            <!-- dropdown menu -->
            <div class="mb-3 col-3">
                <select class="form-select" name="choose-room" aria-label="Default select example">
                    <option selected>Select your type of room</option>
                    <option value="1">Room 1</option>
                    <option value="2">Room 2</option>
                    <option value="3">Room 3</option>
                </select>
            </div>
            <!-- dropdown menu ends -->
            <!-- checkboxes -->
            <div class="form-check mb-3 col">
                <input class="form-check-input" type="checkbox" value="Yes" name="breakfast" id="breakfast">
                <label class="form-check-label" for="breakfast">
                    Breakfast
                </label>
            </div>
            <div class="form-check mb-3 col">
                <input class="form-check-input" type="checkbox" value="Yes" name="parkingplace" id="parkingplace">
                <label class="form-check-label" for="parkingplace">
                    Parkingplace
                </label>
            </div>
            <div class="form-check mb-3 col">
                <input class="form-check-input" type="checkbox" value="Yes" name="pets" id="pets">
                <label class="form-check-label" for="pets">
                    Pets
                </label>
            </div>
        </div>
        <!-- checkboxes end -->
        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-nav btn-outline mt-3">Reserve</button>
        </div>
</form>
</div>

<!-- ROOMS -->
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
                    <div id="room-img"><img src="<?php echo $row["roomImg"]?>" class="img-fluid"></div>
                    <h1 class="card-title pricing-card-title"><?php echo $row["roomPrice"]?><small
                            class="text-body-secondary fw-light">/Night</small></h1>
                    <p class="card-title" style="font-weight: bold;">
                    <?php
                        $fullTitle = nl2br($row['roomDescription']);
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
<?php
    include("./include()/footer.php");

?>