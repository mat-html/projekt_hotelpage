<?php

if(isset($_POST["submit"])){
    $lastname = $_POST["last-name"];
    $firstname = $_POST["first-name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pasword"];
    $confirm_password = $_POST["confirm_password"];
    $phonenumb = $_POST["phone-numb"];
    $birthday = $_POST["date-of-birth"];
    $gender = $_POST["gender"];
}
else {
    header("location: ../signup.php");
}


if ($_POST["password"] !== $_POST["confirm_password"]) {
    die("Passwords must match!");
}


