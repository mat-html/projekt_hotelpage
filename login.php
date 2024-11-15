<?php

include("navbar.php");

?>

<div class="container-fluid page-title">
    <h1 class="h1">Login</h1>
</div>

<div class="container border-box">
    <form action="includes/process-login.php" method="POST">
        <div class="container" id="form">
            <div class="input-group mb-3 mt-3">
            <label for="username"></label><br>
            <input type="text" class="form-control" id="username" name="username"
                placeholder="Enter your username/e-mail" required>
        </div>
        <div class="input-group mb-3">
            <label for="password"></label><br>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password"
                required>
        </div>
        <div class="text-center">
            <p>Password vergessen? <a href="password_reset.php" class="text-decoration-none">Reset now!</a></p>
        </div>
        <div class="d-grid gap-3">
            <button type="submit" name="submit" class="btn btn-nav btn-outline mt-3">Log In</button>
        </div>
        </div>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        } else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorect password or username!</p>";
        }
    }
    ?>
</div>

<?php
include("footer.php");
?>