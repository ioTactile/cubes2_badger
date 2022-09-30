<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordrpt = $_POST["passwordrpt"];
    $role = $_POST["role"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($username, $lastname, $firstname, $email, $password, $passwordrpt) !== false) {
        header("location: /signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: /signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: /signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $passwordrpt) !== false) {
        header("location: /signup.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: /signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $lastname, $firstname, $email, $password, $role);
} else {
    header("location: /signup.php");
    exit();
}
