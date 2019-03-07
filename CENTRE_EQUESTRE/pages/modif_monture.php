<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php //lien vers l'access a la bdd
          $connex=connexion_bd();  //on l'a fait qu'une fois meme si on doit refaire une boucle. On change juste le nom des autres variables


//REQUETE PREPARE POUR RECUPERER LE NumMonture DE gestion_monture
          $a=$_GET['numMonture'];
          $req2="SELECT * FROM monture where numMonture=$a";
          $resultat2=$connex->prepare($req2);                        //Methode avec query//
          $resultat2->bindValue(1,$_GET['numMonture']);   //le GET permet de récuperer la variable dans l'url
          $resultat2->execute();
          $ligne2=$resultat2 -> fetch(PDO::FETCH_OBJ);       //$ligne permet de prendre la premier ligne et fetch pointe sur le champ qu'on veut//


          if( isset($_GET['popup']) && ( $_GET['popup'] == "true") ){    //AFFICHER UN POPUP
          ?>  <script>
     alert('ESSYAER DE FAIRE AVEC UN POPUP A LA PLACE');
  </script><?php
          }

      if (isset($_POST["modifier"]))
      {
        $req= "UPDATE monture SET nomMonture=?, sexe=?, poids=?, taille=?, race=?, robe=?, photoMonture=?,
        codeTypeMonture=?, numCavalier=? where numMonture=$a";
        $insert=$connex->prepare($req);
        $insert->bindValue(1,$_POST['nomMonture']);
        $insert->bindValue(2,$_POST['type']);
        $insert->bindValue(3,$_POST['poids']);
        $insert->bindValue(4,$_POST['taille']);
        $insert->bindValue(5,$_POST['race']);
        $insert->bindValue(6,$_POST['robe']);
        $insert->bindValue(7,$_POST['photo']);

        if (isset($_POST['poney'])) {
          $insert->bindValue(8,"P");
          }else{
          $insert->bindValue(8,"C");  //ON AFFICHER C pour chevaux
        }

          if ($_POST['proprio']=="centre") {
            $insert->bindValue(9,NULL);
          }else{
            $insert->bindValue(9,$_POST['liste_proprio']);
          }
        $insert->execute();
//peremt de revenir a une autre page lorsque on a finit notre ajout de plus on passe une variable car la page demande un req prepare//?page=modif_monture.php&modif=$ligne2->numMonture&popup=true
        header("Location: index.php?page=info_monture.php&numMonture=$a");
      }
      ?>


<form method="post" action="">     <!-- Formulaire en auto soumission -->
    <table>
        <tr>
           <td>
                   <fieldset class="fieldset">
                   <legend>Information monture</legend>

                   <label class="text" for="nom">Nom Monture:</label> <input type="text" name="nomMonture" value="<?php echo $ligne2->nomMonture ;?>"/> </br></br>

<!-- PERMET DE PRES CHECKER LA CASE male ou femmelle -->
                   <?php if ($ligne2->sexe == "M"){
                     echo '<input type="radio" name="type" value="Male" checked />Mâle
                           <input type="radio" name="type" value="Femelle"/>Femelle </br></br>';
                   }else{
                     echo '<input type="radio" name="type" value="Male"/>Mâle
                           <input type="radio" name="type" value="Femelle" checked/>Femelle </br></br>';
                   }
                   ?>


                   <label class="text" for="p">Poids :</label> <input type="text" name="poids" value="<?php echo $ligne2->poids ;?>"/>kg</br></br>
                   <label class="text" for="t">Taille :</label> <input type="text" name="taille" value="<?php echo $ligne2->taille ;?>"/>cm</br></br>

<!-- PERMET DE PRES CHECKER LA CASE poney ou non -->
                   <?php if ($ligne2->codeTypeMonture == "P"){
                       echo '<input type="checkbox" name="poney" value="Poney" checked /> Poney</br></br>';
                       }else{
                       echo '<input type="checkbox" name="poney" value="Poney"/> Poney</br></br>';
                       }
                  ?>


                   <label class="text" for="nom">race :</label> <input type="text" name="race" value="<?php echo $ligne2->race ;?>"></br></br>



<label  class="text" ><span>  Robe(couleur):  </span></label>
  <select name="robe">

      <option VALUE="Alezan" <?php if($ligne2->robe == "Alezan"){echo"selected";}?> >Alezan</option>
      <option VALUE="Bai" <?php if($ligne2->robe == "Bai"){echo"selected";}?>>Bai</option>
      <option VALUE="Noir" <?php if($ligne2->robe == "Noir"){echo"selected";}?>>Noir</option>
      <option VALUE="Autres" <?php if($ligne2->robe == "Autre"){echo"selected";}?>>Autres</option>
</select></br></br>

                   <label class="text" for="nom">Nom photo :</label> <input type="text" name="photo" value="<?php echo $ligne2->photoMonture ;?>"></br>
                   </br>
                 </fieldset>
           </td>

           <td>
             <fieldset class="droite">
             <legend>Information propriétaire</legend>
</br>
<!-- JE CREER DES VARIABLES POUR VOIR SI C4EST NULL OU NON POUR ENSUITE REMPLIR LES CASES CENTRE OU PROPRIO -->
  <?php
           $check= "";
           $proprio= "";
            if($ligne2->numCavalier == null){   //on vérifie si le num cavalier est null ou pas
             $check= "checked";
           }else{
             $proprio= "checked";
           }
   ?>
             <input type="radio" name="proprio" value="centre" <?php echo $check; ?> />Centre équestre
           </br></br>
             <input type="radio" name="proprio" value="propriétaire" <?php echo $proprio; ?>/>propriétaire
           </br></br>



            <label  class="text" ><span>  Liste des cavaliers:  </span></label>
               <select name="liste_proprio">
                      <?php
//requête SQL
$req1='select * from cavalier order by nomCavalier';
//envoi de la requête
$res=$connex->query($req1);
//curseur
	echo "<option value=NULL>centre équestre</option>";
while ( $row= $res->fetch(PDO::FETCH_OBJ)) {
	echo "<option value=$row->numCavalier>"." ";
	
	echo $row->nomCavalier." ";
	echo $row->prenomCavalier."</option>"." ";}
	?>
               </select>
             </fieldset>
           </td>
      </tr>
    </table>

</br><center>
    <input type="submit" value="MODIFIER" name="modifier" class="btn_form_modif" />
</center>
</form>

</br> </br></br>

</body>
</html>