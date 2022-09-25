<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="accueil.php" class="logo">
                        <img src="../assets/images/10.png">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav" style="float: right;">
                    <?= if($_SESSION['loggedin']){ ?>
                        <li>
                            <a href="../backend/deconnexion.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a></li>
                    <?=  }?>
                    
                    
                        <li class="scroll-to-section submenu"><a href="#">
                                <i class="fa-solid fa-basket-shopping"></i>
                                <sup class="totalItems">5</sup>
                                <ul class="basket">
                                    <div class="row basket">
                                        <div class="row item">
                                            <div class="image">
                                                <img src="../assets/images/kid-01.jpg" alt="" width="30%" height="30%">
                                            </div>
                                            <div class="description">
                                                T-Shirt
                                            </div>
                                            <div class="price">Rs<sub>200</sub></div>
                                        </div>

                                    </div>
                                    <div class="row totalPrice">
                                        <div class="titre">
                                            <span style="font-weight: bold" class="titre"><i class="fa-solid fa-2x fa-sack-dollar"></i>&nbsp;Rs</span>
                                        </div>
                                        <div class="montant">
                                            1000000
                                        </div>
                                        <div class="panier">
                                            <button class="btn btn-primary panierBtn">Panier</button>
                                        </div>
                                    </div>
                                </ul>
                            </a></li>
                    </ul>
                    <div class="search_box">
                        <input type="text" class="search-txt-header" placeholder="entrer votre recherche " />
                        <a class="search-btn" href="#">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div style="float: right;">
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="accueil.php" class="active">Accueil</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Vetements</a>
                                <ul>
                                    <li><a href="products.php">vetements</a></li>
                                    <li><a href="accessoire.php">Accessoire</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="membre.php">Membre</a></li>
                            <li class="scroll-to-section"><a href="business.php">Affaire</a></li>
                            <li class="scroll-to-section"><a href="contact.php">Contact </a></li>
                        </ul>
                    </div>


                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>

            </div>
        </div>
    </div>

</header>