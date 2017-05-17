<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '419512185089420'; //Facebook App ID
$appSecret = '5646cecf9effba7e810d28c577248570'; // Facebook App Secret
$homeurl = 'http://localhost';  //return to home
$fbPermissions = 'public_profile,user_friends';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>