<?php

require_once 'Con_db.php';
require_once 'Function.php';

session_start();

if(empty($_SESSION['userid'])) {

    header("location: /MainPage.php");
    exit();



}
$userId = $_GET["User"];
$username = $_SESSION['username'];

$ChatList = LoadChat($connect,$username);
$ActiveChat = LoadMessage ($connect,$_SESSION["ChatId"]);
$userInfo = UserSelectInfo($connect, $userId);