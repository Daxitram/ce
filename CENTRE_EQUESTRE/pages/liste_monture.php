<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	
	<title>Chevaux et poneys</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/style2.css" type="text/css" />

</head>
<body>
<h2>Nos chevaux et poneys</h2>
<p>Liste des chevaux et poneys:</p>
<?php
//connexion bd MySQL

$connex=connexion_bd();
//requête SQL
$req='select * from monture';
//envoi de la requête
$res=$connex->query($req);
//curseur
while ( $row= $res->fetch(PDO::FETCH_OBJ)) {
	echo "<fieldset>";
	echo "<a href=index.php?page=info_monture.php&numMonture=$row->numMonture><img src='images/info_monture.png' width=5% height=5%/></a>";
	echo "<br>".$row->numMonture." ";
	echo "<legend>".$row->nomMonture."</legend>";

	if ($row->codeTypeMonture=='C'){
		echo "CHEVAL";
	}else{
		echo "PONEY";
	} 
	echo "<br>";
	echo "<img src=images/$row->photoMonture  width=25% height=25%>"."</br>"."</br>";
	echo "</fieldset>";
}
	
	?>
</body>
</html>
  
