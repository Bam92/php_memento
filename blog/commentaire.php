<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<style type="text/css">
		h1, h3 {
			text-align: center;
		}
		h3 {
			background-color: black;
			color: white;
			font-size: 0.9em;
			margin-bottom: 0px;
		}

		.news p {
			
		}
		.news {
			width: 70%;
			margin: auto;
			background-color: #CCCCCC;
			margin-top: 0px;
		}

		a {
			text-decoration: none;
			color: blue;
		}
	</style>
</head>
<body>
<p><a href="index.php">Retour a la liste des billets</a></p>

<?php include("db_connection.php"); // Connexion a la bdd?>

<?php
// Recuperation de billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();

// Insure that the post exists
if (empty($donnees)) {
		echo "Ce billet n'existe pas !";
	}
$req->closeCursor();
?>
<div class="news">
	<h3>
	<?php
	echo htmlspecialchars($donnees['titre']);
	?>
	<em>le<?php echo htmlspecialchars($donnees['date_creation_fr']);?></em>
	</h3>
	<p>
	<?php echo nl2br(htmlspecialchars($donnees['contenu']));?></p>
</div>
<h2>Commentaires</h2>
<?php
$req = $bdd -> prepare('SELECT id_billet, auteur, commentaire, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM commentaires WHERE id_billet = ? ORDER BY date_creation DESC');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch()) {
	
	?>
	<div>
	<p><strong>
	<?php echo htmlspecialchars($donnees['auteur']);?></strong>
	<em>le <?php echo htmlspecialchars($donnees['date_creation_fr']);?></em>
	</p>
	<p>
	<?php 

	echo nl2br(htmlspecialchars($donnees['commentaire'])); ?>
	
	</p>
</div>
<?php
}
$req->closeCursor();
?>

<!-- Add new comment -->
<form method="post" action="commentaire_post.php">
	<p>Laissez un commentaire</p>
	<input type="text" name="pseudo" placeholder="votre pseudo"><br />
	<textarea rows="10" name="commentaire"></textarea><br />
	<input type="hidden" name="id_billet" value="<?php echo $_GET['billet'];?>"><br />
	<input type="submit" value="Envoyer"><input type="reset" value="Annuler">
</form>

</body>
</html>