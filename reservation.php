<?php
    include("include()/navbar.php");

    require("includes/dbh.php");

    $sql = "Select * From reservation";

    $result = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
    <form action="includes/process-cancel-reservation.php" method="POST">
        <table>
            <tr>
                <th>Reservation ID</th>
                <th>User ID</th>
                <th>Zimmer ID</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Price</th>
                <th>Pets</th>
                <th>Breakfast</th>
                <th>Parking</th>
                <th>Aproved</th>

                <?php
        while($row = mysqli_fetch_assoc($result))
        {

        ?>

            <tr>
                <td>
                    <?php echo $row['reservationId'] ?>
                </td>
                <td>
                    <?php echo $row['userId'] ?>
                </td>
                <td>
                    <?php echo $row['zimmerId'] ?>
                </td>
                <td>
                    <?php echo $row['from'] ?>
                </td>
                <td>
                    <?php echo $row['to'] ?>
                </td>
                <td>
                    <?php echo $row['price'] ?>
                </td>
                <td>
                    <?php echo $row['pets'] ?>
                </td>
                <td>
                    <?php echo $row['breakfast'] ?>
                </td>
                <td>
                    <?php echo $row['parking'] ?>
                </td>
                <td>
                    <?php echo $row['aproved'] ?>
                </td>
                <td>
                    <input type="hidden" name="reservationId" value="<?php echo $row['reservationId']; ?>">
                    <button type="submit" name="submit">Cancel</button>
                </td>
            </tr>

            <?php

        }

        ?>
            </tr>
        </table>
</div>
</form>

<main class="form-signin w-100 m-auto">
    <form action="./includes/process-reservation.php" method="POST">
        <div class="container" id="form">
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
</main>


<?php
    include("./include()/footer.php");
?>