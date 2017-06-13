<?php

session_start();
include_once("URWeb/model/facebook_login_with_php/config.php");
use \Facebook\FacebookRequest;
require_once( 'URWeb/model/facebook_login_with_php/Facebook/FacebookRequest.php' );
include 'connect_mysql.php';
// if (!isset($_SESSION['previousVisitor']))
//     $_SESSION['previousVisitor'] = true;
$cm = conexiune_mysql();
if (($_SESSION['previousVisitor'])==false){
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
    $response = $fb->get('/me?fields=id,name,email,first_name,last_name,tagged_places', $_SESSION['acces_token']);
    
    $me = $response->getGraphUser();

    //Take locations chek in , user

    $tagged_places = $me['tagged_places'];
    for($i = 0; $i < count($tagged_places); $i = $i + 1){
        // $description=$tagged_places[$i]->place->name;
        // $place_id=$tagged_places[$i]->place->id;
        // echo $description;
        
        // echo $tagged_places[$i];
        
        $places = json_decode($tagged_places[$i]);
        $array_places = array();
            foreach ($places as $k => $v) {
                $array_places[$k] = $v;
            }
        $places_details = json_encode($array_places['place']);
        $places_details_1 = json_decode($places_details);
        $array_places_details = array();
            foreach ($places_details_1 as $k => $v) {
                $array_places_details[$k] = $v;
            }
        $descriere = $array_places_details['name'];
        $place_id = $array_places_details['id'];
        $places_location = json_encode($array_places_details['location']);
        $places_location_1 = json_decode($places_location);
        $array_location = array();
            foreach ($places_location_1 as $k => $v) {
                $array_location[$k] = $v;
            }
        $latitudine = $array_location['latitude'];
        $longitudine = $array_location['longitude'];
        $strada = $array_location['street'];
        $oras = $array_location['city'];
        $tara = $array_location['country'];
    $sql_verify1 = "select place_id from facebook_locations where place_id = '".$place_id."';";
    $result1 = mysqli_query($cm, $sql_verify1)or die(mysqli_error($cm));
    while ($row = mysqli_fetch_assoc($result1)) {
      $res1 = $row['place_id'];
    }
    if(!isset($res1)){
      $sql1 = "INSERT INTO facebook_locations (`place_id`, `descriere`, `strada`, `oras`, `tara`, `latitudine`, `longitudine`) VALUES ('".$place_id."', '".$descriere."', '".$strada."','".$oras."', '".$tara."', ".$latitudine.", ".$longitudine.")";
      mysqli_query($cm, $sql1)or die(mysqli_error($cm));
    } 

    }

    $name =$me->getProperty('name');
    $id = $me->getProperty('id');
    $_SESSION['id'] = $id;
    $output = ' ' . $name;
    $name_split = explode(" ", $name);
    $first_name = $name_split[0];
    $last_name = $name_split[1];
    $email = $me->getProperty("email");
    $profile_pic = "//graph.facebook.com/".$id."/picture";

    $sql_verify = "select id from facebook_users where id = '".$id."';";
    $result = mysqli_query($cm, $sql_verify)or die(mysqli_error($cm));
    while ($row = mysqli_fetch_assoc($result)) {
      $res = $row['id'];
    }
    if(!isset($res)){
      $sql = "INSERT INTO facebook_users (`id`, `first_name`, `last_name`, `e_mail`, `likes`, `profile_pic`) VALUES (".$id.", '".$first_name."', '".$last_name."','".$email."', NULL, '".$profile_pic."')";
      mysqli_query($cm, $sql)or die(mysqli_error($cm));
    } 
    //header('Refresh: 0; url=http://localhost/Tw/board.php');
}else{

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