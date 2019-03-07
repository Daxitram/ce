<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Entête</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <style>
    html{font-family: sans-serif;}
    IMG.displayed {
      display: block;
      margin-left: auto;
      margin-right: auto }
      .connex fieldset{
       width: 300px;
       margin-left: auto;
     }
     .gauche{
      display: block;
      margin-left: 2px;
      margin-right: 2px;
      border: 2px groove (internal value);
      float:right;

    }
    .centre{
      display: block;
      margin-left: 2px;
      margin-right: 2px;
      border: 2px groove (internal value);
      width:200px;
      float:left;
    }
  </style>
  <?php
include "include/fonctions.php";
$connex=connexion_bd(); 

if (isset($_POST['connexion'])) {

	$a=$_POST['login'];
	$b=$_POST['password'];
  $req='SELECT * FROM connexion WHERE login=$a AND mdp=$b';
  $_SESSION['login']=$a;
  $_SESSION['mdp']= $_POST['numMoniteur'];

  if (isset($_SESSION['login'])) {

  	echo "<script>alert('test')</script>";

  }

  if ($_SESSION['login']=="admin") {

  	echo "<script>alert('admin chargé')</script>";
  	echo "admin chargé";

  }
}
?>
<fieldset class="gauche" style="width:400px;/*background-color: white; border-radius: 10px;*/">
  <legend><h4 style="color: red;width:400px;">Espace de connexion:</h4></legend>
  <form action="submit" method="post">	<table class="connex"><tr><td>
    <label class="text" for="log">Login</label></td><td><input type="text" name="login" /></td></tr><tr>
    <td><label class="text" for="pass">Mot de passe</label></td><td><input type="password" name="password" /></td></tr>
    <tr><td></td><td><input type="submit" value="Se connecter" name="connexion" class="btn_connex" /></td></tr></table>

  </form>

</fieldset>

<!--<div class="row">
  <div class="col-md-12">
    <form>
      <div class="form-group row">
        <label for="#login" class="col-sm-2 col-form-label">Login</label>
        <input type="text" name="login" id="login" class="col-sm-2 form-control"/>
      </div>
      <div class="form-group row">
        <label for="#password" class="col-sm-2 col-form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="col-sm-2 form-control"/><br>
      </div>
      <div class="form-group row">
        <label for="#connexion" class="col-sm-2 col-form-label"></label>
        <input type="submit"  name="connexion" id="connexion" class="col-sm-2 btn btn-success"/><br>
      </div>
    </form>
  </div>-->
</div><img class="gauche" src="images/logo_pegase.png" width="200px" height="200px" />
<img class="gauche" src="images/AAAFCF3L0HQT-C10001.gif"  height="200px" width="200px" />
<img class="gauche" src="images/FFE.jpg" width="200px" height="200px" />

<h2>Centre équestre des Pégases</h2><br><br><br><br><br><br><br><br>


</head>
<body>
	
	
	
</body>
</html>

