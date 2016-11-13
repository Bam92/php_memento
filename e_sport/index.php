<!DOCTYPE html>
<html>
<head>
	<title>Le site des rencontres sportives</title>
</head>
<body>
	<?php include ("db_connection.php"); ?>
	<h1>Voici les sports existants</h1>
	<?php // Select from table design
    			$reponse = $bdd->query('SELECT design FROM sport ORDER BY design');

while ($donnees = $reponse->fetch()) {
	echo "<ul><li>" .$donnees['design']. 
	"</li></ul>";
}

$reponse->closeCursor();
?> 
<form method="post" action="index.php">
<input type="email" name="email" placeholder="me@abelmbula.url.ph"><input type="submit" name="Connexion">
</form>
<?php
if (isset($_POST['email'])) {
	$_POST['email'] = htmlspecialchars($_POST['email']);
	if (!empty($_POST['email'])) {
		if (preg_match("#^[a-z0 -9._-]+ @[a-z0 -9._-]{2 ,}\.[a-z]{2,4}$
#", $_POST['email'])) {
			$mail_client = $_POST['email'];
			$reponse = $bdd->query('SELECT mail FROM personne WHERE mail == $mail_client9');
	} else {
		echo "Saisissez une adresse mail valide";
	}
	} else {
		echo "Vous n'avez pas saisie d'adresse mail";
	}
}
?>
<p>Nouveau? <a href="ajout.php">Enregistrez-vous</a></p>
</body>
</html>