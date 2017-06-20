<?php

  $positions = $_GET["positions"];
  $positions = explode(",", $positions);
 $navigator_encoded=file_get_contents('https://maps.googleapis.com/maps/api/directions/json?origin='.$positions[0].','.$positions[1].'&destination='.$positions[2].','.$positions[3].'&key=AIzaSyBXOMjn4IxeCyUw0Sx2icEIpza2f9MAfk4');
 $navigator=json_decode($navigator_encoded);
 $steps=count($navigator->routes[0]->legs[0]->steps);

 class Navigation{
 	public $step;
 }
 class Steps{
 	public $start;
 	public $end;
 	public $instructions;
 }

 $Navigate=new Navigation();
 for($i=0;$i<$steps;$i++){
 	$Step=new Steps();
 	$Step->start=$navigator->routes[0]->legs[0]->steps[$i]->start_location;
 	$Step->end=$navigator->routes[0]->legs[0]->steps[$i]->end_location;
 	$Step->instructions=$navigator->routes[0]->legs[0]->steps[$i]->html_instructions;
 	$Navigate->step[]= $Step;
 }
 echo json_encode($Navigate);
?>
