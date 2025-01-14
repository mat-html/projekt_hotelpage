<?php
session_start();
require("dbh.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['useruid'])) {
    $currentUser = $_SESSION['useruid'];
    $oldPassword = trim($_POST['old_password']);
    $newPassword = trim($_POST['new_password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Check that all fields are filled
    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        header("location: ../change-password.php?error=empty-fields");
        exit();
    }

    // Verify the old password
    $sql = "SELECT usersPassword FROM user1 WHERE usersUid = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $currentUser);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $hashedPasswordFromDB);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Validate the old password
        if (password_verify($oldPassword, $hashedPasswordFromDB)) {
            // Check if new passwords match
            if ($newPassword === $confirmPassword) {
                // Hash the new password
                $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password in the database
                $updateSql = "UPDATE user1 SET usersPassword = ? WHERE usersUid = ?";
                $updateStmt = mysqli_prepare($conn, $updateSql);

                if ($updateStmt) {
                    mysqli_stmt_bind_param($updateStmt, "ss", $newHashedPassword, $currentUser);
                    mysqli_stmt_execute($updateStmt);
                    mysqli_stmt_close($updateStmt);

                    header("location: ../change-password.php?success=password-updated");
                    exit();
                } else {
                    header("location: ../change-password.php?error=update-failed");
                    exit();
                }
            } else {
                header("location: ../change-password.php?error=passwords-dont-match");
                exit();
            }
        } else {
            header("location: ../change-password.php?error=incorrect-password");
            exit();
        }
    } else {
        header("location: ../change-password.php?error=sql-error");
        exit();
    }
}

mysqli_close($conn);
?>
