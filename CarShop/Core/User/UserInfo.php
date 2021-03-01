<?php

require_once 'Con_db.php';
require_once 'Function.php';

session_start();

if(empty($_SESSION['userid'])) {

    header("location: /MainPage.php");
    exit();



}
$userId = $_SESSION['userid'];

$userInfo = UserSelectInfo($connect, $userId);