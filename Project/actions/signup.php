<?php
include_once('../database/dbUtils.php');

session_start();

$_SESSION['invalid_user'] = 0;

$username = $_POST["username"];
$password = $_POST["password"];

if($username != null && $password != null){

    $result = getUser($username);
    $number_of_rows = sizeof($result);

    if($number_of_rows == 0){

        putUser($username,$password);
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        header('Location: ../index.php');
        $_SESSION['invalid_user'] = 0;
    }
    else {
        $username = null;
        $password = null;
        $_SESSION['invalid_user'] = 1;
        header('Location: ../signup.php');
    }
}