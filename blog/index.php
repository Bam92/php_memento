<!DOCTYPE html>
<html>
<head>
	<title>Super Blog</title>
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
			background-color: #CCCCCC;
			margin-top: 0px;
		}
		.news {
			width: 70%;
			margin: auto;
			
		}

		a {
			text-decoration: none;
			color: blue;
		}
	</style>
</head>
<body>
<?php include ("db_connection.php"); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog </p>
<?php
$reponse = $bdd -> query('SELECT id, titre, contenu, date_creation AS date FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $reponse->fetch()) {
	?>
	<div class="news">
	<h3>
	<?php echo htmlspecialchars($donnees['titre']);?>
	<em>le <?php echo htmlspecialchars($donnees['date']);?></em>
	</h3>
	<p>
	<?php 

	echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
	
	<br />
	<em><a href='commentaire.php?billet=<?php echo $donnees["id"]; ?>'>commentaires</a></em>
	</p>
</div>
<?php
}
$reponse->closeCursor();
?>
</body>
</html>