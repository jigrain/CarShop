<?php
if(isset($_POST['Reg-complete'])) {

    $username = $_POST['username'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $PwdRepeat = $_POST['pwd-repeat'];
    $BaseName = 'none';
    $BaseLocation= 'none';
    $BasePhone= 1;
    require_once 'Con_db.php';
    require_once 'Function.php';



    if(emptyInputSignup($username,$email,$pwd,$PwdRepeat) !== false){
        header("location: /Registration_form.php?error=emptyinput");
        exit();
    }

    if(invalidUserName($username) !== false){
        header("location: /Registration_form.php?error=invalidUsername");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: /Registration_form.php?error=invalidMail");
        exit();
    }

    if(PwMatch($pwd,$PwdRepeat) !== false){
        header("location: /Registration_form.php?error=passwordsdontmatch");
        exit();
    }

    if(UserNameExists($connect,$username,$email) !== false){
        header("location: /Registration_form.php?error=usernametaken");
        exit();
    }
    CreateUserInfo($connect,$BaseName,$BaseLocation,$BasePhone);
    CreateUser($connect,$username,$email,$pwd);



}else{
    header("location: /Registration_form.php");
    exit();
}




