<?php

  include("navbar.php");

?>

    <div class="container">
        <h1 class="display-2">Login</h1>
    </div>
    
    <div class="container">
        <form action="includes/process-login.php" method="POST">
            <div class="mb-3 mt-3">
                <label for="username">Username/E-mail:</label><br>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username/e-mail" required>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label><br>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="text-center">
                <p>Password vergessen? <a href="password_reset.php" class="text-decoration-none">Reset now!</a></p>
            </div>
            <div class="d-grid gap-3">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
        </form>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }
                else if($_GET["error"] == "wronglogin"){
                    echo "<p>Incorect password or username!</p>";
                }
            }
        ?>
    </div>

<?php
    include("footer.php");
?>
