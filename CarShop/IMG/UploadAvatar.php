<?php
session_start();
require( $_SERVER[ 'DOCUMENT_ROOT' ] . '/Core/User/Con_db.php' );
require( $_SERVER[ 'DOCUMENT_ROOT' ] . '/Core/User/Function.php' );
$target_dir = "Users/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        header("location: /Userpage.php?error=Fileisnotanimage");
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    header("location: /Userpage.php?error=Sorryfilealreadyexists");
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    header("location: /Userpage.php?error=Sorryyourfileistoolarge");
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    header("location: /Userpage.php?error=SorryonlyJPGJPEGPNG");
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header("location: /Userpage.php?error=Sorryyourfilewasnotuploaded");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        rename($target_file,$target_dir.'UserAvatar'.$_SESSION['userid'].'.jpg');
        $path = 'IMG/'.$target_dir.'UserAvatar'.$_SESSION['userid'].'.jpg';
        СhangeAvatar($connect,$path,$_SESSION['userid']);

    } else {
        header("location: /Userpage.php?error=Sorrytherewasanerroruploadingyourfile");

    }
}


