<?php
session_start();
require("dbh.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['useruid'])) {
    $currentUser = $_SESSION['useruid'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];

    // Update profile information
    $sqlUpdate = "UPDATE user1 SET usersUid = ?, usersPhonenumber = ? WHERE usersUid = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sqlUpdate)) {
        mysqli_stmt_bind_param($stmt, "sss", $username, $phonenumber, $currentUser);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION["useruid"] = $username;
            $user = $newUsername;
            echo "<div class='alert alert-success'>Username updated successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error updating username.</div>";
        }

    mysqli_stmt_close($stmt);
    header("location: ../profile.php");
    }
}
?>
