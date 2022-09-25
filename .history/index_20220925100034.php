<!--
/***********************************************************/
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
             $lienA='location:backend/admin.php' ; //Lien vers le module backend
             $lienB='location:frontend/accueil.php' ;//Lien vers le module fontend
             header($lienB);
        ?>
    </body>
</html>