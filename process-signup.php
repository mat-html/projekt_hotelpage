<?php

if ($_POST["password"] !== $_POST["confirm_password"]) {
    die("Passwords must match!");
}


//hash password

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


print_r($_POST["last-name"]);
print_r($_POST["first-name"]);
print_r($_POST["email"]);
print_r($_POST["phone-numb"]);
print_r($_POST["date-of-birth"]);
//print_r($_POST["gender"]);
var_dump($password_hash);
?>