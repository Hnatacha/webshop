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
            <img src="<?= $produit['url'] ?>" alt='' class="web-product">
        </div>
        <div class='down-content'>
            <h4><?= $produit['libelle'] ?> </h4>
            <div class='row'>
                <span class='prix'> <?= $produit['prix'] ?><sup>€</sup>
                </span>
                <span class='reservation'>
                <span><a class="text-white" href='../backend/panier/ajouter.php?id=<?= $produit['id'] ?>' class="ajout panier">reservation</a></span>

                 </span>
                 
                
                <!-- span class='reservation' id='reservation' positionCourrante=$x quantite='1'>
                                                <span>reserver</span>
                                            </span -->
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
                

