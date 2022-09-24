<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to WebShop</title>
    <link rel="stylesheet" href="../ressouces/fontawesome-free-6.1.0-web/css/all.min.css">
    <link rel="stylesheet" href="../ressouces/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <style>
        .btn-outline-secondary {
            border-radius: 16%;
            margin-right: 4px;
        }

        .megamenu {
            padding: 1rem;
        }

        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {
            .megamenu {
                width: 55%;
                margin-top: 0;
            }

        }

        a {
            text-decoration: none;
            cursor: pointer;
        }
        span.price, .price-old {
            font-size: 25px;
            font-family: monospace;
            font-weight: lighter;
        }
        .price-old{
            font-size: 17px;
            color: red;
        }
    </style>
</head>
<body>
<div class="container container-fluid"
     style="box-shadow: 0 0 50px #ccc;margin-top: 12px;margin-bottom: 12px;">
    <!--Header.-->
    <header class="py-3 mb-3 border-bottom">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
            <a href="#" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none"
               id="logo">
                
            </a>


            <div class="d-flex align-items-center">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> <img src ="image/logo.jpeg" alt="Bproo logo"></a>
                <div class="dropdown-menu megamenu" role="menu">
                    <div class="row g-3">
                        <div class="col-lg-3 col-6">
                            <div class="col-megamenu">
                                <h6 class="title">Categorie 1</h6>
                                <ul class="list-unstyled">
                                    <li><a href="#">sous categorie 1</a></li>
                                    <li><a href="#">sous categorie 2</a></li>
                                    <li><a href="#">sous categorie 3</a></li>
                                    <li><a href="#">sous categorie 4</a></li>
                                    <li><a href="#">sous categorie 5</a></li>
                                    <li><a href="#">sous categorie 6</a></li>
                                </ul>
                            </div>  <!-- col-megamenu.// -->
                        </div><!-- end col-3 -->
                        <div class="col-lg-3 col-6">
                            <div class="col-megamenu">
                                <h6 class="title">Title Menu Two</h6>
                                <ul class="list-unstyled">
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                </ul>
                            </div>  <!-- col-megamenu.// -->
                        </div><!-- end col-3 -->
                        <div class="col-lg-3 col-6">
                            <div class="col-megamenu">
                                <h6 class="title">Title Menu Three</h6>
                                <ul class="list-unstyled">
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                </ul>
                            </div>  <!-- col-megamenu.// -->
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="col-megamenu">
                                <h6 class="title">Title Menu Four</h6>
                                <ul class="list-unstyled">
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                </ul>
                            </div>  <!-- col-megamenu.// -->
                        </div><!-- end col-3 -->
                    </div><!-- end row -->
                </div> <!-- dropdown-mega-menu.// -->

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="accueil-.html" class="nav-link px-2 link-dark">&nbsp;Accueil</a></li>
                <li><a href="Produits.html" class="nav-link px-2 link-dark">&nbsp;Produits</a></li>
                <li><a href="contact.php" class="nav-link px-2 link-dark">&nbsp;Contact</a></li>

                <li><a href="Espace-Membre" class="nav-link px-2 link-dark">&nbsp;espace membre</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">&nbsp;bonne affaire</a></li>
                </ul>

                <form class="w-100 me-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-dark"><i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;Login</a>
                    </li>
                    <li><a href="#" class="nav-link px-2 link-dark"><i class="fa-solid fa-user-plus"></i>&nbsp;Inscription</a>
                    </li>
                    <li><a href="Apropos.html" class="nav-link px-2 link-dark"><i class="fa-solid fa-info"></i>&nbsp;A propos</a>
                    </li>
                </ul>
                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="10" height="10" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--End Header.-->

    <!--Carousel.-->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
                    aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active"
                    aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                    class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                     aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                </svg>

                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Example headline.</h1>
                        <p>Some representative placeholder content for the first slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item active">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                     aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                </svg>

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                     aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                </svg>

                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>One more for good measure.</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--End Carousel.-->


    <!-- Body Content here -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
            <div class="card shadow-sm">
                <img src="../ressouces/custom/image/products/img6.jpg" alt="product_5.jpg">
                <div class="card-body">
                    <div class="info-wrap border-top">
                        <a href="#" class="title">description</a>
                    </div>
                    <div class="d-flex" style="float: right">
                        <h1 class="card-title pricing-card-title">
                            <span class="price">Rs399.50</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <img src="../ressouces/custom/image/products/img4.jpg" alt="product_6.jpg">
                <div class="card-body">
                    <div class="info-wrap border-top">
                        <a href="#" class="title">description</a>
                    </div>
                    <div class="d-flex" style="float: right">
                        <h1 class="card-title pricing-card-title">
                            <span class="price">Rs399.50</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <span class="topbar">
                        <a href="#" class="btn btn-sm btn-light float-end">
                            <i class="fa fa-heart" style="color: darkred"></i>
                        </a>
                    <span class="badge bg-success"> New </span>
                </span>

                <img src="../ressouces/custom/image/products/img6.jpg" alt="product_6.jpg">
                <div class="card-body">
                    <div class="info-wrap border-top">
                        <a href="#" class="title">description</a>
                    </div>
                    <div class="d-flex" style="float: right">
                        <h1 class="card-title pricing-card-title">
                            <span class="price">Rs399.50</span>
                           <sub>
                               <del class="price-old">Rs14.99</del>
                           </sub>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm">
                <img src="../ressouces/custom/image/products/img6.jpg" alt="product_5.jpg">

                <div class="card-body">
                    <div class="info-wrap border-top">
                        <a href="#" class="title">description</a>
                    </div>
                    <div class="d-flex" style="float: right">
                        <h1 class="card-title pricing-card-title">
                            <span class="price">Rs399.50</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <img src="../ressouces/custom/image/products/img3.jpg" alt="product_6.jpg">

                <div class="card-body">
                    <div class="info-wrap border-top">
                        <a href="#" class="title">description</a>
                    </div>
                    <div class="d-flex" style="float: right">
                        <h1 class="card-title pricing-card-title">
                            <span class="price">Rs399.50</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <img src="../ressouces/custom/image/products/img4.jpg" alt="product_5.jpg">

                <div class="card-body">
                    <div class="info-wrap border-top">
                        <a href="#" class="title">description</a>
                    </div>
                    <div class="d-flex" style="float: right">
                        <h1 class="card-title pricing-card-title">
                            <span class="price">Rs399.50</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm">
                <img src="../ressouces/custom/image/products/img3.jpg" alt="product_10.jpg">

                <div class="card-body">
                    <div class="info-wrap border-top">
                        <a href="#" class="title">description</a>
                    </div>
                    <div class="d-flex" style="float: right">
                        <h1 class="card-title pricing-card-title">
                            <span class="price">Rs399.50</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <img src="../ressouces/custom/image/products/img6.jpg" alt="product_10.jpg">

                <div class="card-body">
                    <div class="info-wrap border-top">
                        <a href="#" class="title">description</a>
                    </div>
                    <div class="d-flex" style="float: right">
                        <h1 class="card-title pricing-card-title">
                            <span class="price">Rs399.50</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <img src="../ressouces/custom/image/products/5.jpg" alt="product_12.jpg">

                <div class="card-body">
                    <div class="info-wrap border-top">
                        <a href="#" class="title">Apple Watch Series G2</a>
                    </div>
                    <div class="d-flex" style="float: right">
                        <h1 class="card-title pricing-card-title">
                            <span class="price">Rs399.50</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Body Content here -->


    <div class="b-example-divider"></div>
    <!--Footer.-->
    <footer class="py-5">
        <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>&copy; 2022 WebShop, Inc. All rights reserved.</p>
            <h5 align="center"><a href="Faq.html"class="nav-link px-2 link-dark">&nbsp;FAQs</a></h5>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
            </ul>
        </div> 
        <div class="row">  
            
            <div class="d-flex justify-content-between py-4 my-4">
             <h5 align="left"><a href="contactez nous.html"class="nav-link px-2 link-dark">&nbsp;contactez nous</a></h5>

                <h5 align="center"><a href="politique de la vie privée.html"class="nav-link px-2 link-dark">&nbsp;Politique de la vie privée</a></h5>
                
                <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of whats new and exciting from us.</p>
                    <div class="d-flex w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </form>
           </div>
        </div>
    </footer>
    <!--End Footer.-->
</div>
</body>
<script type="application/javascript" src="../ressouces/js/jquery-3.6.0.min.js"></script>
<script type="application/javascript" src="../ressouces/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</html>