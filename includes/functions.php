<?php

function emptyInputSignup($lastname, $firstname, $username, $email, $password, $confirm_password, $phonenumb, $birthday
) {

    if (empty($lastname) || empty($firstname) || empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($phonenumb) || empty($birthday)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $confirm_password)
{
    if ($password !== $confirm_password) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usernameOrEmailExists($conn, $username, $email)
{
    $sql = "SELECT * FROM user1 WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $lastname, $firstname, $username, $email, $password, $phonenumb, $birthday)
{
    $sql = "INSERT INTO user1 (usersLastName, usersFirstName, usersUid, usersEmail, usersPassword, usersPhonenumber, usersBirthday) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up.php?error=stmtfailed");
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $lastname, $firstname, $username, $email, $hashedPassword, $phonenumb, $birthday);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();
}

// LOG-IN FUNCTIONS
function emptyInputLogin($username, $password)
{
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password)
{
    $uidExist = usernameOrEmailExists($conn, $username, $username);

    if ($uidExist === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $uidExist["usersPassword"];
    $checkPassword = password_verify($password, $passwordHashed);


    if ($checkPassword === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        

        $_SESSION["userid"] = $uidExist["id"];
        $_SESSION["useruid"] = $uidExist["usersUid"];
        $_SESSION["usersType"] = $uidExist["usersType"];

        if ($_SESSION["usersType"] == "admin") {
            header("location: ../admin.php");
        } else {
            header("location: ../index.php");
        }
        exit();
    }
}

// RESERVATION FUNCTIONS

function emptyInputReservation($checkin, $checkout, $room) {
    if (empty($checkin) || empty($checkout) || empty($room)) {
        return true; 
    }
    return false; 
}


function datesTaken($conn, $checkin, $checkout, $room)
{
    $sql = "SELECT * FROM reservation WHERE zimmerId = ? AND (
                (`from` <= ? AND `to` >= ?) OR
                (`from` < ? AND `to` > ?)
            );";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "sssss", $room, $checkout, $checkin, $checkin, $checkout);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        mysqli_stmt_close($stmt);
        return true; // Dates are taken
    }

    mysqli_stmt_close($stmt);
    return false; // Dates are not taken
}







function datesMatch($checkin, $checkout) {

    $checkinDate = new DateTime($checkin);
    $checkoutDate = new DateTime($checkout);


    if ($checkinDate >= $checkoutDate) {
        return true;
    }
    return false;
}



function createReservation($conn, $userUid, $room, $checkin, $checkout, $breakfast, $parking, $pets)
{

    $sqlUser = "SELECT * FROM user1 WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sqlUser)) {
        header("location: ../reservation.php?error=userstmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $userUid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    $userId = $user['usersUid']; 
    mysqli_stmt_close($stmt);


    $sql = "INSERT INTO reservation (userId, zimmerId, `from`, `to`, pets, breakfast, parking) 
            VALUES (?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../reservation.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sssssss", $userId, $room, $checkin, $checkout, $pets, $breakfast, $parking);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    header("location: ../reservation.php?error=none");
    exit();
}

// DELETE USER
function deleteUser($conn, $userId){
    
    $sql = 'DELETE FROM user1 WHERE id = ?';

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../admin/users.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userId);
    
    if(mysqli_stmt_execute($stmt)){
        header("location: ../admin/users.php?error=none");
    } else {
        header("location: ../admin/users.php?error=deletionfailed");
    }
    mysqli_stmt_close($stmt);
    exit();
}

// DELETE RESERVATION
function deleteReservation($conn, $reservationId){
    
    $sql = 'DELETE FROM reservation WHERE reservationId = ?';

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../reservation.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $reservationId);
    
    if(mysqli_stmt_execute($stmt)){
        header("location: ../reservation.php?error=none");
    } else {
        header("location: ../reservation.php?error=deletionfailed");
    }
    mysqli_stmt_close($stmt);
    exit();
}

// DISPLAY NEWS PREVIEW

function openNews($conn, $newsId){
        // SQL query to fetch the news by ID
    $sql = "SELECT * FROM news WHERE newsId = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $newsId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
                
                // If the news item is found, return the result
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null; // No news found
        }
        
        mysqli_stmt_close($stmt);
    } else {
        return null; // Query failed
}
}