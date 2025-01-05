<?php
session_start();

if (isset($_POST["submit"])) {
    $checkin = $_POST["check-in"];
    $checkout = $_POST["check-out"];
    $room = $_POST["choose-room"];
    $breakfast = $_POST["breakfast"] ?? "no";
    $parking = $_POST["parkingplace"] ?? "no";
    $pets = $_POST["pets"] ?? "no";
    
   
    $userUid = $_SESSION["useruid"];  // This should match the key you've used to store the user identifier in the session.

    require_once 'dbh.php';
    require_once 'functions.php';

    if (emptyInputReservation($checkin, $checkout, $room)) {
        header("location: ../reservation.php?error=no-room-or-date-selected");
        exit();
    }
    
    if (datesTaken($conn, $checkin, $checkout, $room)) {
        header("location: ../reservation.php?error=this-dates-are-taken");
        exit();
    }
    
    
    
    if (datesMatch($checkin, $checkout) !== false) {
        header("location: ../reservation.php?error=check-in-and-checkout-matching");
        exit();
    }

    // Now pass userUid to the function
    createReservation($conn, $userUid, $room, $checkin, $checkout, $breakfast, $parking, $pets);

} else {
    header("location: ../reservation.php");
}
