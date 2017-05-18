<?php
include_once("URWeb/model/facebook_login_with_php/config.php");
  $code = $_GET['code'];
  $client_id = '419512185089420';
  $redirect_uri = 'http://localhost/Tw/board.php';
  $client_secret = '5646cecf9effba7e810d28c577248570';
  $acces = "client_id=".$client_id."&redirect_uri=".$redirect_uri."&client_secret=".$client_secret."&code=".$code;
  $access_token_url = "https://graph.facebook.com/v2.5/oauth/access_token?".$acces;
  // $access_token = "EAAF9i0rFbYwBAGGsNu0wbtlTHpFG9k7hjfPOdcgO6G3dkjZBFFBDN03hKDID3SZBkBPZAUYq99QxZAGEmuQRnHzwaygGRhMQBYB851E49RwcHMMuXtwa5IJaCzbq8aGPmgZCmWURpLKwFlCgTrMFiaYZCZCvmTaaFlZAF0rzHGdL6QZDZD";
  $acces_token_xml = file_get_contents($access_token_url);
  $json_a = json_decode($acces_token_xml, true);
  $array = array();
  foreach ($json_a as $k => $v) {
   array_push($array,$v);
}
  $access_token = $array[0];
  $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $access_token);
  $me = $response->getGraphUser();
  $name = $me->getProperty('name');
  $output = ' ' . $name;
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Geolocation</title>
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="URWeb/static/css/board.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--       <link rel="stylesheet" type="text/css" href="../static/css/board.css"> -->
      <script async defer src="URWeb/static/js/map.js"></script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx-eHAzWip3GDruCiK3eRu5zsw7GZZ61w&callback=initMap"></script>

  </head>
<body>
    <table width="1360" height="650">
      <tr style="background: #101928;" width="1360" height="60">
        <th><span style="font-size:20px;">Filtre de cautare</span></th>
        <th>
          <div>
              <div >
                <input type="text" placeholder="Search for..." size="50">
                <span >
                  <button type="button" style="background-color: #1f3251">Cauta</button>
                  <p style="position: center;">Welcome,<?php echo $output; ?>!</p>
                </span>
              </div>
          </div>
        </th>
        <th>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Optiuni
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#">Contul meu</a></li>
              <li><a href="#">Cautarile mele</a></li>
              <li><a href="#">Setari</a></li>
              <li><a href="URWeb/model/facebook_login_with_php/logout.php">Iesire</a></li>
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