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

$search_location = (isset($_POST['search_box']) ? $_POST['search_box'] : null);
if($search_location){
  $address=str_replace(' ','+',$search_location);
  $places_encoded=file_get_contents('https://maps.googleapis.com/maps/api/place/queryautocomplete/json?input='.$address.'+'.$locality.'+'.$country.'&key=AIzaSyCks8-DgdPi5MLSJDSJUhbLoPrQe10GOCg');
  $places=json_decode($places_encoded);

  $number_of_predicted_locations=count($places->predictions);

  $Locations=new Locations();
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

echo json_encode($Locations);
echo json_encode($Locations->locations[0]->loc);
echo json_encode($Locations->locations[0]->formatted_address);

/*
  echo "<pre>";
  print_r($Locations);
  // aici trebuie sa facem legatura cu harta pt a afisa pini la lat & lng
  echo "</pre>";
*/
  $sql = "INSERT INTO sugestii_locatie (`user_id`, `place_id`, `descriere`, `adresa`, `latitudine`, `longitudine`) VALUES (".$_SESSION['id'].", '".$Locations->locations[0]->place_id."', '".$Locations->locations[0]->description."','".$Locations->locations[0]->formatted_address."',". $Locations->locations[0]->loc->lat.", '".$Locations->locations[0]->loc->lng."')";
      mysqli_query($cm, $sql)or die(mysqli_error($cm));
}

?>
