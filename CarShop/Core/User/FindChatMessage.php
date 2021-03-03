<?php
require_once 'Con_db.php';
require_once 'Function.php';
session_start();
$ActiveChat = [];
if(isset($_POST['ChatListButton'])){
    $_SESSION["ChatId"] = $_POST['ChatListButton'];
    $ActiveChat = LoadMessage ($connect,$_POST['ChatListButton']);


}

if(isset($_POST['MessageSend'])){
    if(isset($_POST['ChatInput'])){
        if($_SESSION["ChatId"] == 0){
            header("location: /Userpage.php?error=selectchat");
        }else if(empty($_POST['ChatInput'])){
            header('/Userpage.php?User='.$_SESSION["userid"]);
        }else{
            SendNewMessage($connect,$_SESSION["ChatId"],$_POST['ChatInput'],$_SESSION["username"]);
            $ActiveChat = LoadMessage ($connect,$_SESSION["ChatId"]);
        }
    }


}

