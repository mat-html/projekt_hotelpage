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

    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyInputSignup($lastname, $firstname, $username, $email, $password, 
    $confirm_password, $phonenumb, $birthday, $gender) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUsername($username) !== false){
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(passwordMatch($password, $confirm_password) !== false){
        header("location: ../signup.php?error=passworddontmatch");
        exit();
    }
    if(usernameOrEmailExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    createUser($conn, $lastname, $firstname, $username, $email, $password, 
    $phonenumb, $birthday, $gender);
}
else {
    header("location: ../signup.php");
}



