<?php
include_once("URWeb/model/facebook_login_with_php/config.php");
//destroy facebook session if user clicks reset
if(!$user){
  $callback    = 'http://localhost/Tw/board.php';
  $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email', 'user_posts', 'user_likes']; // optional
  $loginUrl    = $helper->getLoginUrl($callback, $permissions);
	$output = '<div style="text-align:center;display:block;"><a href="'.$loginUrl.'"><img src="URWeb/model/facebook_login_with_php/images/fb_login.png"></a></div>';
}else{
  $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $accessToken->getValue());
  $output = '<br/>Name : ' . $name;
  $me = $response->getGraphUser();
  $name = $me->getProperty('name');
}

?>