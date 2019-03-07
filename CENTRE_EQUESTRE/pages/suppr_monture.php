<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php  
$connex=connexion_bd();
//requête SQL
//$req='select * from monture where numMonture=?';
//
 $sql = "DELETE FROM monture WHERE numMonture=?";

    // use exec() because no results are returned
    $connex->execute($req);
    ?>
</script>
</body>
</html>