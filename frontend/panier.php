<?php
use LDAP\Result;

include '../configDB.php';
include '../webshopUtils.php';
?>

<!DOCTYPE php>
<php lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>webshop - Product Listing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">


    <link rel="stylesheet" href="../assets/css/templatemo-webshop.css">
    <link rel="stylesheet" href="../assets/css/panier.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />




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
    <?php include '../components/banner.php'; ?>
    <!-- ***** Header Area End ***** -->


    <?php

    //supprimer les produits
    //si la variable del existe
    if (isset($_GET['del'])) {
      $id_del = $_GET['del'];
      //suppression
      unset($_SESSION['panier'][$id_del]);
    }

    ?>
    
     
    <div class="content">
      <div class="container">
        <div class="row align-items-center">
        <?php
              $total = 0;
              $quantite= 0;
              $id_add= 0;
              $id_reduce =0;
              $total_produits =0 ;
              $quantite_totale = 0;

              // liste des produits
              //récupérer les clés du tableau session
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune clé dans le tableau
              if (empty($ids)) {
                echo "Votre panier est vide";
              } else {
                ?>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody> 
              <?php

                //si oui 
                $products = mysqli_query($con, "SELECT * FROM produit WHERE id IN (" . implode(',', $ids) . ")");

              /*  $query = mysqli_query($con, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        return mysqli_fetch_all($query, MYSQLI_ASSOC);
                    } else {
                        return array();
                    }
                    */
                    if (isset($_GET['add'])) {
                      $id_add = $_GET['add'];
                }
                if (isset($_GET['reduce'])) {
                  $id_reduce = $_GET['reduce'];
                }
                
                //lise des produit avec une boucle foreach
                foreach ($products as $product) :
                  if (isset($_GET['add']) && $_GET['add'] == $product['id']) {
                    $_SESSION['panier'][$product['id']]++; // Ajouter la quantité du produit
                  }
                
                  if (isset($_GET['reduce']) && $_GET['reduce'] == $product['id']) {
                    if ($_SESSION['panier'][$product['id']] > 0) {
                      $_SESSION['panier'][$product['id']]--; // Réduire la quantité du produit
                    }
                  }
                
                  $total_produit = $product['prix'] * $_SESSION['panier'][$product['id']];
                  $total_produits += $total_produit;
                  $quantite_totale += $_SESSION['panier'][$product['id']];
                  //calculer le total ( prix unitaire * quantité) 
                  //et aditionner chaque résutats a chaque tour de boucle
                  $total = $total_produits;
                  $total_produits += $total_produit;
                  $quantite = $quantite ; 
                  $nombre_total_produits = count($_SESSION['panier']);
                  
              ?>
                  <tr>
                    <td><img src="<?= $product['url'] ?>" style="width: 50px; height: 80px;"></td>
                    <td class="text-left"><?= $product['libelle'] ?></td>
                    <td class="text-left"><?= $product['prix'] ?>€</td>
                    <td class="text-left">
                     <?= $_SESSION['panier'][$product['id']] // Quantité ?>

                      </td>
                    <td class="text-ce">
                      <a href="../frontend/panier.php?del=<?= $product['id'] ?>"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                      <a href="../frontend/panier.php?add=<?= $product['id'] ?>">
                         <i class="fa fa-plus text-success" aria-hidden="true"></i>
                       </a>
                       <a href="../frontend/panier.php?reduce=<?= $product['id'] ?>">
                          <i class="fa fa-minus text-warning" aria-hidden="true"></i>
                        </a>                    
                    </td>
                   
                  </tr>
              <?php endforeach;
               ?>

              <tr class="total">
                <th>Total : <?= $total ?>€ </th>
              </tr>
              <tr class="quantite total">
                <th>Total quantite : <?= $quantite_totale ?> </th>
              </tr>
              <tr class="produit total total">
                <th>Total des produits  : <?= $nombre_total_produits ?> </th>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-sm-12">
         <div class="pull-right">
           <button  class="btn btn-primary" data-toggle="modal" data-target="#confirmReservation"> confirmer la Reservation</button>
         </div>
         <div class="pull-left">
           <button  class="btn btn-primary" ><a class="text-white"  href="products.php"> ajout produit</a>  </button>
                </div>
       </div>
       
       <?php 
              } ?>
      </div>
    </div>
    </div>

     <!-- confirmation de la reservation  -->
  <div class="modal" tabindex="-1" role="dialog" id="confirmReservation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation réservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous confirmer la reservation?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-confirm-reservation" class="btn btn-primary">Confirmer</button>
        <button id="cancelReservation" class="btn btn-danger" onclick="annulerReservation()">Annuler </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script>
        
        clearShoppingCart =  () => {
             
         window.location.href = window.location.origin+'/webshop/frontend/panier.php';
       };
       

      $('#btn-confirm-reservation').click(function (event){
        event.preventDefault;
        $('#confirmReservation').modal('hide');
       
        <?php   $qts = array_values($_SESSION['panier']); ?>

        var ids = "<?=json_encode($ids); ?>";
        var qts = "<?=json_encode($qts); ?>"; 

        // Fire off the request to /form.php
        request = $.ajax({
                url: "../backend/panier/reserver.php",
                type: "post",
                data: {
                  "ids": ids,
                  "qts": qts
                }
            });

            // Callback handler that will be called on success
            request.done(function(response, textStatus, jqXHR) {
                // Log a message to the console
                console.log(response);
                let resp = JSON.parse(response)
                console.log(resp);
                if(resp.success === true)
                 {
                  toastr.success(resp.message);
                  setTimeout(clearShoppingCart, 2000);

                  //todo: vidé le panier après
                 } else {
                  toastr.warning(resp.message);
                 }
            });

            // Callback handler that will be called on failure
            request.fail(function(jqXHR, textStatus, errorThrown) {
                // Log the error to the console
                console.error(
                    "The following error occurred: " +
                    textStatus, errorThrown
                );
                toastr.error('Une erreur est survenu');
            });

            // Callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function() {
              
            });

      });
     // Fonction pour vider le panier
    // Fonction pour vider le panier et afficher le message de réservation annulée
    
    function annulerReservation() {
      window.location.href = "../backend/panier/annuler_reservation.php"; // Remplacez "supprimer_panier.php" par le nom de votre page PHP qui supprime les produits du panier
    }
 



    </script>
   

<script>
  function increaseQuantity(productId) {
    // Appeler une requête AJAX pour augmenter la quantité du produit sur le serveur
    // ou effectuer toute autre logique nécessaire pour augmenter la quantité

    // Recharger la page pour mettre à jour l'affichage du panier
    location.reload();
  }
</script>

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
    <script src="../assets/js/main.js"></script>

    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/webshop.js"></script>

    <script>

    </script>

  </body>
</php>