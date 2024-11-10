<?php

if ($_POST["password"] !== $_POST["confirm_password"]) {
    die("Passwords must match!");
}


//hash password

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


print_r($_POST["last-name"]);
var_dump($password_hash);
?>