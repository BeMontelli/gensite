<?php 
$link = mysql_connect($_SESSION['hostname'], $_SESSION['bddusername'], $_SESSION['mdphost']);
$link2 = mysql_select_db($_SESSION['bddname']);

if (!$link) {
	die('Connexion impossible : ' . mysql_error());
}

//ALTER TABLE  `user` ADD  `nom` VARCHAR( 100 ) NOT NULL ;
$sql = 'ALTER TABLE  '.$_SESSION['nomtable_current'].' ADD  '.$variable.' VARCHAR( 100 ) NOT NULL'.'';

$resultat=mysql_query($sql);

if (!$resultat) {
   echo "Erreur DB, impossible de lister les tables<br>";
   echo 'Erreur MySQL : ' . mysql_error();
}

//ajout de la ligne en front-end
if (isset($afficher_questionnaire)) {

	$content = '<label>'.$variable.'</label><input type="text" name="'.$variable.'"/><br>';

	//INCLUSION DANS FORMULAIRE
	if (file_exists('../../includes/form.php')) {
		$fp = fopen('../../includes/form.php', 'a+');
		fwrite($fp, $content);
		fclose($fp);
		echo'<p>Ce champ sera affiché dans le questionnaire.</p>';
	}
	else{
		echo'fichier non trouvé';
	}

	//INCLUSION DANS INSERT

	$insert = ' '.$variable.',';
	if (file_exists('../../includes/insert.php')) {
		$fp = fopen('../../includes/insert.php', 'a+');
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
//fin ajout

?>

<?php

?>