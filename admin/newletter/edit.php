<?php

include '../../configDB.php';
include '../../webshopUtils.php';

if (isset($_GET['id']) && strlen($_GET['id'])) {
  $produitId = $_GET['id'];
  $prod = findById('produit', $con,  $produitId);
  $produit = !empty($prod) ? (object) $prod : $prod;
  $action = 'updated';
} else {
  $action = 'created';
}

$saisons  = findByAllOrderBy('saison', $con, 'nom');
$categories  = findByAllOrderBy('categorie', $con, 'nom');
$accessoires  = findByAllOrderBy('accessoire', $con, 'nom');
$bonneAffaires  = findByAllOrderBy('bonne_affaire', $con);

?>

<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<php lang="en">
  <html lang="en">

  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title></title>

    <link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Additional CSS Files -->

    <!-- Vendors styles-->
    <link rel="stylesheet" href="../vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="../css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="../css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="../css/examples.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
    <link href="../vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
  </head>

  <body>

    <?php include '../partial/sidebar.php'; ?>

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">

      <?php include '../partial/header.php'; ?>

      <div class="body flex-grow-1 px-3">
        <form id="formEditNewLetter">
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" id="libelle" require name="libelle" value="<?php if(!empty($produit)) echo $produit->libelle;?>" class="form-control" />
                <label class="form-label" for="libelle">Libelle</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="number" min="0" require id="quantite" name="quantite" value="<?php if(!empty($produit)) echo $produit->quantite;?>" class="form-control" />
                <label class="form-label" for="quantite">Quantité</label>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="number" id="prix"  pattern="^\d+(?:\.\d{1,2})?$" min="0" step="0.01" placeholder="0.00" require name="prix" value="<?php if(!empty($produit)) echo $produit->prix;?>" class="form-control" />
                <label class="form-label" for="prix">Prix</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="number" pattern="^\d+(?:\.\d{1,2})?$" min="0" step="0.01" placeholder="0.00" id="prix_reduction" name="prix_reduction" value="<?php if(!empty($produit)) echo $produit->prix_reduction;?>" class="form-control" />
                <label class="form-label" for="prix_reduction">Prix réduction</label>
              </div>
            </div>
          </div>

          <div class="form-outline mb-4">
            <input type="number" id="rate" name="rate" value="<?php if(!empty($produit)) echo $produit->rate;?>" class="form-control" />
            <label class="form-label" for="rate">Rate</label>
          </div>

          <div class="row mb-4">
            <div class="col">
              <select class="form-control" require id="categorie_id" name="categorie_id">
                <option value="">Categorie</option>
                <?php foreach ($categories as $cat) {
                  $categorie = (object) $cat;
                ?>
                  <option value="<?= $categorie->id ?>" <?php if (($action == 'updated') && ($produit->categorie_id == $categorie->id)) {
                                                          echo 'selected';
                                                        } ?>><?= $categorie->nom ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col">
              <select class="form-control" id="saison_id" name="saison_id">
                <option value="">Saison</option>
                <?php foreach ($saisons as $s) {
                  $saison = (object) $s;
                ?>
                  <option value="<?= $saison->id ?>" <?php if (($action == 'updated') && ($produit->saison_id == $saison->id)) {
                                                        echo 'selected';
                                                      } ?>><?= $saison->nom ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <select class="form-control" id="accessoire_id" name="accessoire_id">
                <option value="">Accessoire</option>
                <?php foreach ($accessoires as $ac) {
                  $accessoire = (object) $ac;
                ?>
                  <option value="<?= $accessoire->id ?>" <?php if (($action == 'updated') && ($produit->accessoire_id == $accessoire->id)) {
                                                            echo 'selected';
                                                          } ?>><?= $accessoire->nom ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col">
              <select class="form-control" id="bonne_affaire_id" name="bonne_affaire_id">
                <option value="">Bonne affaire</option>
                <?php foreach ($bonneAffaires as $ba) {
                  $bonneAffaire = (object) $ba;
                ?>
                  <option value="<?= $bonneAffaire->id ?>" <?php if (($action == 'updated') && ($produit->bonne_affaire_id == $bonneAffaire->id)) {
                                                              echo 'selected';
                                                            } ?>>
                    <?= $bonneAffaire->pourcentage ?>% Fin: <?= $bonneAffaire->date_fin ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <!-- Text input -->
          <div class="form-outline mb-4">
            <input type="file" id="file" name="file" accept="image/png, image/gif, image/jpeg" class="form-control" />
          </div>
         <?php if(!empty($produit) && strlen($produit->url) ) {?>
            <img src="../<?=$produit->url?>" width="100px" class="mb-2" alt="<?=$produit->libelle?>">
         <?php } ?>

         <input type="text" hidden id="url" name="url" value="<?php if(!empty($produit)) echo $produit->url;?>" class="form-control" />
         <input type="text" hidden id="id" name="id" value="<?php if(!empty($produit)) echo $produit->id;?>" class="form-control" />

          <!-- Message input -->
          <div class="form-outline mb-4">
            <textarea class="form-control" name="description" id="description" rows="4"><?php if(!empty($produit)) echo htmlspecialchars($produit->description);?></textarea>
            <label class="form-label" for="description">Description</label>
          </div>

          <!-- Checkbox -->
          <!-- <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
    <label class="form-check-label" for="form6Example8"> Create an account? </label>
  </div> -->

          <!-- Submit button -->
          <button type="submit" id="editProduct" class="btn btn-primary btn-block mb-4">Enregistrer</button>
        </form>
      </div>


      <?php include '../partial/footer.php'; ?>

    </div>
      <!-- jQuery -->
      <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="../vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../vendors/simplebar/js/simplebar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="../vendors/chart.js/js/chart.min.js"></script>
    <script src="../vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script>
      var request;

      $("form#formEditNewLetter").submit(function(event) {

        event.preventDefault();
        
        // Abort any pending request
        if (request) {
          request.abort();
        }
        // setup some local variables
        var $form = $(this);
        var method = '<?php if($action == 'updated') echo 'PUT'; else echo 'POST' ?>';

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");

        // Serialize the data in the form
        var formData = new FormData(this);
        formData.append('_method', method);
        

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
          url: "productController.php",
          type:  'POST',
          data: formData,
          cache: false,
          contentType: false,
          processData: false
        });

        // Callback handler that will be called on success
        request.done(function(response, textStatus, jqXHR) {
          // Log a message to the console
          try{
            response = JSON.parse(response);
          } catch(err){
              toastr.error("Une erreur est survenue lors de l'enregistrement");
              console.log(err.message);
              return;
          }

          if(response.success){
            toastr.success('Enregistement terminé');
            if(method == 'POST'){
              document.getElementById("formEditNewLetter").reset();
              setTimeout(() => {
                window.location.href = window.location.origin+'/webshop/admin/index.php';
              }, 1000);
            } else {
              var id = '<?=$produitId?>';
              setTimeout(() => {
                window.location.href = window.location.origin+'/webshop/admin/produits/edit.php?id='+id;
              }, 1000);
            }
               
          }else {
            toastr.warning(response.message);
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
          // Reenable the inputs
          $inputs.prop("disabled", false);
        });
      });
    </script>

  </body>

  </html>
</php>