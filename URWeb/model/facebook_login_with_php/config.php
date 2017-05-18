<?php
require_once( "Facebook/autoload.php" );
######### Facebook API Configuration ##########
$fb = new Facebook\Facebook([
  'app_id' => '419512185089420',
  'app_secret' => '5646cecf9effba7e810d28c577248570',
  'default_graph_version' => 'v2.5',
  ]);

// Choose your app context helper
$helper = $fb->getCanvasHelper();
//$helper = $fb->getPageTabHelper();
//$helper = $fb->getJavaScriptHelper();
 
// Grab the signed request entity
$sr = $helper->getSignedRequest();
 
// Get the user ID if signed request exists
$user = $sr ? $sr->getUserId() : null;

// if ( $user ) {
//   try {
 
//     // Get the access token
//     $accessToken = $helper->getAccessToken();
//     $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $accessToken->getValue());
//   } catch( Facebook\Exceptions\FacebookSDKException $e ) {
 
//     // There was an error communicating with Graph
//     echo $e->getMessage();
//     exit;
//   }
//   if ($accessToken) {
//   echo 'Successfully logged in!';
//   }
//     $me = $response->getGraphUser();
// 	$name = $me->getProperty('name');
// }
?>