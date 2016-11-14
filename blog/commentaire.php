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
$req = $bdd->prepare('SELECT id, titre, contenu, date_creation FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
$req->closeCursor();
?>
<div class="news">
	<h3>
	<?php
	echo htmlspecialchars($donnees['titre']);
	?>
	<em>le<?php echo htmlspecialchars($donnees['date_creation']);?></em>
	</h3>
	<p>
	<?php echo nl2br(htmlspecialchars($donnees['contenu']));?></p>
</div>
<h2>Commentaires</h2>
<?php
$reponse = $bdd -> query('SELECT id_billet, auteur, commentaire, date_creation AS date FROM Commentaires WHERE id_billet = $_GET["billet"] ORDER BY date_creation DESC');

while ($donnees = $reponse->fetch()) {
	?>
	<div>
	<p><strong>
	<?php echo htmlspecialchars($donnees['auteur']);?></strong>
	<em>le <?php echo htmlspecialchars($donnees['date']);?></em>
	</p>
	<p>
	<?php 

	echo nl2br(htmlspecialchars($donnees['commentaire'])); ?>
	
	</p>
</div>
<?php
}
$reponse->closeCursor();
?>

</body>
</html>