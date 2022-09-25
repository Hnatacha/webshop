<?php
$connexion = mysqli_connect("localhost", "root", "", "webshops");
//cette methode permet l'affichage des enregistrement d'une table en fct de l'id
//cette methode permet l'affichage des enregistrement d'une table
function affichage($table, $con)
{
    $sql = "SELECT * FROM $table ORDER BY id DESC";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return "Empty table";
    }
}
$saisons = affichage("saison", $connexion);
$saisonsInformations = array(
    ["slogan" => "Meilleur Vetement pour femme", "slogan2" => "La purete de l'ame ne peut etre vu que par Dieu", "url" => "../assets/images/sweat-hood.jpg"],
    ["slogan" => "Meilleur Vetement pour femme", "slogan2" => "La purete de l'ame ne peut etre vu que par Dieu", "url" => "../assets/images/casquette.jpg"],
    ["slogan" => "Meilleur Vetement pour femme", "slogan2" => "La purete de l'ame ne peut etre vu que par Dieu", "url" => "../assets/images/RedPant.jpg"],
    ["slogan" => "Meilleur Vetement pour femme", "slogan2" => "La purete de l'ame ne peut etre vu que par Dieu", "url" => "../assets/images/sweat-t-shirt.jpg"]
);
?>

<!DOCTYPE php>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>webshop Ecommerce</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/templatemo-webshop.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/lightbox.css">
    <link rel="stylesheet" href="../assets/css/panier.css">
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
    <br><br>
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="../assets/images/women-01.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>First slide label</h5>
                                            <p class="slide_description">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/images/women-02.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Second slide label</h5>
                                            <p class="slide_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/images/women-03.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Third slide label</h5>
                                            <p class="slide_description">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <?php
                            for ($x = 0; $x < sizeof($saisons); $x++) {
                                echo "<div class='col-lg-6'>
                    <div class='right-first-image'>
                        <div class='thumb'>
                            <div class='inner-content'>
                                <h4>";
                                echo $saisons[$x]['nom'];
                                echo "</h4>
                                <span>";
                                echo $saisonsInformations[$x]['slogan'];
                                echo "</span>
                            </div>
                            <div class='hover-content'>
                                <div class='inner'>
                                    <h4>";
                                echo $saisons[$x]['nom'];
                                echo "</h4>
                                    <p>";
                                echo $saisonsInformations[$x]['slogan2'];
                                echo "'</p>
                                    <div class='main-border-button'>
                                        <a href=saison.php?idsaison=(+)>entrer</a>
                                    </div>
                                </div>
                            </div>
                            <img src='";
                                echo $saisonsInformations[$x]['url'];
                                echo "'>
                        </div>
                    </div>
                </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Découvrez nos produits</h2>
                        <span>Découvrez nos produits.Vous êtes autorisé à utiliser cette boutique en ligne. Vous pouvez vous sentir libre de modifier ou d'éditer cette mise en page. Vous pouvez convertir ce modèle en n'importe quel type de thème CMS de commerce électronique comme vous le souhaitez.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Vous n'êtes pas autorisé à redistribuer ce modèle de fichier ZIP sur un autre site Web.</p>
                        </div>
                        <p>Il y a 5 pages incluses dans ce modèle de boutique en ligne et nous vous les fournissons gratuitement sur notre site Web TemplateMo. Il y a des coûts de développement web pour nous.</p>
                        <p>Si ce modèle est bénéfique pour votre site Web ou votre entreprise, veuillez nous soutenir un peu via PayPal.
                            <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank"> Veuillez également informer vos amis de notre excellent site Web. Merci.</a>
                        </p>
                        <div class="main-border-button">
                            <a href="products.php">entrer</a>
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
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="../assets/images/explore-image-02.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Differents types </h4>
                                    <span>plus de vos produits</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>En vous inscrivant à notre newsletter, vous pouvez obtenir 30% de réduction</h2>
                        <span>Details to details is what makes webshop different from the other themes.</span>
                    </div>
                    <form id="subscribe" action="" method="get">
                        <div class="row">
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Ton nom" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Ton Address mail" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-2">
                                <fieldset>
                                    <button a href="connexion.php" type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane">
                                            </a></i></button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                                <li>Phone:<br><span>010-020-0340</span></li>
                                <li>Office Location:<br><span>North Miami Beach</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>info@company.com</span></li>
                                <li>Media social:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->

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

    <script>
        $(function() {
            $('.carousel').carousel({
                interval: 2000
            })
        });
    </script>

</body>

</html>