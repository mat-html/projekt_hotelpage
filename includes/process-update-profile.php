<?php
session_start();
require("dbh.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['useruid'])) {
    $currentUser = $_SESSION['useruid'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $fistname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // Update profile information
    $sqlUpdate = "UPDATE user1 SET usersFirstName = ?, usersLastName = ?, usersUid = ?, usersEmail = ?, usersPhonenumber = ? WHERE usersUid = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sqlUpdate)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $fistname, $lastname, $username, $email, $phonenumber, $currentUser);
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
