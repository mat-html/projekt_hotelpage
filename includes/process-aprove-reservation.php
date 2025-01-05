<?php
require("../includes/dbh.php");

if (isset($_POST['submit'])) {
    if (isset($_POST['aprove']) && !empty($_POST['aprove'])) {
        foreach ($_POST['aprove'] as $reservationId => $status) {
            $reservationId = mysqli_real_escape_string($conn, $reservationId);
            $status = mysqli_real_escape_string($conn, $status);

            $checkSql = "SELECT aproved FROM reservation WHERE reservationId = ?";
            if ($stmt = mysqli_prepare($conn, $checkSql)) {
                mysqli_stmt_bind_param($stmt, "i", $reservationId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $currentStatus);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);

                if ($currentStatus === 'Aproved' || $currentStatus === 'Declined') {
                    echo "Reservation ID $reservationId is already $currentStatus and cannot be changed.<br>";
                    continue;
                }
            }

            $sql = "UPDATE reservation SET aproved = ? WHERE reservationId = ?";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "si", $status, $reservationId);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Reservation ID $reservationId updated to $status.<br>";
                } else {
                    echo "Error executing query for reservation ID $reservationId: " . mysqli_error($conn) . "<br>";
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing the statement for reservation ID $reservationId: " . mysqli_error($conn) . "<br>";
            }
        }
        header("Location: ../admin/reservation_confirmation.php?status=success");
        exit();
    } else {
        echo "No approval status selected.";
    }
}

