<?php
include_once("../../controller/cautari_database.php");
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Cautarile mele</title>
  </head>
<body>
	<div> Cautarile mele </div>
	<ul>
	<?php 
	for($i = 0; $i < count($adresa_array); $i = $i + 1){
	?>
		<li><div>Locatie: <?php echo $descriere_array[$i]; ?> </div>
			<div>Adresa: <?php echo $adresa_array[$i]; ?> </div>
		</li>
	<?php } ?>
	</ul>

</body>
</html>