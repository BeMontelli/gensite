<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Site de candidature</title>
	<meta charset="utf-8"/>
</head>
<body>

<?php

include('configuration/config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "INSERT INTO participant (nom, mailsur, naissance, CV, portfolio, parcour_idparcour, admission)
//VALUES ('".$_POST["nom"]."', '".$_POST["mailsur"]."', '".$_POST["naissance"]."', '".$_POST["CV"]."', '".$_POST["portfolio"]."', '".$_POST["parcour"]."', 'En Attente')";

include('includes/insert.php');

//var_dump($_POST);
$wtf = " ";
foreach($_POST as $key => $val){
	$wtf = $wtf.'"'.$val.'", ';
}

$sql = 'INSERT INTO participant ('.$insert.' admission)
VALUES ('.$wtf.' "En Attente")';

//echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Formulaire soumis.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
<br><a href="index.php">Retour site</a>

</body>
</html>
