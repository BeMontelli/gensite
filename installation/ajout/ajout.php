<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Site de candidature</title>
	<meta charset="utf-8"/>
</head>
	<body>
<?php
session_start();

if (isset($_POST['nomtable'])) {
	$nomtable_current = $_POST['nomtable'];
	$_SESSION['nomtable_current'] = $nomtable_current;
	echo "Ajout d'un champ à la table : ".$_SESSION['nomtable_current'];
}

if (isset($_POST['ajout'])) {
	$text= 'text';
	$mail= 'mail';
	$date= 'date';
	$file= 'file';
	$url= 'url';
	$list= 'list';
?>
<br>
		<form method="POST" action="ajout.php">
<?php
	if(($_POST['ajout']) == $text){
?>
			<label>Ajouter Un texte:</label>
			<input type="text" name="text" required/>
			<input type="hidden" name="hide"/>
<?php
	}
	if(($_POST['ajout']) == $mail){
?>
			<label>Ajouter Un texte:</label>
			<input type="text" name="mail" required/>
			<input type="hidden" name="hide"/>
<?php
	}
	if(($_POST['ajout']) == $date){
?>
			<label>Ajouter Un texte:</label>
			<input type="text" name="date" required/>
			<input type="hidden" name="hide"/>
<?php
	}
	if(($_POST['ajout']) == $file){
?>
			<label>Ajouter Un texte:</label>
			<input type="text" name="file" required/>
			<input type="hidden" name="hide"/>
<?php
	}
	if(($_POST['ajout']) == $url){
?>
			<label>Ajouter Un url:</label>
			<input type="text" name="url" required/>
			<input type="hidden" name="hide"/>
<?php
	}
	if(($_POST['ajout']) == $list){
?>
			<label>Ajouter Une liste:</label>
			<input type="text" name="list" required/>
			<input type="hidden" name="hide"/>
			<label>Nombre de choix dans la liste:</label>
			<input type="text" name="nbchoix" required/>
<?php
	}
?>	
	<br><input type="radio" name="inclure" value="inclure" checked/> <label for="inclure">Inclure dans le questionnaire</label><br>
	<br><input type="submit" value="Valider" />
	</form>
	<br>

<?php
}
else{
	if(isset($_POST['inclure'])){ 
		$afficher_questionnaire = $_POST['inclure'];
		$_SESSION['afficher_questionnaire'] = $afficher_questionnaire;
	}
	if (isset($_POST['text']) || isset($_POST['mail']) || isset($_POST['date']) || isset($_POST['file']) || isset($_POST['url']))
	{	
		//include('includeajout/'.$_POST[].'.php');
	    if (isset($_POST['text']))
		{
		    $variable = $_POST['text'];
		    include('includeajout/text.php');
		}
		    if (isset($_POST['mail']))
		{
		    $variable = $_POST['mail'];
		    include('includeajout/mail.php');
		}
		if (isset($_POST['date']))
		{	
		    $variable = $_POST['date'];
		    include('includeajout/date.php');
		}
		if (isset($_POST['file']))
		{	
		    $variable = $_POST['file'];
		    include('includeajout/file.php');
		}
		if (isset($_POST['url']))
		{	
		    $variable = $_POST['url'];
		    include('includeajout/url.php');
		}
	    echo "<p>Champ ajouté à la table :".$_SESSION['nomtable_current'].'</p>';
	    echo '<p>Champ ajouté: '.$variable.'</p>';
	}

	if (isset($_POST['list']))
	{	
	    //include('includeajout/list.php');
	    $variable = $_POST['list'];
	    $_SESSION['nom_list'] = $variable;
	    //ICI CREER LA LISTE (TABLE+CHAMPS)
	    //CREATE TABLE parcours (idparcour BIGINT  AUTO_INCREMENT NOT NULL, PRIMARY KEY (idparcour) ) ;
	    //ALTER TABLE participant ADD CONSTRAINT FK_participant_parcours_idparcour FOREIGN KEY (parcours_idparcour) REFERENCES parcours (idparcour);
?>		
		Nom de la liste: <?php echo $variable; ?>
		<form method="post" action="includeajout/frontlist.php">
			
			<?php 
			$cptrchoix = 1;
			while ($cptrchoix <= $_POST['nbchoix']) {
			?>

				<label>Nom du choix numéro <?php echo $cptrchoix ?></label>
		 		<?php echo '<input type="text" name="'.$cptrchoix.'" required><br>'?>

		 		<?php $cptrchoix = $cptrchoix+1 ?>

			<?php } ?>

			<input type="submit" value="Valider"><br><br>
		
		</form>
<?php
	}
}
?>

 <br><a href="../gestiontables.php">Retour</a>
</body>
</html>