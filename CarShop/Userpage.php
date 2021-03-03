<?php

session_start();
if(empty($_SESSION['userid'])){

header("location: /Login_form.php");
}

include 'Core\User\UserInfo.php';
include 'Core\User\FindChatMessage.php';
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
        <?php if($_SESSION['userid']==$_GET["User"]){?>
         <button id="myBtn" class="button">Load avatar img</button>
        <?php } ?>
        <h4><?php echo $userInfo['fullname'];?></h4>
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
                <?php if($_SESSION['userid']==$_GET["User"]){?>
                <button class="button">Edit profile</button>
                <button class="button">Edit password</button>
                <?php } ?>
            </div>

        </div>


    </div>
</div>

<form class="ChatContainer" method="post">
    <div class="ChatViewer">
        <?php
        for($i=0;$i<count($ActiveChat);$i++){
        ?>
        <?php
        if($ActiveChat[$i]['owner']==$_SESSION['username']){
        ?>
        <div class="MyMessage">
            <p class ="MeUsername"><?php echo $_SESSION['username']?></p>
            <?php echo $ActiveChat[$i]['text']?>
        </div>
        <?php }else{ ?>
        <div class="OtherMessage">
            <p class ="OtherUsername"><?php echo $ActiveChat[$i]['owner']?></p>
            <?php echo $ActiveChat[$i]['text']?>
        </div>
        <?php
        }
        ?>
        <?php
        }

        ?>
    </div>
    <input class="ChatInput" name="ChatInput">
    <button class="ChatButton button" name="MessageSend">Send</button>
    <div class="ChatList" >
        <h2>Chat list</h2>
        <?php
        for($i=0;$i<count($ChatList);$i++){
        if($ChatList[$i]["user1"]==$_SESSION['username']){
         ?>
        <div class="ChatListComponent"><?php echo $ChatList[$i]["user2"]; ?><button class="ChatButton button" name="ChatListButton" value="<?php echo $ChatList[$i]["id"]; ?>">Load</button></div>
        <?php
        } else {
        ?>
        <div class="ChatListComponent"><?php echo $ChatList[$i]["user1"]; ?><button class="ChatButton button" name="ChatListButton" value="<?php echo $ChatList[$i]["id"]; ?>">Load</button></div>
        <?php
        }
        }
        ?>
    </div>
</form>

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
