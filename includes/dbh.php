<?php

// DATABASE FOR USERS

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hotel_user";

// DATABASE FOR ROOMS

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hotel_user";
// CONECTION TO DATABASE

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



