<!--
/***********************************************************/
//  Script realise par Oriane
//  Crée le 18/01/2015 
//  Projet: Parrainage Hymae 2015
//  Fichier tampon pour relier les modules de l'application
/************************************************************/
-->


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parrainage HYMAE 2015</title>
    </head>
    <body>
        <?php
             $lienA='location:Telechargements/photos.php' ; //Lien vers le telechargements des infos vres la bd
             $lienB='location:tries/Accueil.php' ;//Lien pour debuter le parrainage
             header($lienB);
        ?>
    </body>
</html>