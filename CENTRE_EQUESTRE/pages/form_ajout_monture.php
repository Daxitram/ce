<!DOCTYPE html>
<meta charset="utf-8">
<html>
<?php 
//connexion bd MySQL
//$connex=connexion_bd();
	/*if(isset($_POST["ajouter"])){
	$req1='select * from monture 
	where
	nomMonture=?
	INSERT INTO monture VALUES (NULL,?)';
}*/

// pour savoir si tu est en post (appui sur le button submit)
//if(isset($_POST)) {
	// savoir si il y a eu le nom dans la requete http POST
	if(isset($_POST['ajouter'])) { // rajouter à ce if pour d'autres apptributs, par exemple isset($_POST['nom']) && isset($_POST['coleur'])
		$nom = $_POST['nom']; // nom car c'est le 'name' de l'input pour le nom
		$poids = $_POST['poids'];
		$taille = $_POST['taille'];
		$photo = $_POST['photo'];
		$race = $_POST['race'];
		$robe = $_POST['listeRobe'];
		$radioSexe = $_POST['radioSexe'];
		$prop = $_POST['prop'];
		if ($prop==0) {
			$prop=null;
		}
		$poney = $_POST['poney'];
		
		$connex = connexion_bd();
		$stmt = $connex->prepare("INSERT INTO monture(numMonture, nomMonture, sexe, poids, taille, photoMonture, race, robe, numCavalier, codeTypeMonture) VALUES (NULL,?,?,?,?,?,?,?,?,?)"); // on fait un prepare statement pour éviter les insertions sql
		$stmt->bindValue(1, $nom);
		$stmt->bindValue(2, $radioSexe);
		$stmt->bindValue(3, $poids);
		$stmt->bindValue(4, $taille);
		$stmt->bindValue(5, $photo);
		$stmt->bindValue(6, $race);
		$stmt->bindValue(7, $robe);
		$stmt->bindValue(8, $prop);
		$stmt->bindValue(9, $poney);
		$stmt->execute();
		
	}
//}
?>
<form method="post" action="">
<h1>informations monture</h1>
		<p>
	Nom <input type="text" name="nom"> <br><br>
	Poids <input type="text" name="poids">kg <br><br>
	Taille <input type="text" name="taille">cm<br><br>
	Nom photo <input type="text" name="photo"> <br><br>
	Race <input type="text" name="race"> <br><br>
	Mâle <input type="radio" name="radioSexe" value="M">
	Femelle <input type="radio" name="radioSexe" value="F"><br><br>
	Robe(couleur) <select name="listeRobe"><br><br>
		<option value="Autre">Autres</option>
		<option value="Alezan">Alezan</option>
		<option value="Bai">Bai</option>
		<option value="Noir">Noire</option>
		<option value="Blanc">Blanc</option>
		<option value="Marron">Marron</option>
	</select><br><br>
	Poney <input type="radio" name="poney" value="P"> Cheval <input type="radio" name="poney" value="C"><br>
	
	</p>
	<h1>informations propriétaire</h1>

	liste des cavaliers 
	<select name="prop" value="numCavalier"><br><br>
	<?php

//requête SQL
$req='select * from cavalier order by nomCavalier';
//envoi de la requête
$res=$connex->query($req);
//curseur
	echo "<option value=NULL>choisir</option>";
while ( $row= $res->fetch(PDO::FETCH_OBJ)) {
	echo "<option value=$row->numCavalier>"." ";
	echo $row->nomCavalier." ";
	echo $row->prenomCavalier."</option>"." ";}
	?>
	</select>
	<br><br>
	<br><br><input type="submit" name="ajouter" value="ajouter" onClick="Message()">
<script type="text/javascript">
   function Message() {
       var msg="Monture ajouté";
       console.log(msg)
       alert(msg);
   }
</script>
	</form>
</html>