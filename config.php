<?php
//définir vos paramètres dec connexion
// nom du serveur 
$host="localhost";
// nom utilisateur
$login="root";
// mot de passe
$pass="";
// nom de la base de données
$dbnom="webshops";
// créer la connexion avec la base de données
$bdd = mysqli_connect($host, $login, $pass, $dbnom);
// vérification de la connexion avec la BD
if (!$bdd)
	{
		echo "Connexion non-reussie à MySQL: ".mysqli_connect_error();
		echo "<BR />"; echo "<BR />";
	} 
else 
	{
		echo "Connexion reussie à MySQL";
		echo "<BR />"; echo "<BR />";
	}
// changer le jeu de caractères à utf8
mysqli_set_charset($bdd,"utf8");
?>

