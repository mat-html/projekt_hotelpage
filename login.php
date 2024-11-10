<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<?php

  include("navbar.html");

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    </script>
</body>
</html>
