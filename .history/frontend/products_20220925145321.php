<?php
session_start();
$loggedin = isset($_SESSION['loggedin']);
$data = array('one', 'two', 'three');
?>

<!DOCTYPE>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

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

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Consulter nos produits </h2>
                        <span>Genial &amp; Creatif </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Nos derniers Produits</h2>
                        <span>Decouvrez tous nos produits</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                for ($x = 0; $x <= 10; $x++) {
                    echo "The number is: $x <br>";
                    echo "<div class='col-lg-4 box'>
                    <div class='item'>
                    <div class='thumb'><div class='hover-content'>
                    ";
                }
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
                            <img src='../assets/images/men-01.jpg' alt=''>
                        </div>
                        <div class='down-content'>
                            <h4>Classic Spring</h4>
                            <div class='row'>
                                <span class='prix'>
                                    120.00 <sup>€</sup>
                                </span>
                                <span class='reservation' id='reservation' positionCourrante='1' quantite='1'>
                                    <span>reserver</span>
                                </span>
                            </div>
                            <ul class='stars'>
                                <li><i class='fa fa-star'></i></li>
                                <li><i class='fa fa-star'></i></li>
                                <li><i class='fa fa-star'></i></li>
                                <li><i class='fa fa-star'></i></li>
                                <li><i class='fa fa-star'></i></li>
                            </ul>
                        </div>
                    </div>
                </div>





                <div class="col-lg-4 box">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.php"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="../assets/images/men-01.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Classic Spring</h4>
                            <div class="row">
                                <span class="prix">
                                    120.00 <sup>€</sup>
                                </span>
                                <span class="reservation" id="reservation" positionCourrante="1" quantite="1">
                                    <span>reserver</span>
                                </span>
                            </div>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 box">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.php"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="../assets/images/men-02.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Jean 1 X</h4>
                            <div class="row prix_et_reservation">
                                <span class="prix">
                                    90.00 <sup>€</sup>
                                </span>
                                <span class="reservation" positionCourrante="2">
                                    <span>reserver</span>
                                </span>
                            </div>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 box">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.php"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="../assets/images/men-03.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Love Nana ‘20</h4>
                            <div class="row prix_et_reservation">
                                <span class="prix">
                                    150.00 <sup>€</sup>
                                </span>
                                <span class="reservation" positionCourrante="3">
                                    <span>reserver</span>
                                </span>
                            </div>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 box">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.php"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="../assets/images/women-01.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>New Green Jacket</h4>
                            <div class="row prix_et_reservation">
                                <span class="prix">
                                    75.00 <sup>€</sup>
                                </span>
                                <span class="reservation" positionCourrante="3">
                                    <span>reserver</span>
                                </span>
                            </div>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 box">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.php"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="../assets/images/women-02.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Classic Dress</h4>
                            <div class="row prix_et_reservation">
                                <span class="prix">
                                    45.00 <sup>€</sup>
                                </span>
                                <span class="reservation" positionCourrante="3">
                                    <span>reserver</span>
                                </span>
                            </div>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 box">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.php"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="../assets/images/women-03.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Swag</h4>
                            <div class="row prix_et_reservation">
                                <span class="prix">
                                    130.00 <sup>€</sup>
                                </span>
                                <span class="reservation" positionCourrante="3">
                                    <span>reserver</span>
                                </span>
                            </div>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 box">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.php"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="../assets/images/pantalon.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>School Collection</h4>
                            <span>80.00<sup>€</sup></span>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 box">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.php"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="../assets/images/kid-02.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Summer Cap</h4>
                            <span>12.00<sup>€</sup></span>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 box">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.php"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.php"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img src="../assets/images/PSgreen.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <h4>Classic dress</h4>
                            <span>30.00<sup>€</sup></span>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li class="active">
                                <a href="#">1</a>
                            </li>
                            <li class="active">
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->

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
        let mesReservations = {}
        let monPanier = {}

        /**
         * Verification si l'utilisateur est connecté
         */
        function isConnected() {
            var loggedin = '<?php echo $loggedin; ?>';
            var datar = <?php echo json_encode($data); ?>;
            return loggedin;
        }

        $(function() {
            /**
             * Reservation des produits par un client
             **/
            $("body").on("click", ".reservation[positionCourrante]", function(event) {
                event.preventDefault();
                let currentposition = $(this).attr("positionCourrante");
                let quantite = $(this).attr("quantite")
                let id_product = $(this).attr("product");
                let designation = $(this).attr("designation");
                let prix = $(this).attr("prix");
                $("#designation").text(designation);
                let image = $(this).attr("src");
                let htmlDiv = "";
                htmlDiv += "<img alt='image_" + designation + "' src='" + image + "'   class='imagehref" + currentposition + "' width='70px' height='70px'/>";
                console.log("Valeur", currentposition);


                if (!isConnected()) {
                    console.log("is not connected")
                    /* Si on n'est pas connecté alors redirection ver la page membre.php */
                    window.location.href = 'membre.php';
                } else {
                    console.log("is  connected")
                    /* On cache le boutton reservation apres sa selection */
                    $(".reservation[positionCourrante='" + currentposition + "']").hide();
                }



                /*  if (Object.keys(monPanier).length > 0) {
                     var trouver = false;
                     $.each(monPanier, function(key, val) {
                         if (monPanier[key]['groupe'] === groupe && monPanier[key]['product_id'] === id_product) {
                             trouver = true;
                             monPanier[key]["qte"] = (parseInt(monPanier[key]["qte"]) + parseInt(qte));
                         }
                     });
                     if (trouver == false) {
                         counter = (Object.keys(monPanier).length) + 1;
                         addElementInBasket(counter, id_product, designation, price, htmlDiv, groupe, currentposition, qte);
                     }
                 } else {
                     counter = (Object.keys(monPanier).length) + 1;
                     addElementInBasket(counter, id_product, designation, price, htmlDiv, groupe, currentposition, qte);
                 }
                 //Svgd le panier en memoire
                 storeInfos(monPanier);
                 getInfos(monPanier);
                 //Recharger le panier
                 refreshMyBasketItems();
                 refreshQte(currentposition, groupe, id_product);
                 hideEmptyCart(monPanier); */



            });

            function addElementInBasket(counter, id_product, designation, price, imageHtml, groupe, currentposition, qte) {
                monPanier[counter] = {
                    id: counter,
                    product_id: id_product,
                    designation: designation,
                    price: price,
                    image: imageHtml,
                    groupe: groupe,
                    currentposition: currentposition,
                    qte: qte
                };
            }




            /**
             * Cacher le panier s'il ne contient pas d'elements
             * @param myBasket
             */
            function hideEmptyCart(myBasket) {
                if (myBasket) {
                    let total = Object.keys(myBasket).length;
                    if (total == 0) {
                        $('.total-cart').hide();
                    } else {
                        $('.total-cart').show();
                    }
                } else {
                    $('.total-cart').hide();
                }
            }


            function refreshQte(currentposition, groupe, id_product) {
                if (Object.keys(monPanier).length > 0) {
                    var trouver = false;
                    $.each(monPanier, function(key, val) {
                        if (monPanier[key]['currentposition'] === currentposition && monPanier[key]['groupe'] === groupe && monPanier[key]['product_id'] === id_product) {
                            trouver = true;
                            $('.quick-qte').val(monPanier[key]["qte"]);
                        }
                    });
                    if (trouver == false) {
                        $('.quick-qte').val(1);
                    }
                } else {
                    $('.quick-qte').val(1);
                }
            }

            /**
             * actuaisation de la page et sauvgarde des elements
             * selectionner dans le panier
             */
            function refreshMyBasketItems() {
                if (typeof localStorage != 'undefined') {
                    //Transform to object
                    let items = JSON.parse(localStorage.getItem("monPanier"));
                    if (items) {
                        let monPanierTotal = 0;
                        monPanier = items;
                        $('.adding_orders').html(''); //clear all items
                        $.each(items, function(key, val) {
                            //Coloration
                            $('.add_product_incart_purpose_' + items[key]['product_id'] + '_' + items[key]['groupe']).children().css({
                                "color": "#ff0000",
                                "border": "2px solid rgba(255, 0, 0, 0.3)"
                            });
                            panierInformation(key, items[key]['groupe'], items[key]['currentposition'], items[key]['designation'], items[key]['price'], items[key]['qte'], items[key]['image'], items[key]['product_id']);
                            monPanierTotal += (parseFloat(val.price) * parseFloat(val.qte));
                        });
                        let total = Object.keys(items).length;
                        $('.cart-quantity').html(total);
                        $(".total_in_cart").html(monPanierTotal + "<sup>xaf</sup>");
                    }
                    loadBasketELement();
                    hideEmptyCart(items);
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {

            /* $(".reservation").on("click", function(event) {
                event.preventDefault();
                $(this).css('color', 'red');
                console.log("jkcdjjkcdcjdc");
            });
            $(".reservation").click(function() {
                console.log("ok");
            });


            $('.reservation').click(function() {
                console.log("ok");
                if ($('.img_display_content').is(":visible")) {
                    $('.img_display_content').hide();
                } else {
                    $('.img_display_content').show();
                }

            }); */
        });
    </script>

</body>