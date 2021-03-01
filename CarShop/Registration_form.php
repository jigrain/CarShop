<?php include_once "Header.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="stylesheet" type="text/css" href="CSS/Modal.css">
</head>

<body>
<div class ="Registration_modal Reg">
    <form class="Login_text"  method="post" action="Core/User/Registration.php">
        <h1>Registration form</h1>
        <h4 class="Login_text2">Email</h4>
        <input class="Reg_input" name="mail" placeholder="E-mail" type="text">
        <h4 class="Login_text2">Username</h4>
        <input class="Reg_input" type="text" placeholder="Username" name="username">
        <h4 class="Login_text2">Password</h4>
        <input class="Reg_input" type="password" name="pwd" placeholder="Password">
        <h4 class="Login_text2">Confirm password</h4>
        <input class="Reg_input" type="password" name="pwd-repeat" placeholder="Repeat password">
        <button class="Menu_Button_Text Login_Button Submit_button" type="submit" name="Reg-complete">Sign up</button>

    </form>
</div>
<div class="error">
    <?php
    if(isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "Fill in all fields!";
        }else if ($_GET["error"] == "invalidUsername"){
            echo "<p>Incorrectly entered username!</p>";
        }else if ($_GET["error"] == "invalidMail"){
            echo "<p>Incorrectly entered mail!</p>";
        }else if ($_GET["error"] == "passwordsdontmatch"){
            echo "<p>Passwords don't match!</p>";
        }else if ($_GET["error"] == "usernametaken"){
            echo "<p>Username of mail already taken!</p>";
        }else if ($_GET["error"] == "none"){
            echo "<p>Signed up success</p>";
        }else{
            echo "";
        }
    }
    ?>
</div>



</body>
</html>
