<?php 

require_once('../vendor/autoload.php');

$client = new Google_Client();
$client->setAuthConfig('../client_credentials.json');
$client->addScope('email');
$client->addScope('profile');
$client->setRedirectUri("http://localhost/online-grocery-shopping-system/src/index.php");



//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
// if(!isset($_SESSION['access_token']))
// {
 //Create a URL to obtain user authorization
//  $login_button = '<a href="'.$client->createAuthUrl().'"><img src="sign-in-with-google.png" /></a>';
// }



?>

