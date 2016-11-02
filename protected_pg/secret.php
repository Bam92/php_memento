<?php
#$pwd_authorized = "kangourou";
#echo $_POST['secret'];
if (isset($_POST['secret']) AND $_POST['secret'] == "kangourou") {
	echo "Voici le code du coffre: <strong>1553-664J-55GD-6KL6-845P-548O-6985-86QW</strong>";
} else {echo "Contactez l'admin";}
?>