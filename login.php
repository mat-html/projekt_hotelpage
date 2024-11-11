<?php

  include("navbar.php");

?>

    <div class="container">
        <h1 class="display-2">Login</h1>
    </div>
    
    <div class="container">
        <form action="" method="post">
            <div class="mb-3 mt-3">
                <label for="username">Username:</label><br>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label><br>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="text-center">
                <p>Password vergessen? <a href="password_reset.php" class="text-decoration-none">Reset now!</a></p>
            </div>
            <div class="d-grid gap-3">
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
        </form>
    </div>

<?php
    include("footer.php");
?>
