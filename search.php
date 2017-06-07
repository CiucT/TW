<?php

//fisier de testare a datelor pt implementarea pinurilor de pe harta

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
}


if($_POST['search_box']){
  $search_location=$_POST['search_box'];
  $address=str_replace(' ','+',$search_location);
  $places_encoded=file_get_contents('https://maps.googleapis.com/maps/api/place/queryautocomplete/json?input='.$address.'+'.$locality.'+'.$country.'&key=AIzaSyCks8-DgdPi5MLSJDSJUhbLoPrQe10GOCg');
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
    echo "<pre>";
    print_r($location);
    // aici trebuie sa facem legatura cu harta pt a afisa pini la lat & lng
    echo "</pre>";
  }




}

?>
