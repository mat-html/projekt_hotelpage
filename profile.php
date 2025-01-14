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
<div class="container-fluid page-title">
  <div clas="row">
    <div class="text-center col-sm-12">
      <h1 class="h1">Profile Page</h1>
    </div>
  </div>
</div>
    <div class="container mt-5">
        
        <form action="./includes/process-update-profile.php" method="post">
            <!-- Editable fields for username and phone number -->
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($row['usersUid']); ?>">
            </div>

            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo htmlspecialchars($row['usersPhonenumber']); ?>">
            </div>

            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday:</label>
                <input type="text" class="form-control" id="birthday" value="<?php echo htmlspecialchars($row['usersBirthday']); ?>" readonly>
            </div>
            <button type="submit" class="btn btn-nav btn-outline">Update Profile</button>
        </form>
        <a class="btn btn-nav btn-outline" href="change-password.php">Change Password</a>
    </div>

    <?php include("./include()/footer.php"); ?>
</body>
</html>
<?php
}
?>
