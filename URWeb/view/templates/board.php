<?php
error_reporting(0);
include_once("URWeb/controller/fb_date.php");
include_once("URWeb/controller/search.php");
include_once("URWeb/controller/introducere_cautari.php");
if(isset($_POST['id_loc'])){
  echo $_POST['id_loc'];
}
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Geolocation</title>
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="URWeb/view/static/css/board.css" />
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
      <script src="http://malsup.github.com/jquery.form.js"></script> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--       <link rel="stylesheet" type="text/css" href="../static/css/board.css"> -->
      <script src="URWeb/view/static/js/map.js"></script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx-eHAzWip3GDruCiK3eRu5zsw7GZZ61w&callback=initMap"></script>
<script>
function pop_up(url){
  window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=800,height=400,directories=no,location=no')
}
</script>
  </head>
<body>
    <table width="1360" height="650">
      <tr style="background: #101928;" width="1360" height="60">
        <th><span style="font-size:20px;">Filtre de cautare</span></th>
        <th>
          <div>
              <div >
                <form action="board.php" method="post">
                  <input type="text" placeholder="Cauta locatie..." style="color:black;" size="50" name="search_box">
                  <input type="submit" value="Cauta" style="background-color: #1f3251">
                </form>
                <span >
                  <p style="position: center;">Bine ai venit, <?php echo $name; ?>!</p>
                </span>
              </div>
          </div>
        </th>
        <th>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><img src="<?php echo $profile_pic ?>">  Optiuni
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#" onclick="pop_up('URWeb/view/templates/contul_meu.php')">Contul meu</a></li>
              <li><a href="#" onclick="pop_up('URWeb/view/templates/cautarile_mele.php')">Cautarile mele</a></li>
              <li><a href="URWeb/controller/logout.php">Iesire</a></li>
            </ul>
          </div>
        </th>
      </tr>
      <tr>
        <td class = "menu" height="40"> </td>
        <td colspan="2" rowspan="6" class="border-radius"><div id="map"></div></td>
      </tr>
      <form action="board.php" method = "POST">
      <tr><td class = "menu" height="40">
      <input type='hidden' id='lat' name='lat' value='' class = "menu" height="40">
      <input type='hidden' name='lng' id='lng' value='' class = "menu" height="40">
      <input type="submit" value="Locatia mea" name="locatia_mea" style="background-color: #1f3251"></td></tr>
      </form>
      <form action="board.php" method = "POST">
      <tr>
        <td class = "menu" height="40">
            <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Arie de cautare<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li>
                  <input type="radio" name="arie" value="5000" id="item1">0-5000</input></br>
                </li>
                <li>
                  <input type="radio" name="arie" value="10000" id="item2">5001-10000</input></br>
                </li>
                <li>
                  <input type="radio" name="arie" value="15000" id="item3">>10000</input>
                </li>
            </ul>
            </div>
        </td>
      </tr>
      <tr><td class = "menu" height="45"><div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Locatii<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li>
                  <input type="radio" name="locatie" value="restaurant" id="item1">Restaurante</input></br>
                </li>
                <li>
                  <input type="radio" name="locatie" value="hospital" id="item3">Spitale</input>
                </li>
                <li>
                  <input type="radio" name="locatie" value="park" id="item1">Parcuri</input></br>
                </li>
                <li>
                  <input type="radio" name="locatie" value="university" id="item3">Centre de invatamant</input>
                </li>
                <li>
                  <input type="radio" name="locatie" value="grocery_or_supermarket" id="item3">Centru comercial</input>
                </li>
            </ul>
            </br></br>
        <input type="submit" value="Cauta" name="submit_cauta_dupa_optiuni" style="background-color: #1f3251">
        <div></br> sau </br></div>
        </form>
      </td></tr>
      <tr><td class = "menu" height="40"><form action="board.php" method="post">
                  </br><input type="submit" value="Afiseaza locatiile de pe Facebook" name="facebook_locations" style="background-color: #1f3251">
              </form>
      </td></tr>
      <tr><td class = "menu" style="vertical-align: bottom;"><a href="URWeb/view/templates/tw.html" target="_blank">Contact</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="URWeb/view/templates/aboutus.html" target="_blank">Despre noi</a></td></tr>
    </table>
  </body>
</html>
