<!DOCTYPE html>
<html>
<head>
	<title>Insertion des donnees</title>
</head>
<body>
    <h1>Le site des rencontres sportives</h1>

    <!-- Inclusion de la pg de connexion a la bdd-->
    <?php include ("db_connection.php"); ?>
    <form method="post" action="ajout.php">
    	<fieldset>
    		<legend id="coordonnees">Vos coordonnees</legend>
    		<label for="nom">Nom:</label> <input type="text" name="nom"><br />
    		<label for="prenom">Prenom:</label> <input type="text" name="prenom"><br />
    		<label for="dept">Departement:</label> <input type="text" name="dept"><br />
    		<label for="email">Mail:</label> <input type="email" name="email">
    	</fieldset>

    	<fieldset>
    		<legend>Vos pratiques sportives</legend>
    		<label for="pratiaque_sport">Sport pratique</label>
    		<select name="pratiaque_sport" id="pratiaque_sport">
    			<option value="default" selected>Choisissez!</option>

    			<?php // Select from table design
    			$reponse = $bdd->query('SELECT design FROM sport ORDER BY design');

while ($donnees = $reponse->fetch()) {
	echo "<option>" .$donnees['design']. 
	"</option>";
}

$reponse->closeCursor();
?> 
    		</select>
    		<!-- Add new sport -->
    		<label for="new_sport">OU Ajouter a la liste :</label><input type="text" name="new_sport">
    		<input type="submit" name="Ajouter">
    		<?php
    		if (!empty($_POST['new_sport'])) { // J'ai remplace isset par !empty car j'avais des entrees vides
    			$req = $bdd->prepare('INSERT INTO sport(design) VALUES(?)');
				$req->execute(array($_POST['new_sport']));

				// Redirection HTTP
				header('Location: ajout.php');
    		}
    		    		
    		?>

    		<!-- Niveau du sportif --><br />
    		<label for="niveau_sport">Niveau</label>
    		<select name="niveau_sport" id="niveau_sport">
    			<option value="default" selected>Debutant</option>
    			<option value="confirme">Confirme</option>
    			<option value="pro">Pro</option>
    			<option value="supporter">Supporter</option>
    		</select>
    	</fieldset>

    	<!-- Insertion du sportif  ds la bdd-->
    	<?php
    	if (isset($_POST['nom']) AND isset($_POST['email']) ) { // For security purpose
    		$_POST['nom'] = htmlspecialchars($_POST['nom']);
    		$_POST['email'] = htmlspecialchars($_POST['email']);
    		if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
    			# Insert info in the db
    			$design = $_POST['pratiaque_sport'];
    			$id_sport = $bdd->query('SELECT id_sport FROM sport WHERE design = $design');
    			echo $_POST['pratiaque_sport'];
    			$req = $bdd->prepare('INSERT INTO personne(id_personne, nom, prenom, depart, mail)  VALUES(?, ?, ?, ?)');
    			
				$req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['dept'], $_POST['email']));
				$req = $bdd->prepare('INSERT INTO pratique(id_personne, id_sport, niveau) VALUES(personne.id_personne, $id_sport, ?)');
				$req->execute(array($_POST['pratiaque_sport']));

				echo "<p>Vos infos ont ete sauvegardee avec succes!</p>";

    		} else {
    			echo "L'adresse mail <strong>" .$_POST['email']. "</strong> n'est pas valide";
    		}
    	} else {
    		echo "Erreur: verifiez vos coordonnees";
    	}
    	?>
    	
    	<p><input type="submit" value="Envoyer"><input type="reset" value="Effacer"></p>
    </form>
    <p>Allez vers la page d'<a href="index.php">acceuil</a> ou vers la page d'<a href="#coordonnees">inscription</a>
</body>
</html>