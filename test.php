<! doctype html>
<html>
    <head></head>
    <body>
<?php
  /*$x = "PostgreSQL";
  $y = "MySQL";
  $z = &$x;
  $x = "PHP 5";
  $y = &$x;
  
  echo $x;
  echo $y;
  echo $GLOBALS["x"]; */// Recherche approfondie sur la variable global
echo "La langue de ton navigateur est ".$_SERVER["HTTP_ACCEPT_LANGUAGE"]." et l'adresse IP du serveur est ".$_SERVER["SERVER_ADDR"].
    " vous exécutez actuellement le fichier ".$_SERVER["PHP_SELF"]
?>
        <!-- Message de bienvenu-->
        <h1>Welcome</h1>
        <?php
         $age = 25;
         $sex = "M";
             if ($age >= 21 && $age <= 40 && $sex != "F") { // Pourquoi ça ne marche pas tel que souhaité???
             
                 echo "Bienvenue Madame! Vous avez ". $age. " ans";
                     
             } else {
                 echo "Partez d'ici, vous n'êtes pas femmes";}
		?> 
		
		<h1>Password</h1>
		<?php // Générer un mot de passe litéral
		for ($i=1; $i<6; $i++) {
			$nb = mt_rand(55,90);
		    $code = chr($nb);
		}
		echo "Votre mot de passe est: _" .$code.$nb. "@";
        ?>
		<h1>Tirage d'un multiple</h1>
		<?php
		$n=1;
		while($n%3!=0 && $n%5!=0)
		{
			$n = mt_rand(1,500);
			echo $n, "&nbsp; / " ;
		}
		
		?>
		
		<h1>Tirage d'un nombre pair et d'un nombre impair</h1>
		<?php
		//$n = rand(1,100);
		$n = 1;
		while($n%2!=0)
		{
		$n = mt_rand(1,100);
		echo $n."<br />";
		$n++;
		}
		
		?>
		
		<h1>Afficher nbre de tour</h1>
		<?php
		//$n = rand(1,100);
		$n = mt_rand(1,101);
		echo $n;
		while($i!=$n)
		{
		
		echo $i."<br />";
		$i++;
		}
?>
		<h1>Numéros d'immatriculation</h1>
		<?php
		//$n = rand(1,100);
		$i = 1;
		
		while ($i<=10)
		{
			$lt = mt_rand(100,1000);
		
		echo "Votre code d'immatriculation est " .$lt." PHP 75 <br />";
		$i++;

		/*"<h1>Superieur 100</h1>"
		if ($lt%100=0) {
			$tab[$lt];
			echo $tab;
		}*/
		}
		
		?>

		<h1>Exercice 5 p93</h1>
		<?php
		#$nb_fixe = 225;
		$nb_alea = mt_rand(2,8);
		echo $nb_alea;
		#$i = 1;
		
		#for ($i=$nb_alea; $i!=$nb_fixe ; $i++) { 
			# code...
		#	echo $i. "<br>";
		#}
		/*while ($nb_alea!=$nb_fixe)
		{
			
		
		$i++;

		}
		echo $i. "<br />";
		echo $nb_alea;*/
		
		?>

		<h1>Traitement des chaines des caractères</h1>
		<p>Exercices choisis 1, 2, 9</p>

		<h2>Exercice 1</h2>
		<?php
		echo "<p> ce paragraphe est ecrit en minuscule. Le paragraphe suivant est ecrit avec initial majuscule</p>";
		$txt_initial="<p>je suis en minuscule. c genial pHP</p>";
		echo $txt_initial;
		
		$txt_initial=strtoupper($txt_initial);
		echo "Tout en majuscule:<br><strong>". $txt_initial. "</strong><br>";
		$txt_initial=strtolower($txt_initial);
		echo "Tout en miniscule:<br><strong>". $txt_initial. "</strong><br>";
		$txt_initial=ucwords($txt_initial);// First letter in caps
		echo "<strong>" .$txt_initial. "</strong>";
		?>

		<h2>Exercice 2</h2>
		<?php
		$txt = "PHP 5";
		$nbr_mot = strlen($txt);
		echo "Longueur de mot" .$nbr_mot. "<br>";
		for ($i=0; $i < $nbr_mot; $i++) { 
			echo "<h1>$txt[$i]</h1>";
			#echo $i. "<br>";
		}
		?>

		<h2>Exercice 9</h2>
		<?php
		$chaine_prin="PHP 5 \n est meilleur que ASP \n et JSP \n reunis";
		echo $chaine_prin. "<br>";
		$chaine_prin=str_replace("\n", "<br>", $chaine_prin);
		echo $chaine_prin;
		?>
   </body>
</html>
