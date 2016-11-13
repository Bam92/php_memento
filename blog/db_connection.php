<?php
try {
	$bdd = new PDO ('mysql:host=localhost; dbname=tp_blog', 'bam', '06011992');
	
} catch (Exception $e) {
	die('Erreur: '.$e->getMessage());
}
?>