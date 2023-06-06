<?php

include '../../configDB.php';
include '../../webshopUtils.php';

if (isset($_GET['id']) && strlen($_GET['id'])) {
  $commandeId = $_GET['id'];
  $com = findById('commande', $con,  $commandeId);
  $commande = !empty($com) ? (object) $com : $com;
  $action = 'updated';
} else {
  $action = 'created';
}
$status_commandes  = findByAllOrderBy('status_commande', $con, 'nom');

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

      <form id="formEditCommande">
        <div class="row mb-4">
          <div class="col">
            <select class="form-control" id="status_id" name="status_id">
              <option value="">status</option>
              <?php foreach ($status_commandes  as $st) {
                $status_commande  = (object) $st;
              ?>
                <option value="<?= $status_commande->id ?>" <?php if (($action == 'updated') && ($commande->status_id == $status_commande->id)) {
                                                              echo 'selected';
                                                            } ?>><?= $status_commande->nom ?></option>
              <?php
              }
              ?>
            </select>
          </div>


          <!-- Submit button  -->
          <button type="submit" id="editComuct" class="btn btn-primary btn-block mb-4">Enregistrer</button>
        </div>
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

      $("form#formEditCommande").submit(function(event) {

        event.preventDefault();

        // Abort any pending request
        if (request) {
          request.abort();
        }
        // setup some local variables
        var $form = $(this);
        var method = '<?php if ($action == 'updated') echo 'PUT';
                      else echo 'POST' ?>';

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
          url: "CommandeController.php",
          type: 'POST',
          data: formData,
          cache: false,
          contentType: false,
          processData: false
        });

        // Callback handler that will be called on success
        request.done(function(response, textStatus, jqXHR) {
          // Log a message to the console
          try {
            response = JSON.parse(response);
          } catch (err) {
            toastr.error("Une erreur est survenue lors de l'enregistrement");
            console.log(err.message);
            return;
          }

          if (response.success) {
            toastr.success('Enregistement terminé');
            if (method == 'POST') {
              document.getElementById("formEditCommande").reset();
              setTimeout(() => {
                window.location.href = window.location.origin + '/webshop/admin/index.php';
              }, 1000);
            } else {
              var id = '<?= $commandeId ?>';
              setTimeout(() => {
                window.location.href = window.location.origin + '/webshop/admin/commandes/edit.php?id=' + id;
              }, 1000);
            }

          } else {
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