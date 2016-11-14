<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<title>Nouveau billet</title>
</head>
<body>
<form method="post" action="ajout_billet.php">
	<input type="text" name="titre" placeholder="titre" required> <br />
	<textarea rows="15" name="contenu"></textarea><br />
	<input type="submit" value="Envoyer">
</form>
<?php
include ("db_connection.php");
if (isset($_POST['titre']) AND isset($_POST['contenu'])) {
	if (!empty($_POST['titre'])) {
		$req = $bdd->prepare('INSERT INTO billets(titre, contenu, date_creation) VALUES(?, ?, NOW())');
				$req->execute(array($_POST['titre'], $_POST['contenu']));

				echo "Billet ajoute avec succes!";
	} else {
		echo "Revoyer le formulaire";
	}
}
?>
</body>
</html>