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


<div class ="Login_modal">
    <form class="Login_text" method="post" action="Core/User/Login.php">
        <h1>Login in</h1>
        <h4 class="Login_text2">Username</h4>
        <input class="Login_input" placeholder="Username" name="LoginUsername">
        <h4 class="Login_text2" >Password</h4>
        <input class="Login_input" placeholder="Password" name="LoginPassword">
        <button class="Menu_Button_Text Submit_button Login_Button" name="LoginSubmit">Submit</button>
    </form>
</div>
<div class="error">
    <?php
    if(isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        } else if ($_GET["error"] == "wronglogin"){
            echo "<p>Incorrect login!</p>";
        }else if ($_GET["error"] == "wrongpassword"){
            echo "<p>Incorrect password!</p>";
        }
    }
    ?>
</div>

</body>
</html>
