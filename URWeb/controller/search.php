<?php
//fisier de testare a datelor pt implementarea pinurilor de pe harta
include_once("URWeb/controller/connect_mysql.php");

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

if($search_location){
  $address=str_replace(' ','+',$search_location);
  $places_encoded=file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$address.'+in+'.$locality.'+'.$country.'&key=AIzaSyCks8-DgdPi5MLSJDSJUhbLoPrQe10GOCg');
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
  $oras = $_POST["oras"];
  $places_encoded=file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$tip_locatie.'+in+'.$oras.'+'.$country.'&radius='.$arie.'&key=AIzaSyCks8-DgdPi5MLSJDSJUhbLoPrQe10GOCg');
  $places=json_decode($places_encoded);

  $number_of_predicted_results=count($places->results);
  for ($i = 0; $i < $number_of_predicted_results; $i++) {
  $location=new Location();
  $location->description=$places->results[$i]->name;
  $location->id=$places->results[$i]->id;
  $location->place_id=$places->results[$i]->place_id;
  $geocode_encoded=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?place_id='.$location->place_id.'&key=AIzaSyCks8-DgdPi5MLSJDSJUhbLoPrQe10GOCg');
  $geocode=json_decode($geocode_encoded);
  $location->loc=new Local_lat_and_lng();
  $location->loc->lat=$geocode->results[0]->geometry->location->lat;
  $location->loc->lng=$geocode->results[0]->geometry->location->lng;
  $location->formatted_address=$geocode->results[0]->formatted_address;
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
 // $sql_verify = "select user_id from sugestii_locatie where user_id = '".$_SESSION['id']."' and place_id = '".$Locations->locations[0]->place_id."';";
 //  $result = mysqli_query($cm, $sql_verify)or die(mysqli_error($cm));
 //  while ($row = mysqli_fetch_assoc($result)) {
 //    $res = $row['user_id'];
 //  }
 //  if(!isset($res)){
 //    $sql = "INSERT INTO sugestii_locatie (`user_id`, `place_id`, `descriere`, `adresa`, `latitudine`, `longitudine`) VALUES (".$_SESSION['id'].", '".$Locations->locations[0]->place_id."', '".$Locations->locations[0]->description."','".$Locations->locations[0]->formatted_address."',". $Locations->locations[0]->loc->lat.", '".$Locations->locations[0]->loc->lng."')";
 //    mysqli_query($cm, $sql)or die(mysqli_error($cm));
 //  }
?>
