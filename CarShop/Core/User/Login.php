<?php

if (isset($_POST["LoginSubmit"])){
    $username = $_POST["LoginUsername"];
    $pwd = $_POST["LoginPassword"];

    require_once 'Con_db.php';
    require_once 'Function.php';

    if(emptyInputLogin($username,$pwd) !== false){
        header("location: /Login_form.php?error=emptyinput");
        exit();
    }

    loginUser($connect,$username,$pwd);
}else{
    header("location: /Login_form.php");
    exit();

}
