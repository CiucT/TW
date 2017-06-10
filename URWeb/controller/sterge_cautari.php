<?php
session_start();
include 'connect_mysql.php';
$cm = conexiune_mysql();
$sql = "DELETE FROM sugestii_locatie WHERE place_id = '".$_GET['id']."' and user_id = '".$_SESSION['id']."';";
mysqli_query($cm, $sql)or die(mysqli_error($cm));
header('Location:../view/templates/cautarile_mele.php');
?>