<?php

if(isset($_POST["submit"])){
    $lastname = $_POST["last-name"];
    $firstname = $_POST["first-name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $phonenumb = $_POST["phone-numb"];
    $birthday = $_POST["date-of-birth"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyInputSignup($lastname, $firstname, $username, $email, $password, $confirm_password, $phonenumb, $birthday) !== false){
        header("location: ../sign_up.php?error=emptyinput");
        exit();
    }
    if(invalidUsername($username) !== false){
        header("location: ../sign_up.php?error=invalidUsername");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../sign_up.php?error=invalidemail");
        exit();
    }
    if(passwordMatch($password, $confirm_password) !== false){
        header("location: ../sign_up.php?error=passworddontmatch");
        exit();
    }
    if(usernameOrEmailExists($conn, $username, $email) !== false){
        header("location: ../sign_up.php?error=usernametaken");
        exit();
    }
    createUser($conn, $lastname, $firstname, $username, $email, $password, $phonenumb, $birthday);
}
else {
    header("location: ../sign_up.php");
}



