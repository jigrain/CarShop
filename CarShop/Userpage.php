<?php

session_start();
if(empty($_SESSION['userid'])){

header("location: /Login_form.php");
}

include 'Core\User\UserInfo.php'
?>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>
    <link rel="stylesheet" type="text/css" href="CSS/Userpage.css">
    <link rel="stylesheet" type="text/css" href="CSS/Modal.css">
</head>
<div class="return">
    <img src="https://img.icons8.com/fluent-systems-filled/48/000000/reply-arrow.png"/>
    <a href="http://CarShop/MainPage.php">Go to main</a>
</div>
<div class="wrapper">
    <div class="left">
        <img src="<?php echo$userInfo['Avatar'];?>" width="128px" height="128px">
         <button id="myBtn" >Load avatar img</button>
        <h4><?php echo $userInfo['fullname'];?></h4>
        <p><?php echo$_SESSION['user_type'];?></p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                <div class="data">
                    <h4>Email</h4>
                    <p>alex@gmail.com</p>
                </div>
                <div class="data">
                    <h4>Phone</h4>
                    <p><?php echo $userInfo['Phone'];?></p>
                </div>

            </div>
        </div>
        <div class="info_data">
            <div class="data">
                <h4>Location</h4>
                <p><?php echo $userInfo['location'];?></p>
            </div>
            <div class="data buttonDiv">
                <button class="button">Edit profile</button>
                <button class="button">Edit password</button>
            </div>
        </div>




        <script type="text/javascript" src="JS/Userpage.js">

        </script>

        <div class="tab">
            <button class="tablinks active" onclick="openCity(event, 'MyAdverts')">My adverts</button>
            <button class="tablinks" onclick="openCity(event, 'MyChats')">My chats</button>
            <button class="tablinks" onclick="openCity(event, 'Follow')">Follow </button>
        </div>

        <!-- Tab content -->
        <div id="MyAdverts" class="tabcontent" style= "display: block;">
            <h3>My adverts:</h3>
            <p>London is the capital city of England.</p>
        </div>

        <div id="MyChats" class="tabcontent">
            <h3>My Chats:</h3>
            <p>Paris is the capital of France.</p>
        </div>

        <div id="Follow" class="tabcontent">
            <h3>Follow:</h3>
            <p>Paris is the capital of France.</p>
        </div>


    </div>
</div>

<!--===========================================MODAL WINDOW==================================================================-->

<div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="IMG\UploadAvatar.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>

</div>
<script src="JS/Login_modal.js"></script>
