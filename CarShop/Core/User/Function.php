<?php

function emptyInputSignup($username,$email,$pwd,$PwdRepeat){
    $result= null;
    if(empty($username) || empty($email) || empty($pwd) || empty($PwdRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUserName($username){
    $result= null;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result= null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function PwMatch($pwd,$PwdRepeat){
    $result= null;
    if($pwd !== $PwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function UserNameExists($connect,$username,$email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: /Registration_form.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    if($row = mysqli_fetch_assoc($resultData )){
        return $row;
    }else{
        $result = false;
        return $result;
    }


}

function CreateUserInfo($connect,$BaseName,$BaseLocation,$BasePhone){
    $sql = "INSERT INTO userinfo (fullname,	location,Phone ) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: /Registration_form.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssi", $BaseName,$BaseLocation,$BasePhone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}

function CreateUser($connect,$username,$email,$pwd){
    $sql = "INSERT INTO users (username,email,password) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: /Registration_form.php?error=stmtfailed");
        exit();
    }


    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
     mysqli_stmt_bind_param($stmt, "sss", $username,$email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: /Registration_form.php?error=none");
    exit();

}

function emptyInputLogin($username,$pwd){
    $result= null;
    if(empty($username) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($connect,$username,$pwd){
    $NameExists = UserNameExists($connect,$username,$username);

    if($NameExists === false){
        header("location: /Login_form.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $NameExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: /Login_form.php?error=wrongpassword");
        exit();
    }else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $NameExists["userid"];
        $_SESSION["username"] = $NameExists["username"];
        $_SESSION["user_type"] = $NameExists["user_type"];
        header("location: /MainPage.php");

    }
}

function UserSelectInfo($connect,$userId){
    $sql = "SELECT fullname,location,Phone,Avatar  FROM userinfo WHERE id = ?";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: /Registration_form.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    if($row = mysqli_fetch_assoc($resultData )){
        return $row;
    }else{
        $result = false;
        return $result;
    }


}

function СhangeAvatar ($connect,$path,$userId){
    $sql = "UPDATE userinfo SET Avatar = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: /Userpage.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "si", $path,$userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: /Userpage.php");
    exit();

}


