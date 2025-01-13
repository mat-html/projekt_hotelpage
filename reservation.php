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



<?php
    include("./include()/footer.php");
?>