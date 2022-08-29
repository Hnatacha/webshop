<!--
    Fichier permettant la redirection vers la page cliente.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>lien</title>
    </head>
    <body>
        <?php
        $lien = 'location:pages/accueil.php'; //Lien pour la page accueil de webshop
        header($lien);
        ?>
    </body>
</html>
