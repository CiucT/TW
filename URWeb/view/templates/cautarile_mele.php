<?php
include_once("../../controller/cautari_database.php");
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Cautarile mele</title>
      <link rel="stylesheet" href="../static/css/cautarile_mele.css" />
  </head>
<body>
	<div class="title"> Cautarile mele </div>
	<ul>
	<?php 
	for($i = 0; $i < count($adresa_array); $i = $i + 1){
	?>
		<li><div>Locatie: <?php echo $descriere_array[$i]; ?> Delete</a></td></div>
			<div>Adresa: <?php echo $adresa_array[$i]; ?> </td></div>
		</li>
	<a href="../../controller/sterge_cautari.php?id=<?php echo $id_place_array[$i]; ?>">Sterge locatia din cautarile mele.</a>
	<?php } ?>
	</ul>

</body>
</html>