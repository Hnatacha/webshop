<?php
$loggedin = isset($_SESSION['loggedin']);
?>
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
                        <?php if (isset($_SESSION['loggedin'])) {
                            ?>
                            <li>
                                <a href="../backend/deconnexion.php">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                </a>
                            </li>
                           
                        <?php
                        } ?>

                            <li>
                                <a href="../admin/authentification.php" title="Espace admin">
                                    <i style='font-size:16px' class='fas'>&#xf023;</i>
                                </a>
                            </li>
                        <li class="scroll-to-section submenu"><a href="../frontend/panier.php">
                                <i class="fa-solid fa-basket-shopping"></i>
                                <sup
                                    class="totalItems"><?=array_sum(isset($_SESSION['panier']) ? $_SESSION['panier'] : array())?></sup>
                            </a></li>
                    </ul>
                    <div class="search_box">
                        <input type="search" id="search" on="search($event)" class="search-txt-header"
                            placeholder="entrer votre recherche " />
                        <a class="search-btn" id="search-btn" href="javascript:;" >
                            <i class="fa fa-search" type="search" name="terme" aria-hidden="true"></i>
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
                            <li class="scroll-to-section"><a href="membre.php">Espace-Membre</a></li>
                            <li class="scroll-to-section"><a href="business.php">Bonne-Affaire</a></li>
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