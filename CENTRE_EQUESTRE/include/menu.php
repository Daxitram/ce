<!DOCTYPE html>
<html>
<head><meta charset="utf-8" />
	<meta name="A. BOURGEOIS" content="Site" />
	<title>Menu</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<style>#menu-accordeon {
  padding:0;
  margin:0;
  list-style:none;
  text-align: center;
  width: 180px;
}
#menu-accordeon ul {
  padding:0;
  margin:0;
  list-style:none;
  text-align: center;
}
#menu-accordeon li {
   background-color:#729EBF; 
   background-image:-webkit-linear-gradient(top, #729EBF 0%, #333A40 100%);
   background-image: linear-gradient(to bottom, #729EBF 0%, #333A40 100%);
   border-radius: 6px;
   margin-bottom:2px;
   box-shadow: 3px 3px 3px #999;
   border:solid 1px #333A40
}
#menu-accordeon li li {
   max-height:0;
   overflow: hidden;
   transition: all .5s;
   border-radius:0;
   background: #444;
   box-shadow: none;
   border:none;
   margin:0
}
#menu-accordeon a {
  display:block;
  text-decoration: none;
  color: #fff;
  padding: 8px 0;
  font-family: verdana;
  font-size:1.2em
}
#menu-accordeon ul li a, #menu-accordeon li:hover li a {
  font-size:1em
}
#menu-accordeon li:hover {
   background: #729EBF
}
#menu-accordeon li li:hover {
   background: #999;
}
#menu-accordeon ul li:last-child {
   border-radius: 0 0 6px 6px;
   border:none;
}
#menu-accordeon li:hover li {
  max-height: 15em;
}</style>
</head>
<body>
	<h2>Menu</h2>
	<ul id="menu-accordeon">
   <li><a href="index.php">Accueil</a>
   </li>
    <li><a href="index.php?page=liste_monture.php">Nos chevaux et poneys</a>

      <ul>
      <?php
//connexion bd MySQL
$connex=connexion_bd();
//requête SQL
$req='select * from monture';
//envoi de la requête
$res=$connex->query($req);
//curseur
while ( $row= $res->fetch(PDO::FETCH_OBJ)) {
  echo "<li>"."<a>".$row->nomMonture."</a>"."</li>";
}
  ?>
      </ul>
   </li>
   <li><a href="#">Gestion des montures</a>
   <ul>
     <li><a href="index.php?page=form_ajout_monture.php">Ajouter</a></li>
     <li><a href="index.php?page=gestion_monture.php">Modifier / Supprimer</a></li>
   </ul>
   </li>
   <li><a href="#">Planning des cours</a></li>
   <li><a href="#">Gestion des cavaliers</a>
      <ul>
      <li><a href="#">Ajouter</a></li>
     <li><a href="#">Modifier / Supprimer</a></li>
     </ul>
   </li>
</ul>
</body>
</html>