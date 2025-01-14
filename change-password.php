<?php
    include("./include()/navbar.php");
    require("./includes/dbh.php");

    $user = $_SESSION['useruid'];

    $sql = "SELECT * FROM user1 WHERE usersUid = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error.";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
?>
<div class="container mt-5">
<form action="./includes/process-change-password.php" method="post">
            <div class="mb-3">    
                <label for="old-password" class="form-label">Old Password:</label>
                <input type="password" class="form-control" id="old-password" name="old_password" required>
            </div>

            <div class="mb-3">
                <label for="new-password" class="form-label">New Password:</label>
                <input type="password" class="form-control" id="new-password" name="new_password" required>
            </div>

            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm New Password:</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-nav btn-outline">Update Password</button>
        </form>
</div>
<?php include("./include()/footer.php"); ?>
</body>
</html>
<?php
}
?>
