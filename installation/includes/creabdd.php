<?php 

$link = mysql_connect($_SESSION['hostname'], $_SESSION['bddusername'], $_SESSION['mdphost']);

if (!$link) {
	die('Connexion impossible : ' . mysql_error());
}

$sql = 'DROP DATABASE IF EXISTS '.$bddname.'';
if (mysql_query($sql, $link)) {
	echo "Base de données existante supprimée.<br>";

	$sql2 = 'CREATE DATABASE '.$bddname.'';
	if (mysql_query($sql2, $link)) {
		echo "Base de données ".$bddname." créee.<br>";

		$sql3 = 'USE '.$bddname.'';
		if (mysql_query($sql3, $link)) {
			
			$sql4 = 'CREATE TABLE participant (idparticipant BIGINT  AUTO_INCREMENT NOT NULL, PRIMARY KEY (idparticipant) )';
			if (mysql_query($sql4, $link)) {
				echo "Table principale créee.<br>";
				echo "<br><a href='gestiontables.php'>Passer à l'étape deux</a>";
			} else {
				echo 'Erreur lors de la création de la table prinicaple : ';
				echo "<br><a href='index.php'>Retour</a>";
			}

		} else {
			echo 'Erreur lors de la séléction de la base de donnée : ';
			echo "<br><a href='index.php'>Retour</a>";
		}

	} else {
		echo 'Erreur lors de la création de la base de donnée : ';
		echo "<br><a href='index.php'>Retour</a>";
	}

} else {
	echo 'Erreur lors de la suppression de la premiere base de donnée : ';
	echo "<br><a href='index.php'>Retour</a>";
}

mysql_close($link);

 ?>