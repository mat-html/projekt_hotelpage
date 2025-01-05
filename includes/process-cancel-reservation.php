<?php

if (isset($_POST["submit"])) {
    
    require_once 'dbh.php';
    require_once 'functions.php';

    $reservationId = $_POST["reservationId"];
    
    deleteReservation($conn, $reservationId);
}
