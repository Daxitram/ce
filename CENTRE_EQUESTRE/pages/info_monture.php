<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
//connexion bd MySQL
$connex=connexion_bd();
//requête SQLINNER JOIN cavalier on monture.numCavalier=cavalier.numCavalier
$req='SELECT * from monture  WHERE numMonture=? ';
//envoi de la requête
$res=$connex->prepare($req);
$res->execute(array($_GET['numMonture']));
$row = $res->fetch(PDO::FETCH_OBJ);
echo "<img src=images/$row->photoMonture width=20% height=20%>"."</br>";
echo $row->nomMonture." "."</br>";
	


	if ($row->codeTypeMonture=='C'){
	echo ""."CHEVAL";
	}else{
	echo ""."PONEY";
	}
	echo "</br>";
	echo "Numéro   ".$row->numMonture."</br>";
		if ($row->sexe=='F'){
	echo "FEMELLE "."</br>";
	}else{
	echo "MALE "."</br>";
	}
	echo $row->poids."kg"."</br>";
	echo $row->taille."cm "."</br>";
	echo $row->race."</br>";
	echo $row->robe."</br>";
	if ($row->numCavalier!=NULL) {
		echo "Propriétaire : ".$row->numCavalier." ";
		//echo $row->nomCavalier." ".$row->prenomCavalier;
	}else{
		echo "Centre équestre";
	}
	
	?>
</body>
</html>
