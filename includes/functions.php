<?php

function emptyInputSignup($lastname, $firstname, $username, $email, $password, 
$confirm_password, $phonenumb, $birthday, $gender){

    if(empty($lastname) || empty($firstname) || empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($phonenumb) || empty($birthday) || empty($gender)){
        $result = true;
    }

    else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    }

    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }

    else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $confirm_password){
    if($password !== $confirm_password){
        $result = true;
    }

    else {
        $result = false;
    }
    return $result;
}

function usernameOrEmailExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? || OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }

    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $lastname, $firstname, $username, $email, $password, 
$phonenumb, $birthday, $gender){
    $sql = "INSERT INTO users (usersLastName, usersFirstName, usersUid, usersEmail, usersPassword, usersPhonenumber, usersBirthday, usersGender) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php");
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $lastname, $firstname, $username, $email, $hashedPassword, 
    $phonenumb, $birthday, $gender);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}