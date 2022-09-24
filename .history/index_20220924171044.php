<!DOCTYPE php>
<php lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>webshop Ecommerce</title>

        <style>
            ul.basket {
                width: 264px !important;
            }

            sup.totalItems {
                background: black;
                border-radius: 50%;
                color: white;
                padding: 0px 5px 0px 5px;
            }

            .basket {
                background: #fff !important;
            }

            .basketImage {
                width: 84%;
                border-radius: 50%;
                padding: 4px 0px 3px 22px;
            }

            .image {
                width: 30%;
            }

            .description {
                width: 50%;
                font-size: 12px;
                font-weight: lighter;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                color: #000;
            }

            .price {
                width: 20%;
                font-size: 12px;
                font-weight: bold !important;
                font-family: monospace;
            }

            .montant {
                width: 30%;
                font-size: 22px;
                font-weight: bold !important;
                font-family: monospace;
                padding-right: 2px;
            }

            .titre {
                width: 33%;
                font-size: 12px;
                font-weight: bold !important;
                font-family: monospace;
                padding-right: 2px;
            }

            .panier {
                width: 31%;
                font-size: 12px;
            }

            button.panierBtn {
                float: right;
            }

            span.titre {
                margin: 18px;
                text-transform: capitalize;
                font-weight: bold;
            }

            .row.totalPrice {
                position: relative;
                top: 9px;
            }
        </style>
        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/templatemo-webshop.css">

        <link rel="stylesheet" href="assets/css/owl-carousel.css">

        <link rel="stylesheet" href="assets/css/lightbox.css">
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
        <?php include './components/header.php'; ?>
        <!-- ***** Header Area End ***** -->
        <br><br>
        <!-- ***** Women Area Starts ***** -->
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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
        <!-- ***** Women Area Ends ***** -->
        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner" id="top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-content">
                            <div class="thumb">
                                <div class="inner-content">
                                    <h4>Nous sommes WebShop</h4>
                                    <span> Propre &amp; Accessoire tendance boutique creative</span>
                                    <div class="main-border-button">
                                        <a href="about.php">A propos de nous</a>
                                    </div>
                                </div>
                                <img src="assets/images/left-banner-image.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4>printemps</h4>
                                                <span>Meilleur vetements pour femme</span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>Women</h4>
                                                    <p>La purete de l'ame ne peut etre vue que par Dieu</p>
                                                    <div class="main-border-button">
                                                        <a href="printemps.php">entrer</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="assets/images/robe-pull.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4>automne</h4>
                                                <span> Meilleur Vetement pour femme </span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>women</h4>
                                                    <p>La purete de l'ame ne peut etre vu que par Dieu </p>
                                                    <div class="main-border-button">
                                                        <a href="automne.php">entrer</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="assets/images/robe-pull.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4>ETE</h4>
                                                <span> Meilleur Vetement pour femme </span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>women</h4>
                                                    <p>La purete de l'ame ne peut etre vu que par Dieu </p>
                                                    <div class="main-border-button">
                                                        <a href="ete.php">entrer</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="assets/images/robe-pull.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4>Hiver</h4>
                                                <span> Meilleur Vetement pour femme </span>
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4>women</h4>
                                                    <p>La purete de l'ame ne peut etre vu que par Dieu </p>
                                                    <div class="main-border-button">
                                                        <a href="hiver.php">entrer</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="assets/images/robe-pull.jpg">
                                        </div>
                                    </div>
                                </div>
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
                                        <img src="assets/images/explore-image-01.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="second-image">
                                        <img src="assets/images/explore-image-02.jpg" alt="">
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

        <!-- ***** Social Area Starts ***** -->
        <section class="section" id="social">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>Media social</h2>
                            <span>Details to details is what makes webshop different from the other themes.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row images">
                    <div class="col-2">
                        <div class="thumb">
                            <div class="icon">
                                <a href="http://instagram.com">
                                    <h6>Fashion</h6>
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                            <img src="assets/images/instagram-01.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="thumb">
                            <div class="icon">
                                <a href="http://instagram.com">
                                    <h6>New</h6>
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                            <img src="assets/images/instagram-02.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="thumb">
                            <div class="icon">
                                <a href="http://instagram.com">
                                    <h6>Brand</h6>
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                            <img src="assets/images/instagram-03.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="thumb">
                            <div class="icon">
                                <a href="http://instagram.com">
                                    <h6>Makeup</h6>
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                            <img src="assets/images/instagram-04.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="thumb">
                            <div class="icon">
                                <a href="http://instagram.com">
                                    <h6>Leather</h6>
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                            <img src="assets/images/instagram-05.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="thumb">
                            <div class="icon">
                                <a href="http://instagram.com">
                                    <h6>Bag</h6>
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                            <img src="assets/images/instagram-06.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Social Area Ends ***** -->

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
                                        <input name="name" type="text" id="name" placeholder="Your Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-5">
                                    <fieldset>
                                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-2">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
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
        <?php include './components/footer.php'; ?>


        <!-- jQuery -->
        <script src="assets/js/jquery-2.1.0.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Plugins -->
        <script src="assets/js/owl-carousel.js"></script>
        <script src="assets/js/accordions.js"></script>
        <script src="assets/js/datepicker.js"></script>
        <script src="assets/js/scrollreveal.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/imgfix.min.js"></script>
        <script src="assets/js/slick.js"></script>
        <script src="assets/js/lightbox.js"></script>
        <script src="assets/js/isotope.js"></script>

        <!-- Global Init -->
        <script src="assets/js/custom.js"></script>

        <script>
            $(function() {
                $('.carousel').carousel({
                    interval: 2000
                })
            });
        </script>

    </body>
</php>