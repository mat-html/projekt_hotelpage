<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <title>Muster Hotel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head> 
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Muster Hotel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="news.php">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="impressum.php">Impressum</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hilfe.php">Hilfe</a>
            </li>
            <?php
              if(isset($_SESSION["useruid"])){
                echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile Page</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="includes/logout.php">Log out</a></li>';
              }
              else {
                echo '<li class="nav-item"><a class="nav-link" href="sign_up.php">Sign up</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>';
              }
            ?>
            
          </ul>
        </div>
      </div>
    </nav>