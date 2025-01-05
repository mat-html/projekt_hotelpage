<?php

if (isset($_POST["submit"])) {
    require_once 'dbh.php';
    require_once 'functions.php';

    $userId = $_POST["userId"];
    
    deleteUser($conn, $userId);
}
