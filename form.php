
<form method="post" action="cible.php">
	<fieldset>
		<legend>Adresse du client</legend>
		<input type="text" name="nom" placeholder="tapez votre nom"><br>
		<input type="text" name="prenom" placeholder="tapez votre prenom"><br>
		<input type="email" name="email" placeholder="tapez votre adresse"><br>
		<input type="text" name="ville" placeholder="tapez votre ville"><br>
		<input type="number" name="post" placeholder="tapez votre adresse postal"><br>
		<input type="submit" value="Envoyer">
	</fieldset>
<!-- Calcul en PHP-->
<input type="number" name="ht" placeholder="tapez le prix ht"><br>
<input type="number" name="tva" placeholder="tapez le taux de la tva">%<br>
<input type="submit" value="Calculer">

</form>

<p>Formulaire d'envoi de fichier</p>
<form method="post" action="cible.php" enctype="multipart/form-data">
	<p>Telecharger le fichier:<br>
	<input type="file" name="my_file" /><br />
	<input type="submit" value="Envoyer">
	</p>
</form>
<?php 
#Exercice 1 6 7

 ?>