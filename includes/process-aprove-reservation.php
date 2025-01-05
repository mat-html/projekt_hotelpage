<?php
require("../includes/dbh.php");

if (isset($_POST['submit'])) {
    // Ensure that 'aprove' is an array (since we expect an array of approval statuses)
    if (isset($_POST['aprove']) && !empty($_POST['aprove'])) {
        // Loop through each reservation ID and approval status
        foreach ($_POST['aprove'] as $reservationId => $status) {
            // Sanitize input to prevent SQL injection
            $reservationId = mysqli_real_escape_string($conn, $reservationId);
            $status = mysqli_real_escape_string($conn, $status);

            // First, check if the reservation has already been approved or declined
            $checkSql = "SELECT aproved FROM reservation WHERE reservationId = ?";
            if ($stmt = mysqli_prepare($conn, $checkSql)) {
                // Bind parameter (reservationId)
                mysqli_stmt_bind_param($stmt, "i", $reservationId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $currentStatus);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);

                // If the current status is 'Aproved' or 'Declined', don't update it
                if ($currentStatus === 'Aproved' || $currentStatus === 'Declined') {
                    echo "Reservation ID $reservationId is already $currentStatus and cannot be changed.<br>";
                    continue;  // Skip this iteration and move to the next reservation
                }
            }

            // Now, update the approval status (only if not 'Aproved' or 'Declined')
            $sql = "UPDATE reservation SET aproved = ? WHERE reservationId = ?";

            // Prepare the query
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind parameters: status (string), reservationId (int)
                mysqli_stmt_bind_param($stmt, "si", $status, $reservationId);

                // Execute the query
                if (mysqli_stmt_execute($stmt)) {
                    echo "Reservation ID $reservationId updated to $status.<br>";
                } else {
                    echo "Error executing query for reservation ID $reservationId: " . mysqli_error($conn) . "<br>";
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing the statement for reservation ID $reservationId: " . mysqli_error($conn) . "<br>";
            }
        }
        // Redirect after successful submission
        header("Location: ../admin/reservation_confirmation.php?status=success");
        exit();
    } else {
        echo "No approval status selected.";
    }
}
?>
