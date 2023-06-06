<!DOCTYPE phpsingle-product.php>
<html lang="en">

<head>
    <?php

    $data = array('one', 'two', 'three');
    // db config
    include '../configDB.php'; 
    include '../webshopUtils.php';
    
    $saisons = affichageSaison("saison", $con);
    $produits = affichageBonneAffaire("produit", "bonne_affaire", $con);

    $produitParPage = 5;
    $nombreDePages = ceil(sizeof($produits) / $produitParPage);
    if (isset($_GET['page'])) { // Si la variable $_GET['page'] existe... 
        $pageActuelle = intval($_GET['page']);
        if ($pageActuelle > $nombreDePages) { // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
            $pageActuelle = $nombreDePages;
        }
    } else { // Sinon 
        $pageActuelle = 1; // La page actuelle est la n°1    
    }
    $premiereEntree = ($pageActuelle - 1) * $produitParPage; // On calcul la première entrée à lire
    $elements = paginationBonneAffaire("produit", "bonne_affaire", $premiereEntree, $produitParPage, $con);
    /*     echo "Debogg";
    echo '<pre>'; print_r($elements); echo '</pre>';
    die("stop Debogg"); */
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>webshop - Product Listing Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/templatemo-webshop.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/lightbox.css">
    <link rel="stylesheet" href="../assets/css/panier.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--

TemplateMo 571 webshop

https://templatemo.com/tm-571-webshop

-->

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <?php include '../components/header.php'; ?>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                if ($produits > 0) {
                    foreach ($produits as $x => $produit) {
                ?>
                        <div class='col-lg-4 box'>
                            <div class='item'>
                                <div class='thumb'>
                                    <div class='hover-content'>
                                        <ul>
                                            <li><a href='single-product.php'><i class='fa fa-eye'></i></a></li>
                                            <li><a href='single-product.php'><i class='fa fa-star'></i></a></li>
                                            <li><a href='single-product.php'><i class='fa fa-shopping-cart'></i></a></li>
                                        </ul>
                                    </div>
                                    <div class='ribbon ribbon-top-right'>
                                        <span>reduction&nbsp;<?= $produit['pourcentage']; ?>%</span>
                                    </div>
                                    <img src="<?= $produit['url'] ?>" alt='' class="web-product">
                                </div>
                                <div class='down-content'>
                                    <h4><?= $produit['libelle'] ?></h4>
                                    <div class='row'>
                                        <span class='prix'>
                                            <b class='new_price'><?= $produit['prix_reduction'] ?></b>
                                            &nbsp;<sub class='old_price'><del><?= $produit['prix'] ?></del></sub>
                                            <sup>€</sup>
                                        </span>
                                        <span class='reservation'>
                                            <span><a class="text-white" href='../backend/panier/ajouter.php?id=<?= $produit['id'] ?>' class="reservation">Reserver</a></span>
                                        </span>
                                    </div>
                                    <ul class='stars'>
                                        <?php
                                        for ($i = 0; $i <= $produit['rate']; $i++) {
                                        ?>
                                            <li><i class='fa fa-star'></i></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <?php
                              for ($i = 1; $i <= $nombreDePages; $i++) 
                              { //On fait notre boucle
                                //On va faire notre condition
                                if ($i == $pageActuelle) 
                                { //Si il s'agit de la page actuelle...
                            ?>
                                 <li class="active">
                                        <a href="#"><?=$i?></a>
                                        </li>
                               <?php
                                } else { //Sinon...
                                 ?>
                                            <li>
                                                <a href="business.php?page=<?=$i?>"><?=$i?></a>
                                            </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->

    <!-- ***** GIFT Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Choisir un cadeau</h2>
                        <span>Vous êtes autorisé à choisir un des cadeaux offert pour vos achats. </span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <span>Vous êtes autorisé à choisir un des cadeaux offert pour vos achats. </span>
                        </div>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <span>Vous êtes autorisé à choisir un des cadeaux offert pour vos achats. </span>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Sacs en cuir</h4>
                                    <span>Dernière collection</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="../assets/images/explore-image-01.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** GIFT Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php include '../components/footer.php'; ?>


    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/accordions.js"></script>
    <script src="../assets/js/datepicker.js"></script>
    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/lightbox.js"></script>
    <script src="../assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/webshop.js">
    </script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>

</body>

</html>