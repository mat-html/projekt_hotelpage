<?php

include("navbar.php");

?>
<section>
    <div class="container-fluid page-title">
        <h1 class="h1">Sign Up</h1>
    </div>
    <div class="container border-box">
        <form action="includes/process-signup.php" method="POST">
            <div class="container" id="form">
                <div class="input-group mt-3">
                    <label for="last-name"></label>
                    <input type="text" class="form-control" name="last-name" id="last-name"
                        placeholder="Enter your last name" required>
                </div>
                <br>
                <div class="input-group">
                    <label for="first-name"></label>
                    <input type="text" class="form-control" name="first-name" id="first-name"
                        placeholder="Enter your first name" required>
                </div>
                <br>
                <div class="input-group">
                    <label for="username"></label>
                    <input type="text" class="form-control" name="username" id="username"
                        placeholder="Enter your username" required>
                </div>
                <br>
                <div class="input-group">
                    <label for="email"></label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com"
                        required>
                </div>
                <br>
                <div class="input-group">
                    <label for="password"></label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password" required>
                </div>
                <br>
                <div class="input-group">
                    <label for="confirm_password"></label><br>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        placeholder="Confirm your new password" required>
                </div>
                <br>
                <div class="input-group">
                    <label for="phone-numb"></label>
                    <input type="text" class="form-control" name="phone-numb" id="phone-numb" placeholder="+43 123 456 789"
                        required>
                </div>
                <br>
                <div class="input-group">
                    <lable for="date-of-birth"></lable>
                    <input class="form-control" type="date" name="date-of-birth" id="date-of-birth"
                        placeholder="DD.MM.YYYY" required>
                </div>
                <br>
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-nav btn-outline mt-3">Sign In</button>
                </div>
            </div>
        </form>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            } else if ($_GET["error"] == "invalidUsername") {
                echo "<p>Choose a proper username!</p>";
            } else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Passwords doesn't match!</p>";
            } else if ($_GET["error"] == "usernametaken") {
                echo "<p>Username is already taken!</p>";
            } else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong, try again!</p>";
            } else if ($_GET["error"] == "error=none") {
                echo "<p>You have signed up!</p>";
            }
        }
        ?>
    </div>
</section>

<?php
include("footer.php");
?>