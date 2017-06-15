<?php
include_once("search.php");

  $php_locations = json_encode($Locations->locations);
  echo $_POST['id_loc'];
  if(isset($_POST['id_loc']))
  {
      $location = $_POST['id_loc'];
  for ($i = 0; $i < count($php_locations); $i++) {
    if($Locations->locations[$i]->id==$location){
      $sql_verify = "select user_id from sugestii_locatie where user_id = '".$_SESSION['id']."' and place_id = '".$Locations->locations[$i]->place_id."';";
      $result = mysqli_query($cm, $sql_verify)or die(mysqli_error($cm));
      while ($row = mysqli_fetch_assoc($result)) {
        $res = $row['user_id'];
      }
      if(!isset($res)){
        $sql = "INSERT INTO sugestii_locatie (`user_id`, `place_id`, `descriere`, `adresa`, `latitudine`, `longitudine`) VALUES (".$_SESSION['id'].", '".$Locations->locations[$i]->place_id."', '".$Locations->locations[$i]->description."','".$Locations->locations[$i]->formatted_address."',". $Locations->locations[$i]->loc->lat.", '".$Locations->locations[$i]->loc->lng."')";
        mysqli_query($cm, $sql)or die(mysqli_error($cm));
      }
  }
  }
}
?>