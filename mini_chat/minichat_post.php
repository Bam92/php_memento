<?php
// Recuperer donnees saisies
$pseudo = $_POST['pseudo'];
$msg = $_POST['message'];

// Connexion a la bdd
try {
	$bdd = new PDO ('mysql:host=localhost; dbname=php_training', 'root', '');
	
} catch (Exception $e) {
	die('Erreur: '.$e->getMessage());
}

// Insertion des donnees variables grace aux requetes preparees
$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :msg)');
$req->execute(array(
	'pseudo' => $pseudo, 
	'msg' => $msg));

// Redirection HTTP
header('Location: minichat.php');
#echo "Bien sauvegardee";
?>