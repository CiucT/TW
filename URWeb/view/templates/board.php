<?php
//error_reporting(0);
include_once("URWeb/controller/fb_date.php");
include_once("URWeb/controller/search.php");
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--       <link rel="stylesheet" type="text/css" href="../static/css/board.css"> -->
      <script async defer src="URWeb/view/static/js/map.js"></script>
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
        <td colspan="2" rowspan="5" class="border-radius"><div id="map"></div></td>
      </tr>
      <tr>
        <td class = "menu" height="40">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Oras
            <span class="caret"></span></button>
            <ul class="dropdown-menu" style="overflow-y:scroll; height:200px;">
            <li>
            <form action="board.php" method = "POST">
                <input type="radio" name="oras" value="Alba" id="item1">Alba</input></br>
                <input type="radio" name="oras" value="Argeș" id="item2">Argeș</input></br>
                <input type="radio" name="oras" value="Arad" id="item3">Arad</input></br>
                <input type="radio" name="oras" value="Argeș" id="item2">Argeș</input></br>
                <input type="radio" name="oras" value="Bacău" id="item3">Bacău</input></br>
                <input type="radio" name="oras" value="București" id="item3">București</input></br>
                <input type="radio" name="oras" value="Bârlad" id="item3">Bârlad</input></br>
                <input type="radio" name="oras" value="Bistriţa" id="item3">Bistriţa</input></br>
                <input type="radio" name="oras" value="Bihor" id="item3">Bihor</input></br>
                <input type="radio" name="oras" value="Bistrița-Năsăud" id="item3">Bistrița-Năsăud</input></br>
                <input type="radio" name="oras" value="Brăila" id="item3">Brăila</input></br>
                <input type="radio" name="oras" value="Botoșani" id="item1">Botoșani</input></br>
                <input type="radio" name="oras" value="Brașov" id="item2">Brașov</input></br>
                <input type="radio" name="oras" value="Buzău" id="item2">Buzău</input></br>
                <input type="radio" name="oras" value="Cluj" id="item2">Cluj</input></br>
                <input type="radio" name="oras" value="Călărași" id="item2">Călărași</input></br>
                <input type="radio" name="oras" value="Caraș-Severin" id="item2">Caraș-Severin</input></br>
                <input type="radio" name="oras" value="Constanța" id="item2">Constanța</input></br>
                <input type="radio" name="oras" value="Covasna" id="item2">Covasna</input></br>
                <input type="radio" name="oras" value="Dâmbovița" id="item2">Dâmbovița</input></br>
                <input type="radio" name="oras" value="Dolj" id="item2">Dolj</input></br>
                <input type="radio" name="oras" value="Gorj" id="item2">Gorj</input></br>
                <input type="radio" name="oras" value="Galați" id="item2">Galați</input></br>
                <input type="radio" name="oras" value="Giurgiu" id="item2">Giurgiu</input></br>
                <input type="radio" name="oras" value="Hunedoara" id="item2">Hunedoara</input></br>
                <input type="radio" name="oras" value="Harghita" id="item2">Harghita</input></br>
                <input type="radio" name="oras" value="Ilfov" id="item2">Ilfov</input></br>
                <input type="radio" name="oras" value="Ialomița" id="item2">Ialomița</input></br>
                <input type="radio" name="oras" value="Iasi" id="item2">Iași</input></br>
                <input type="radio" name="oras" value="Mehedinți" id="item2">Mehedinți</input></br>
                <input type="radio" name="oras" value="Maramureș" id="item2">Maramureș</input></br>
                <input type="radio" name="oras" value="Mureș" id="item2">Mureș</input></br>
                <input type="radio" name="oras" value="Neamț" id="item2">Neamț</input></br>
                <input type="radio" name="oras" value="Olt" id="item2">Olt</input></br>
                <input type="radio" name="oras" value="Prahova" id="item2">Prahova</input></br>
                <input type="radio" name="oras" value="Sibiu" id="item2">Sibiu</input></br>
                <input type="radio" name="oras" value="Sălaj" id="item2">Sălaj</input></br>
                <input type="radio" name="oras" value="Satu Mare" id="item2">Satu Mare</input></br>
                <input type="radio" name="oras" value="Suceava" id="item2">Suceava</input></br>
                <input type="radio" name="oras" value="Tulcea" id="item2">Tulcea</input></br>
                <input type="radio" name="oras" value="Timiș" id="item2">Timiș</input></br>
                <input type="radio" name="oras" value="Teleorman" id="item2">Teleorman</input></br>
                <input type="radio" name="oras" value="Vâlcea" id="item2">Vâlcea</input></br>
                <input type="radio" name="oras" value="Vrancea" id="item2">Vrancea</input></br>
                <input type="radio" name="oras" value="Vaslui" id="item2">Vaslui</input></br> 
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
                  <input type="radio" name="arie" value="500" id="item1">500</input></br>
                </li>
                <li>
                  <input type="radio" name="arie" value="500" id="item2">5000</input></br>
                </li>
                <li>
                  <input type="radio" name="arie" value="10000" id="item3">10000</input>
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
        </form>
      </td></tr>
      <tr><td class = "menu" style="vertical-align: bottom;"><a href="URWeb/view/templates/tw.html" target="_blank">Contact</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="URWeb/view/templates/aboutus.html" target="_blank">Despre noi</a></td></tr>
    </table>
  </body>
</html>
