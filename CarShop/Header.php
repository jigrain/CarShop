<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Header.css">
    <link rel="stylesheet" type="text/css" href="CSS/Modal.css">
</head>

<body>
<form class="Main_Menu_Container" >
    <div class="Logo">
        <h1>CarShop</h1>

    </div>
    <div class="Main_Menu">
        <ul class = "Button_List ">
            <li class = "Menu_Button"><a class = "Menu_Button_Text" href="http://CarShop/MainPage.php">Main</a></li>
            <li class = "Menu_Button"><a class = "Menu_Button_Text" href="http://CarShop/Shop.php">Shop</a></li>
            <li class = "Menu_Button"><a class = "Menu_Button_Text" href="http://CarShop/About.php">About</a></li>
            <li class = "Menu_Button"><a class = "Menu_Button_Text" href="http://CarShop/Contact.php">Contact</a></li>
        </ul>
        <div class="login_list">
            <ul class="Button_List  ">
                <?php
                if(isset($_SESSION['userid'])) {
                    echo '<li class = "Menu_Button"><a class = "Menu_Button_Text" href="http://CarShop/Userpage.php">Profile</a></li>';
                    echo '<li class = "Menu_Button"><a class = "Menu_Button_Text" href="Core/User/Logout.php">Logout</a></li>';
                }else if(empty($_SESSION['userid'])){
                    echo '<li class = "Menu_Button"><a class = "Menu_Button_Text" href="http://CarShop/Login_form.php">Log In</a></li>';
                    echo '<li class = "Menu_Button"><a class = "Menu_Button_Text" href="http://CarShop/Registration_form.php">Sign Up</a></li>';
                }
                ?>
            </ul>
        </div>

    </div>
</form>


</body>
</html>
