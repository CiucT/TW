<?php
include 'connect_mysql.php';
session_start();
	
	$cm = conexiune_mysql();
	$sql = "select place_id, descriere, adresa from sugestii_locatie where user_id = '".$_SESSION['id']."';";
	$descriere_array = array();
	$adresa_array = array();
	$id_place_array = array();
	$result = mysqli_query($cm, $sql)or die(mysqli_error($cm));
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($descriere_array, $row['descriere']);
		array_push($adresa_array, $row['adresa']);
		array_push($id_place_array, $row['place_id']);
	}

?>