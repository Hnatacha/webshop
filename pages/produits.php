<!--
    Fichier permettant la redirection vers le module de 
    gestion de Contacts.
-->
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Webshop::Nos produits</title>
    <!-- ***** style Area Start ***** -->
    <?php include './composants/styles.php'; ?>
    <!-- ***** style Area End ***** -->
</head>

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- ***** header Area Start ***** -->
        <?php include './composants/header.php'; ?>
        <!-- ***** header Area End ***** -->

        <!-- ***** produits Accueil Area Start ***** -->
        <?php include './composants/produits.php'; ?>
        <!-- ***** produits Accueil Area End ***** -->

        <!-- ***** Footer Area Start ***** -->
        <?php include './composants/footer.php'; ?>
        <!-- ***** Footer Area End ***** -->

        <!-- ***** Debut appercu du produit ***** -->
        <?php include './composants/appercuProduit.php'; ?>
        <!-- ***** Fin appercu du produit ***** -->

    </div>
    <!-- Body main wrapper end -->

    <!-- ***** Placed JS at the end of the document so the pages load faster Start ***** -->
    <?php include './composants/javascripts.php'; ?>
    <!-- ***** Placed JS at the end of the document so the pages load faster Area End ***** -->

</body>

</html>