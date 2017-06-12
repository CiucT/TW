<?php
$api_key = 'AIzaSyBrOZaurZTaWFht_DmBb5Tx5QFWGT8nF7U';
  for ($i = 0; $i < $number_of_predicted_results; $i++) {
  $location=new Location();
  $location->description=$places->results[$i]->description;
  $location->id=$places->results[$i]->id;
  $location->place_id=$places->results[$i]->place_id;
  $location->loc=new Local_lat_and_lng();
  $location->loc->lat=$places->results[$i]->geometry->location->lat;
  $location->loc->lng=$places->results[$i]->geometry->location->lng;
  $location->formatted_address=$places->results[$i]->formatted_address;
  array_push($Locations->locations,$location);
?>