<!DOCTYPE html>
<html>
<head>
	<title>Nouveau commentaire</title>
</head>
<body>
<?php include("db_connection.php"); // Connexion a la bdd?>
<?php
if (isset($_POST['pseudo']) AND isset($_POST['commentaire'])) {
	if (!empty($_POST['pseudo']) AND !empty($_POST['commentaire'])) {
		
		// Insert new comment into the db
		$req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_creation) VALUES(?, ?, ?, NOW())');
				$req->execute(array($_POST['id_billet'], $_POST['pseudo'], $_POST['commentaire']));

				
				// Redirection HTTP
header('Location: commentaire.php?billet= .$_POST["id_billet"]'); // Voir forum car ca ne marche pas ici
echo "commentaire ajouté avec succes!";
		/*echo "<p>Voici les infos du Nouveau commentaire</p>";
		echo "Pseudo: " .$_POST['pseudo']. "Id_billet :" .$_POST['id_billet']. "commentaire: " .$_POST['commentaire'];*/
	} else {
		echo "Revoyer le formulaire";
	}
}?>
</body>
</html>