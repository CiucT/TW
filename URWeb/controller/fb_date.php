<?php

session_start();
include_once("URWeb/model/facebook_login_with_php/config.php");
include 'connect_mysql.php';

// if (!isset($_SESSION['previousVisitor']))
//     $_SESSION['previousVisitor'] = true;

if (!isset($_SESSION['previousVisitor'])){
    $_SESSION['previousVisitor'] = true;
    $code = $_GET['code'];
    $client_id = '419512185089420';
    $redirect_uri = 'http://localhost/Tw/board.php';
    $client_secret = '5646cecf9effba7e810d28c577248570';
    $acces = "client_id=".$client_id."&redirect_uri=".$redirect_uri."&client_secret=".$client_secret."&code=".$code;
    $access_token_url = "https://graph.facebook.com/v2.5/oauth/access_token?".$acces;
    $access_token = "EAAF9i0rFbYwBAGGsNu0wbtlTHpFG9k7hjfPOdcgO6G3dkjZBFFBDN03hKDID3SZBkBPZAUYq99QxZAGEmuQRnHzwaygGRhMQBYB851E49RwcHMMuXtwa5IJaCzbq8aGPmgZCmWURpLKwFlCgTrMFiaYZCZCvmTaaFlZAF0rzHGdL6QZDZD";
    $acces_token_json = file_get_contents($access_token_url);
    $json_a = json_decode($acces_token_json, true);
    $array = array();
    foreach ($json_a as $k => $v) {
      array_push($array,$v);
    }
    $access_token = $array[0];
    $_SESSION['acces_token'] = $access_token;
    $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $_SESSION['acces_token']);
    $me = $response->getGraphUser();
    $name =$me->getProperty('name');
    $id = $me->getProperty('id');
    $_SESSION['id'] = $id;
    $output = ' ' . $name;
    $name_split = explode(" ", $name);
    $first_name = $name_split[0];
    $last_name = $name_split[1];
    $email = $me->getProperty("email");
    // $user_checkins_url =  "//graph.facebook.com/".$id."/tagged_places";
    // $request = '//graph.facebook.com/'.$id.'//photos?type=tagged';
    // echo $request;
    $profile_pic = "//graph.facebook.com/".$id."/picture";
    $cm = conexiune_mysql();
    $sql_verify = "select id from facebook_users where id = '".$id."';";
    $result = mysqli_query($cm, $sql_verify)or die(mysqli_error($cm));
    while ($row = mysqli_fetch_assoc($result)) {
      $res = $row['id'];
    }
    if(!isset($res)){
      $sql = "INSERT INTO facebook_users (`id`, `first_name`, `last_name`, `e_mail`, `likes`, `profile_pic`) VALUES (".$id.", '".$first_name."', '".$last_name."','".$email."', NULL, '".$profile_pic."')";
      mysqli_query($cm, $sql)or die(mysqli_error($cm));
    } 
}else{
    $cm = conexiune_mysql();
    $sql_verify = "select * from facebook_users where id = '".$_SESSION['id']."';";
    $result = mysqli_query($cm, $sql_verify)or die(mysqli_error($cm));
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
    }
    $name = $first_name . " " . $last_name;
    $profile_pic = "//graph.facebook.com/".$id."/picture";
}
?>