<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Site de candidature</title>
	<meta charset="utf-8"/>
</head>
	<body>

<?php
/******************************************/
session_start();

$link = mysql_connect($_SESSION['hostname'], $_SESSION['bddusername'], $_SESSION['mdphost']);
$link2 = mysql_select_db($_SESSION['bddname']);

if (!$link) {
	die('Connexion impossible : ' . mysql_error());
}

//ALTER TABLE  `user` ADD  `nom` VARCHAR( 100 ) NOT NULL ;
$sql = 'ALTER TABLE  participant ADD  admission VARCHAR( 100 ) NOT NULL';

$resultat=mysql_query($sql);

if (!$resultat) {
   echo "Erreur DB, impossible de lister les tables<br>";
   echo 'Erreur MySQL : ' . mysql_error();
}

// on cree ou vide le fichier configuration

    	if (file_exists('../configuration/config.php')) 
    	{
    		unlink('../configuration/config.php');
    		$nom_file = "../configuration/config.php";
			$texte = "<?php \$dbname = \"".$_SESSION['bddname']."\"; \$servername = \"".$_SESSION['hostname']."\"; \$username = \"".$_SESSION['bddusername']."\"; \$password = \"".$_SESSION['mdphost']."\"; ?>";
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}
    	else{
    		$nom_file = "../configuration/config.php";
			$texte = "<?php \$dbname = \"".$_SESSION['bddname']."\"; \$servername = \"".$_SESSION['hostname']."\"; \$username = \"".$_SESSION['bddusername']."\"; \$password = \"".$_SESSION['mdphost']."\"; ?>";
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}

	//FERMETURE DE INSERT

	$insert = '"; ?>';
	if (file_exists('../includes/insert.php')) {
		$fp = fopen('../includes/insert.php', 'a+');
		fwrite($fp, $insert);
		fclose($fp);
	}
	else{
		echo'fichier non trouvé';
	}

/******************************************/

if(file_exists("index.php"))
{
	if(rename("index.php", "installationfinie.php"))
	{
		echo "Le site web a été généré.<br><a href='../index.php'>Retour au site web</a>";
	}else
	{
		echo "Le configurateur a échoué! Recommencez";
	}
}else
{
	echo "le site web n'a pas été trouvé.";
}

session_destroy();
?>

</body>
</html>