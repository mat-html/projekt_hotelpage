<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwort zurücksetzen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

  include("navbar.html");

?>

    <div class="container">
      <h1 class="display-2">Passwort zurücksetzen</h1>
    </div>
    
    <div class="container">
      <form action="Muster_Hotel.html" method="GET">
          <div class="mb-3 mt-3">
              <label for="new_password">New password</label><br>
              <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" required>
          </div>
          <div>
              <label for="confirm_password">New password</label><br>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your new password" required>
          </div>
          <div class="d-grid mt-3" >
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
<?php
    include("footer.html");
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        
    </script>
</body>
</html>