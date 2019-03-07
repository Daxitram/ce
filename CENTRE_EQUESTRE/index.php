<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Centre équestre</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<!-- ENTETE --> 
<div id="entete">
	<?php
	include "include/entete.php";
	?>
</div> 
 
<!-- CONTENEUR CENTRAL  --> 
<div id="centre"> 
 
	<!-- COLONNE GAUCHE  --> 
	<div id="menu"> 
	<title>testmenu</title>
	
		<?php
		include "include/menu.php";
		?>
	</div> 
 
	<!-- CONTENU  --> 
	<div id="navigation"> 
		<?php
		if(!isset($_GET["page"])){
			include "include/accueil.php";
		}else{
			include "pages/".$_GET["page"];
		}
		
		?>
	</div> 
	 
</div> 
 
<!-- PIED DE PAGE --> 
<div id="pied">
	<?php
	include "include/pied.php";
	?>
</div>

</body>
</html>