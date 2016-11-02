<p>Voici les donnes du client <?php echo $_POST['prenom']; ?></p>

<h1>Client</h1>

<ul>
	<li>Nom: <?php echo $_POST['nom']; ?></li>
	<li>Prenom: <?php echo $_POST['prenom']; ?></li>
	<li>Mail: <?php echo $_POST['email']; ?></li>
	<li>Ville: <?php echo $_POST['ville']; ?></li>
	<li>Adresse postal: <?php echo $_POST['post']; ?></li>
	
</ul>

<h1>Facture</h1>
<div>Prix HT: <?php echo $_POST['ht']; ?></div>
<div>Taux TVA: <?php echo $_POST['tva']; ?>%<br>Montant TVA: <?php 
$montant_tva= $_POST['tva']/100 * $_POST['ht']; echo $montant_tva ?></div>
<div>Prix TTC: <?php echo $_POST['ht']+$montant_tva; ?></div>

<!-- Traitement du fichier envoye-->
<?php
// D'abord s'assurer que le visiteur a uploader le fichier
if (isset($_FILES['my_file']) AND $_FILES['my_file'] ['error'] == 0) {
	# En suite la taille est bien respectee 1Mo max
	if ($_FILES['my_file'] ['size'] <= 1000000) {
		# Enfin s'assurer que seul le .zip est uploader
		$info_fichier = pathinfo($_FILES['my_file'] ['name']);
		$extension_upload = $info_fichier['extension'];
		echo $extension_upload;
		$extension_authorize  = array('zip');

		if (in_array($extension_upload, $extension_authorize)) {
			# On valide l'envoi et on stocke le fichier

			move_uploaded_file($_FILES['my_file'] ['tmp_name'], 'uploads/ ' . basename($_FILES['my_file'] ['name']));

			echo "Votre fichier a ete bien envoye";
			echo $extension_upload;
		}
	}

}
?>