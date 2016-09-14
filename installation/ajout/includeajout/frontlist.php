<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Site de candidature</title>
	<meta charset="utf-8"/>
</head>
	<body>
<?php  
session_start();

//création des tables et champs
if (isset($_SESSION['nom_list'])) {
	$link = mysql_connect($_SESSION['hostname'], $_SESSION['bddusername'], $_SESSION['mdphost']);
	$link2 = mysql_select_db($_SESSION['bddname']);

	if (!$link) {
		die('Connexion impossible : ' . mysql_error());
	}

	//$sql = 'ALTER TABLE  '.$_SESSION['nomtable_current'].' ADD  '.$_SESSION['nom_list'].' VARCHAR( 100 ) NOT NULL'.'';
	$sql1 = 'CREATE TABLE '.$_SESSION['nom_list'].' (id'.$_SESSION['nom_list'].' BIGINT  AUTO_INCREMENT NOT NULL, nom'.$_SESSION['nom_list'].' VARCHAR(100) , PRIMARY KEY (id'.$_SESSION['nom_list'].') ) ;';
	$sql2 = 'ALTER TABLE participant ADD '.$_SESSION['nom_list'].'_id'.$_SESSION['nom_list'].' BIGINT(20)';
	$sql3 = 'ALTER TABLE participant ADD CONSTRAINT FK_participant_'.$_SESSION['nom_list'].'_id'.$_SESSION['nom_list'].' FOREIGN KEY ('.$_SESSION['nom_list'].'_id'.$_SESSION['nom_list'].') REFERENCES '.$_SESSION['nom_list'].' (id'.$_SESSION['nom_list'].');';

	/*echo "<br>";
	var_dump($sql1);
	echo "<br>";
	var_dump($sql2);
	echo "<br>";
	var_dump($sql3);
	echo "<br>";*/

	if (mysql_query($sql1, $link)) {

		//echo "table créee.<br>";
		if (mysql_query($sql2, $link)) {

			//echo "champ crée dans table participant.<br>";
			if (mysql_query($sql3, $link)) {

				//echo "contrainte créee.<br>";

			} else{
				echo 'problème:'.mysql_error();
			}

		} else{
			echo 'problème:'.mysql_error();
		}

	} else{
		echo 'problème:'.mysql_error();
	}

}

$afficher_questionnaire = $_SESSION['afficher_questionnaire'];

//affichage de la liste en front
if (isset($afficher_questionnaire)) {

	//print_r($_POST);

	$content = '<label for="name_list">'.$_SESSION['nom_list'].' </label><select name="'.$_SESSION['nom_list'].'" id="'.$_SESSION['nom_list'].'"><option value=""></option>';

	foreach($_POST as $key => $val){
		$content = $content.'<option value="'.$key.'">'.$val.'</option>';
		
		$sql = 'INSERT INTO '.$_SESSION['nom_list'].' VALUES ("", "'.$val.'")';
		if (mysql_query($sql, $link)) {
			//echo "Valeur entrée";
		}
		else{
			echo "Probleme:".mysql_error();
		}
	}

	$content = $content.'</select><br>';

	if (file_exists('../../../includes/form.php')) {
		$fp = fopen('../../../includes/form.php', 'a+');
		fwrite($fp, $content);
		fclose($fp);
		//echo $content;
		echo'<p>Ce champ sera affiché dans le questionnaire.</p>';
	}
	else{
		echo'fichier non trouvé';
	}

	//INCLUSION DANS INSERT

	$insert = ' '.$_SESSION['nom_list'].'_id'.$_SESSION['nom_list'].',';
	if (file_exists('../../../includes/insert.php')) {
		$fp = fopen('../../../includes/insert.php', 'a+');
		fwrite($fp, $insert);
		fclose($fp);
	}
	else{
		echo'fichier non trouvé';
	}

}
else{
	echo'<p>Ce champ ne sera pas affiché dans le questionnaire.</p>';
}

?>

<a href='../../gestiontables.php'>Retour</a>
	</body>
</html>