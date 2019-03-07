<!DOCTYPE html>
<html>
	<head><meta charset="UTF-8" />
	<title>Gestion des chevaux et poneys</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/style2.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
.tableg td { color:#000000; text-decoration:none; } 
.tableg tr:hover td { color:#FF0000;background-color: #000000;} 
.tableg table {
	margin: auto;
/*border: medium solid blue;
border-collapse: collapse;*/
width: 90%;
}
.tableg th {
font-family: monospace;
border: thin solid #6495ed;
width: 15%;
padding: 5px;
background-color: #D0E3FA;
background-image: url(../images/accueil.jpg);

}
.tableg td {
font-family: sans-serif;

width: 15%;
padding: 5px;
text-align: center;
background-color: #ffffff;

}
.tableg caption {
font-family: sans-serif;
}</style>
	</head>
	<body>
<h2>Liste des chevaux et poneys</h2>
<?php
//connexion bd MySQL
$connex=connexion_bd();
//requête SQL
$req="select * from monture m left join cavalier c on c.numCavalier=m.numCavalier order by numMonture";
if (isset($_GET['action'])&&$_GET['action']=="Supprimer") {
	# code...
$del = "DELETE FROM monture WHERE numMonture=?";
$a=$connex->prepare($del);
$a->bindValue(1, $_GET['id']);
$a->execute();
}
 
//envoi de la requête
$res=$connex->query($req);
//curseur<td>type</td>
	echo "<table class='tableg'><tr><td><h1>Nom</h1></td><td> <h1>Photo</h1></td><td> <h1>Sexe</h1></td><td><h1> Race</h1></td><td> <h1>Propriétaire</h1></td><td><h1> Modifier</h1></td><td><h1> Supprimer</h1></td></tr>";
while ($row = $res->fetch(PDO::FETCH_OBJ)) {
	echo "<tr><td>".$row->nomMonture."</td>";
	//if ($row->photoMonture=="confetti.jpg") {
		//echo "<td><img src=images/$row->photoMonture height=10%>"."</td>";
	//}else{
	echo "<td><img src=images/$row->photoMonture width=200px height=150px>"."</td>";//}
	if($row->sexe=='M'){
		echo "<td>Male </td>";
	}else{
		echo "<td>Femelle</td>";
	}
	//echo "<td>".$row->sexe."</td>";
	echo "<td>".$row->race."</td>";
	if($row->numCavalier!=NULL){
		echo "<td>".$row->nomCavalier." ".$row->prenomCavalier."</td>";
	}else{
		echo "<td>Centre equestre</td>";
	}
	
	echo "<td><a  href=index.php?page=modif_monture.php&numMonture=$row->numMonture><i class='fa fa-edit' style=font-size:100px;/></a></td>";
	echo "<td><a  href=index.php?page=gestion_monture.php&action=Supprimer&id=$row->numMonture><i class='fa fa-trash' style=font-size:100px; /></a></td>";
}

	echo "</table>";

	?>
    <br><br>
	</body>
</html>