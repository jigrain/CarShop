<?php

$request = $_SERVER['REQUEST_URI'];
$router = str_replace('/route','',$request);
$arr=explode('/',$router);





if($router == '/MainPage' ){
    include('MainPage.php');

}elseif ($router == '/About'){
    include('About.php');
}elseif ($router == '/Shop' || preg_match('/Shop\/[0-9]/i',$router)){

    include('Shop.php');

}elseif ($router == '/Contact') {
    include('Contact.php');

}elseif ($router == '/Login_form' || preg_match('/Login_form\/[0-9]/i',$router)) {
    include('Login_form.php');

}elseif ($router == '/Registration_form' || preg_match('/Registration_form\/[0-9]/i',$router)) {
    include('Registration_form.php');

}elseif ($router == '/Userpage.php' || preg_match('/Userpage\/[0-9]/i',$router)) {
    include('Userpage.php');

}else{
    include('MainPage.php');
}

?>

