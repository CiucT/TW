<?php
include_once("URWeb/controller/fb_date.php");
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
  public $address="";
  public $loc;
}

class Locations{
  public $locations=array();
}


if($_POST['search_box']){
  $search_location=$_POST['search_box'];
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
    $location->address=$geocode->results[0]->formatted_address;
    $location->loc=new Local_lat_and_lng();
    $location->loc->lat=$geocode->results[0]->geometry->location->lat;
    $location->loc->lng=$geocode->results[0]->geometry->location->lng;
    array_push($Locations->locations,$location);
  }


  echo json_encode($Locations);
  /*
  echo "<pre>";
  print_r($Locations);
  // aici trebuie sa facem legatura cu harta pt a afisa pini la lat & lng
  echo "</pre>";
*/
}
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Geolocation</title>
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="URWeb/view/static/css/board.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--       <link rel="stylesheet" type="text/css" href="../static/css/board.css"> -->
      <script async defer src="URWeb/view/static/js/map.js"></script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx-eHAzWip3GDruCiK3eRu5zsw7GZZ61w&callback=initMap"></script>

  </head>
<body>
    <table width="1360" height="650">
      <tr style="background: #101928;" width="1360" height="60">
        <th><span style="font-size:20px;">Filtre de cautare</span></th>
        <th>
          <div>
              <div >
                <form action="search.php" method="post">
                  <input type="text" placeholder="Search for..." style="color:black;" size="50" name="search_box">
                  <input type="submit" value="Cauta" style="background-color: #1f3251">
                </form>
                <span >
                  <p style="position: center;">Welcome, <?php echo $name; ?>!</p>
                </span>
              </div>
          </div>
        </th>
        <th>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><img src="<?php echo $profile_pic ?>">  Optiuni
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#">Contul meu</a></li>
              <li><a href="#">Cautarile mele</a></li>
              <li><a href="#">Setari</a></li>
              <li><a href="URWeb/controller/logout.php">Iesire</a></li>
            </ul>
          </div>
        </th>
      </tr>
      <tr>
        <td class = "menu" height="40"> </td>
        <td colspan="2" rowspan="5" class="border-radius"><div id="map"></div></td>
      </tr>
      <tr>
        <td class = "menu" height="40">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Oras
            <span class="caret"></span></button>
            <ul class="dropdown-menu" style="overflow-y:scroll; height:200px;">
            <li>
              <input type="radio" name="group1" value="mica" id="item1">
                <label for="item1">Alba</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="medie" id="item2">
                <label for="item2">Argeș</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Arad</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">București</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Bacău</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Bârlad</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Bistriţa</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Bihor</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Bistrița-Năsăud</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Brăila</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mica" id="item1">
                <label for="item1">Botoșani</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="medie" id="item2">
                <label for="item2">Brașov</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Buzău</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Cluj</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Călărași</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Caraș-Severin</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Constanța</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Covasna</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Dâmbovița</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Dolj</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mica" id="item1">
                <label for="item1">Gorj</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="medie" id="item2">
                <label for="item2">Galați</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Giurgiu</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Hunedoara</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Harghita</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Ilfov</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Ialomița</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Iași</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Mehedinți</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Maramureș</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mica" id="item1">
                <label for="item1">Mureș</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="medie" id="item2">
                <label for="item2">Neamț</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Olt</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Prahova</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Sibiu</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Sălaj</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Satu Mare</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Suceava</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Tulcea</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Timiș</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Teleorman</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Vâlcea</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Vrancea</label></input></br>
            </li>
            <li>
              <input type="radio" name="group1" value="mare" id="item3">
                <label for="item3">Vaslui</label></input>
            </li>
          </ul>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td class = "menu" height="40">
            <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Arie de cautare<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li>
                  <input type="radio" name="group1" value="mica" id="item1">
                  <label for="item1">0-5000</label></input></br>
                </li>
                <li>
                  <input type="radio" name="group1" value="medie" id="item2">
                  <label for="item2">5001-10000</label></input></br>
                </li>
                <li>
                  <input type="radio" name="group1" value="mare" id="item3">
                  <label for="item3">>10000</label></input>
                </li>
            </ul>
            </div>
        </td>
      </tr>
      <tr><td class = "menu" height="40"><div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Locatii<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li>
                  <input type="radio" name="group1" value="mica" id="item1">
                  <label for="item1">Restaurante</label></input></br>
                </li>
                <li>
                  <input type="radio" name="group1" value="mare" id="item3">
                  <label for="item3">Spitale</label></input>
                </li>
                <li>
                  <input type="radio" name="group1" value="mica" id="item1">
                  <label for="item1">Parcuri</label></input></br>
                </li>
                <li>
                  <input type="radio" name="group1" value="mare" id="item3">
                  <label for="item3">Centre de invatamant</label></input>
                </li>
                <li>
                  <input type="radio" name="group1" value="mare" id="item3">
                  <label for="item3">Centru comercial</label></input>
                </li>
            </ul>
      </td></tr>
      <tr><td class = "menu" style="vertical-align: bottom;"><a href="http://students.info.uaic.ro/~georgiana.trofin/urweb/tw.html">Contact</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="aboutus.html">Despre noi</a></td></tr>
    </table>
  </body>
</html>
