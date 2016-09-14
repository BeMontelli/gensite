<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Site de candidature</title>
	<meta charset="utf-8"/>
</head>
	<body>
	<?php 

	//mise en session des variables et creation BDD
	 if (isset($_POST['sitename']) && isset($_POST['bddname'])) {

	 	session_start ();

	 	$_SESSION['sitename'] = $_POST['sitename'];
		$_SESSION['bddname'] = $_POST['bddname'];
		$_SESSION['hostname'] = $_POST['hostname'];
		$_SESSION['bddusername'] = $_POST['bddusername'];
		$_SESSION['mdphost'] = $_POST['mdphost'];


		$bddname = $_POST['bddname'];
		$hostname = $_POST['hostname'];
		$bddusername = $_POST['bddusername'];
		$mdphost = $_POST['mdphost'];
		//header ('location: installation.php');

		//création du fichier front-end et ériture du nom du site
		if (file_exists('../accueil.php')) 
    	{
	       unlink('../accueil.php');
	       $nom_file = "../accueil.php";
			$texte = $_SESSION['sitename'].'<br>Formulaire';
			$texte = $texte."<br><a href='formulaire.php'>Le formulaire</a>";
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}else{
    		$nom_file = "../accueil.php";
			$texte = $_SESSION['sitename'].'<br>Formulaire';
			$texte = $texte."<br><a href='formulaire.php'>Le formulaire</a>";
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}

		//création du fichier formulaire et ériture du nom du site
		if (file_exists('../formulaire.php')) 
    	{
	       unlink('../formulaire.php');
	       $nom_file = "../formulaire.php";
			$texte = "Le nom du site web est ".$_SESSION['sitename'].'<br>Formulaire<br>';
			$texte = $texte."<form method='POST' action='retourform.php'><?php include('includes/form.php') ?><br><input type='submit' value='Envoyer'></form><a href='accueil.php'>Retour</a>";
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}else{
    		$nom_file = "../formulaire.php";
			$texte = "Le nom du site web est ".$_SESSION['sitename'].'<br>Formulaire<br>';
			$texte = $texte."<form method='POST' action='retourform.php'><?php include('includes/form.php') ?><br><input type='submit' value='Envoyer'></form><a href='accueil.php'>Retour</a>";
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}

    	// on cree ou vide le fichier form
    	if (file_exists('../includes/form.php')) 
    	{
    		unlink('../includes/form.php');
    		$nom_file = "../includes/form.php";
			$texte = '';
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}
    	else{
    		$nom_file = "../includes/form.php";
			$texte = '';
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}

    	// on cree ou vide le fichier insert
    	if (file_exists('../includes/insert.php')) 
    	{
    		unlink('../includes/insert.php');
    		$nom_file = "../includes/insert.php";
			$texte = '<?php $insert = "';
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}
    	else{
    		$nom_file = "../includes/insert.php";
			$texte = '<?php $insert = "';
			$f = fopen($nom_file, "x+");
			fputs($f, $texte );
			fclose($f);
    	}

		//CREATE DATABASE $_SESSION['bddname']
		include('includes/creabdd.php');
	 } 
	?>
	</body>
</html>
<a href=""></a>