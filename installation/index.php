<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Site de candidature</title>
	<meta charset="utf-8"/>
</head>
<body>

<h1>Installation 1/2</h1>
<h2><u>Configurateur du site</u></h2>

<form method="post" action="creabdd.php">
  <label>Nom du site web</label>
  <input type="text" name="sitename" required>
  <br>
  <label>Nom Base de donnée*</label>
  <input type="text" name="bddname" required>
  <br>
  <br>
  <label>Nom du serveur</label>
  <input type="text" name="hostname" required>
  <br>
  <label>Nom de l'utilisateur</label>
  <input type="text" name="bddusername" required>
  <br>
  <label>Mot de passe serveur</label>
  <input type="passsword" name="mdphost">
  <br>
  <p>*il est conseillé de choisir un nom similaire au nom du site et composé d'un préfixe.</p>
  <p><i><b>exemple:</b>uda_candidature ou encore iut_potula</i></p>
  <p><i><b>!NE PAS METTRE DE CARACTARE SPECIAUX (, ; - ' " etc)</b></i></p>
  <br>
  <input type="submit" value="Valider">
</form>

<script>
/*function allerFrontEnd() {
    window.location = '../'
}*/
</script>

</body>
</html>





