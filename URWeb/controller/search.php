<?php
//fisier de testare a datelor pt implementarea pinurilor de pe harta
include_once("connect_mysql.php");

$search_location="";
$locality="";
$country="Romania";

class Local_lat_and_lng{
    public $lat;
    public $lng;
}

class Location{
  public $description="";
  public $id="";
  public $place_id="";
  public $loc;
  public $formatted_address;
}

class Locations{
  public $locations=array();
}

$Locations=new Locations();
$search_location = (isset($_POST['search_box']) ? $_POST['search_box'] : null);
$search_by_options = (isset($_POST['submit_cauta_dupa_optiuni']) ? $_POST['submit_cauta_dupa_optiuni'] : null);
$facebook_locations = (isset($_POST['facebook_locations']) ? $_POST['facebook_locations'] : null);

if($search_location){
  $address=str_replace(' ','+',$search_location);
  $places_encoded=file_get_contents('https://maps.googleapis.com/maps/api/place/queryautocomplete/json?input='.$address.'+'.$country.'&key=AIzaSyCks8-DgdPi5MLSJDSJUhbLoPrQe10GOCg');
  $places=json_decode($places_encoded);
  
  $number_of_predicted_locations=count($places->predictions);

  for ($i = 0; $i < $number_of_predicted_locations; $i++) {
    $location=new Location();
    $location->description=$places->predictions[$i]->description;
    $location->id=$places->predictions[$i]->id;
    $location->place_id=$places->predictions[$i]->place_id;
    $geocode_encoded=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?place_id='.$location->place_id.'&key=AIzaSyCks8-DgdPi5MLSJDSJUhbLoPrQe10GOCg');
    $geocode=json_decode($geocode_encoded);
    $location->loc=new Local_lat_and_lng();
    $location->loc->lat=$geocode->results[0]->geometry->location->lat;
    $location->loc->lng=$geocode->results[0]->geometry->location->lng;
    $location->formatted_address=$geocode->results[0]->formatted_address;
    array_push($Locations->locations,$location);
  }
}

if($search_by_options){
  $arie = $_POST["arie"];
  $tip_locatie = $_POST["locatie"];
  $lng_lat = $_POST["pos"];
  $places_details = json_encode($lng_lat);
  $places_details_1 = json_decode($places_details);
  $array_places_details = array();
      foreach ($places_details_1 as $k => $v) {
          $array_places_details[$k] = $v;
  }
  $places_encoded=file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?type='.$tip_locatie.'&location='.$array_places_details['lat'].','.$array_places_details['lng'].'&radius='.$arie.'&key=AIzaSyBrOZaurZTaWFht_DmBb5Tx5QFWGT8nF7U');
  $places=json_decode($places_encoded);
  echo 'https://maps.googleapis.com/maps/api/place/textsearch/json?type='.$tip_locatie.'&location='.$array_places_details['lat'].','.$array_places_details['lng'].'&radius='.$arie.'&key=AIzaSyBrOZaurZTaWFht_DmBb5Tx5QFWGT8nF7U';
  $number_of_predicted_results=count($places->results);
  for ($i = 0; $i < $number_of_predicted_results; $i++) {
  $location=new Location();
  $location->description=$places->results[$i]->name;
  $location->id=$places->results[$i]->id;
  $location->place_id=$places->results[$i]->place_id;
  $geocode_encoded=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?place_id='.$location->place_id.'&key=AIzaSyBrOZaurZTaWFht_DmBb5Tx5QFWGT8nF7U');
  $geocode=json_decode($geocode_encoded);
  $location->loc=new Local_lat_and_lng();
  $location->loc->lat=$geocode->results[0]->geometry->location->lat;
  $location->loc->lng=$geocode->results[0]->geometry->location->lng;
  $location->formatted_address=$geocode->results[0]->formatted_address;
  array_push($Locations->locations,$location);
  }
}
if($facebook_locations){
  $sql = "select place_id, descriere, strada, latitudine, longitudine from facebook_locations where user_id = '".$_SESSION['id']."';";
  echo $sql;
  $result = mysqli_query($cm, $sql)or die(mysqli_error($cm));
  while ($row = mysqli_fetch_assoc($result)) {
    echo $row['place_id'];
    $location=new Location();
    $location->id = $row['place_id'];
    $location->place_id = $row['place_id'];
    $location->description = $row['descriere'];
    $location->formatted_address = $row['strada'];
    $location->loc=new Local_lat_and_lng();
    $location->loc->lat = (float)$row['latitudine'];
    $location->loc->lng = (float)$row['longitudine'];
    array_push($Locations->locations,$location);
  }

}
  echo '<script>';
  echo 'var php_locations='.json_encode($Locations->locations).';';
  echo '</script>';
/*
  echo "<pre>";
  print_r($Locations);
  // aici trebuie sa facem legatura cu harta pt a afisa pini la lat & lng
  echo "</pre>";
*/
?>
