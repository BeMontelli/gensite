<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Site de candidature</title>
	<meta charset="utf-8"/>
</head>
	<body>

<?php session_start(); ?>

<a href="gestiontables.php">Retour</a><br>

<p>Choisissez deux tables à joindre</p>
<form method="post" action="includes/jointure.php">	
<?php

include('includes/joindretables.php');

?>
</form>
<p><b>Limitez vos choix à deux tables!</b></p>
<?php

 ?>


	</body>
</html>