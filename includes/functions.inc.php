<?php

function emptyInputSignup($username, $lastname, $firstname, $email, $password)
{
    $result = true;
    if (empty($username) || empty($lastname) || empty($firstname) || empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result = true;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $passwordrpt)
{
    $result = true;
    if ($password !== $passwordrpt) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{

    $sql = "SELECT * FROM `staff` WHERE `uid` = ? OR `email` = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /signup.php?error=stmtfailed");
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

function createUser($conn, $username, $lastname, $firstname, $email, $password, $role)
{
    $sql = "INSERT INTO `staff`(`lastname`, `firstname`, `email`, `password`, `role`, `uid`) VALUE (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $lastname, $firstname, $email, $hashedPwd, $role, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: /signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $password)
{
    $result = true;
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password)
{
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: /index.php?error=wrongLogin");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: /index.php?error=wrongLogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["useruid"] = $uidExists["uid"];
        header("location: /home.php");
        exit();
    }
}

// function affectRole($conn, $role) {

//     $sql = "SELECT `role` FROM `staff` WHERE `uid` = ? OR `email` = ? and `password` = ?;";
//     $stmt = mysqli_stmt_init($conn);
//     if (!mysqli_stmt_prepare($stmt, $sql)) {
//         header("location: ../signup.php?error=stmtfailed");
//         exit();
//     }

//     mysqli_stmt_bind_param($stmt, "sss", $username, $email, $role);
//     mysqli_stmt_execute($stmt);

//     if ($stmt->affected_rows == 1) {
//         $stmt->bind_result($role);
//         $stmt->fetch();
        
//         switch($role) {

//         case 'admin':
//         header("location: ../index.php");
//         exit();
        
//         case 'administration':
//         header("location: ../index1.php");
//         exit();
        
//         case 'speaker':
//         header("location: ../index2.php");
//         exit();
        
//         case 'pilot':
//         header("location: ../index3.php");
//         exit(); 
//         }
//     } 

//     mysqli_stmt_close($stmt);
    
// }
