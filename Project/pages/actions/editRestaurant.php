<?php
session_start();

include_once('../../database/dbUtils.php');

$token = $_POST['token'];
if($_SESSION['token'] != $token){
    header('Location: ../niceTry.php');
}

$newName = htmlspecialchars($_POST['newName']);
$newType = htmlspecialchars($_POST['newType']);
$newLocation = htmlspecialchars($_POST['newLocation']);
$restaurantID = $_SESSION['restaurant']['id'];

if($newName != $_SESSION['restaurant']['name']){
    updateRestaurantName($restaurantID,$newName);
}

if($newType != $_SESSION['restaurant']['type']){
    updateRestaurantType($restaurantID, $newType);
}

if($newLocation != $_SESSION['restaurant']['location']){
    updateRestaurantLocation($restaurantID, $newLocation);
}

$link = "restaurant.php?id=".$restaurantID;
header('Location: '.$link);