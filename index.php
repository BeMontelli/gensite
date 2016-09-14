<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Site de candidature</title>
	<meta charset="utf-8"/>
</head>
<body>

<?php
	if(file_exists('installation/index.php'))
	{
		header('Location: installation/');
		exit;
	}
	else
	{
		header('Location: accueil.php');
		exit;	
	}
?>


</body>
</html>
