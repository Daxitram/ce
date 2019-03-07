<?php 
	function connexion_bd(){
	require('include/config.php');
	try{
		$connex = new PDO($source, $user, $passwd);
		return $connex;
	}catch(PDOException $e){
		echo "Erreur:".$e->getMessage();
		exit();
	}
		function verif_erreur_sql($res, $connex){
			if (!$res) {
				$err=$connex->errorInfo();
				echo "Erreur SQL:".$err[2];
				exit;
			}
		}
}
 ?>