<form method="post" action="minichat_post.php">
	<input type="text" name="pseudo" placeholder="tapez votre pseudo" /><br />
	<textarea name="message"></textarea><br />
	
		<input type="submit" value="Envoyer">
</form>

<h1>Derniers posts</h1>
<?php
// Recuperer donnees saisies
/*$pseudo = $_POST['pseudo'];
$msg = $_POST['message'];*/

// Connexion a la bdd
try {
	$bdd = new PDO ('mysql:host=localhost; dbname=php_training', 'root', '');
	
} catch (Exception $e) {
	die('Erreur: '.$e->getMessage());
}

// Recuperer des donnees variables grace aux requetes preparees???
#$req = $bdd->prepare('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');
#$req->execute(array($_GET['pseudo'], $_GET['message']));
#echo "<strong>$_GET['pseudo']</strong>: $_GET['message']<br>";
// Affichage de donnees (attention securite htmlspecialchars)
while ($donnees = $reponse->fetch()) {
	echo "<p><strong>" .htmlentities($donnees['pseudo']). 
	"</strong>: " .htmlspecialchars($donnees['message']).
	"</p>";
}

$reponse->closeCursor();
?>