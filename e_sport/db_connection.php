<?php
try {
	$bdd = new PDO ('mysql:host=localhost; dbname=e_sport', 'root', '');
	
} catch (Exception $e) {
	die('Erreur: '.$e->getMessage());
}
?>