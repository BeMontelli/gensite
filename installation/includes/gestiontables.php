<?php

$link = mysql_connect($_SESSION['hostname'], $_SESSION['bddusername'], $_SESSION['mdphost']);
$link2 = mysql_select_db($_SESSION['bddname']);

if (!$link) {
	die('Connexion impossible : ' . mysql_error());
}

//AFFICHER LES TABLES
$sql = 'SHOW TABLES FROM '.$_SESSION['bddname'].'';

$resultat=mysql_query($sql); 
if (!$resultat) {
   echo "Erreur DB, impossible de lister les tables<br>";
   echo 'Erreur MySQL : ' . mysql_error();
   exit;
}

?>

<ul>

<?php
while ($row = mysql_fetch_row($resultat)) {
	
	if($row[0] == "participant"){
		echo "<li><b><u>Table Principale : ".$row[0]."</u></b><br>";
		echo "<i>Un champ d'admission des particpants sera automatiquement ajouté.</i><br>";
	}
	else{
		echo "<li><b>Table : ".$row[0]."</b><br>";
	}

?>
<br>
<form method="POST" action="ajout/ajout.php">
	<label>Ajouter:</label>
	<select name="ajout">
	  <option value="text" name="text" id="text">Un champ texte</option>
	  <option value="mail" name="mail" id="mail">Un mail</option>
	  <option value="date" name="date" id="date">Une date</option>
	  <option value="file" name="file" id="file">Un Fichier</option>
	  <option value="url" name="url" id="url">Un url</option>
	  <option value="list" name="list" id="list">Une liste</option>
	</select>
	<input type="hidden" name="nomtable" value="<?php echo $row[0] ?>"/>
	<input type="submit" value="Valider" />
</form>
<br>

<?php

    $result = mysql_query("SHOW COLUMNS FROM ".$row[0]."");
	if (!$result) {
	   echo 'Impossible d\'exécuter la requête : ' . mysql_error();
	   exit;
	}
	if (mysql_num_rows($result) > 0) {
	   while ($row = mysql_fetch_assoc($result)) {
	   echo $row['Field'].' -> Type: '.$row['Type'].'<br>';
		}
	}
?>

</li><br>

<?php
}
?>

</ul>

<?php

mysql_close($link);

 ?>