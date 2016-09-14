<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Site de candidature</title>
	<meta charset="utf-8"/>
</head>
	<body>

<?php session_start(); ?>

<h1>Installation 2/2</h1>
<h2><u>Configurateur de la base de donnée</u></h2>

<h3>Liste des tables:</h3>

<?php 

include('includes/gestiontables.php');

 ?>

 <p>Les listes des tables s'affiche ci-dessus, vous pouvez ajouter les champs que vous souhaitez</p>

 <h3><a href="index.php">Recommencer l'installation</a></h3>
 <h2><a href="fin.php">Finir l'installation</a></h2>
	</body>
</html>