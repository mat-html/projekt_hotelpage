<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Muster Hotel</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="my.css/style.css">
  <body>
  <header>
    <nav class="navbar navbar-expand-md">
      <div class="container">
        <a class="navbar-brand" href="index.php">Muster Hotel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
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
            if (isset($_SESSION["useruid"])) {
              echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile Page</a></li>';
              echo '<li class="nav-item"><a class="nav-link" href="includes/logout.php">Log out</a></li>';
            }
            ?>

          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main class="flex-shrink-0">