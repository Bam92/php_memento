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

</body>
</html>