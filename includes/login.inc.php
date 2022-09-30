<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $password) !== false) {
        header("location: /index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password, $role);
} else {
    header("location: /index.php");
    exit();
}
