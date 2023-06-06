<?php

include '../../configDB.php';
include '../../webshopUtils.php';

$commandes = recupererInfoCommande($con);
  
?>

<!DOCTYPE>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

  </head>
  <body>

    <?php include '../partial/sidebar.php'; ?>

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">

      <?php include '../partial/header.php'; ?>
      
      <div class="body flex-grow-1 px-3">
        <div class="d-flex flex-row-reverse">
          <a href="edit.php" class="btn btn-primary" title="Ajouter un produit">
             <i class="fa fa-plus" aria-hidden="true"></i>Ajouter
          </a>
        </div>
        <section class="section" id="products">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">REFERENCE</th>
                <th scope="col">NOM CLIENT</th>
                <th scope="col">NOM PRODUIT</th>
                <th scope="col">DATE RESERVATION</th>
                <th scope="col">MONTANT</th>
                <th scope="col">STATUS</th>
                <th scope="col">QUANTITE</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($commandes as $k => $cmd)
              {
                $commande = (object) $cmd;
              ?>
              <tr>
                <th scope="row"><?=$k?></th>
                <td><?=$commande->reference?></td>
                <td><?=$commande->nom_client?></td> 
                <td><?=$commande->libelle_produit?></td>
                <td><?=$commande->date_commande?></td>
                <td><?=$commande->prix?></td> 
                <td><?=$commande->status?></td>
                <td><?=$commande->quantity?></td>
                <td>
                  <span>
                  <div class="dropdown">
                  <button class="btn  dropdown-toggle" type="button" data-coreui-toggle="dropdown" aria-expanded="false">
                   <i class="fa-solid fa-bars"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-action="Valider" data-status="VALD" data-id="<?=$commande->id?>" onclick="onChangeStatus(event)" title="Valider la commande">Valider</a></li>
                    <li><a class="dropdown-item" href="#" data-action="Annuler" data-status="ANUL" data-id="<?=$commande->id?>" onclick="onChangeStatus(event)" title="Annuler la commande">Annuler</a></li>
                  </ul>
                </div>
                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </section>
      </div>
     
        
      <?php include '../partial/footer.php'; ?>

    </div>
     <!-- confirmation de changement de status  -->
  <div class="modal" tabindex="-1" role="dialog" id="confirmChangeStatus" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Changement statut</h5>
        <button type="button" class="close" onclick="closeModal(event)" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="statusMBody">
        <p>Voulez-vous confirmer la suppression?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-confirm-suppression" onclick="changeStatus(event)" class="btn btn-primary">Confirmer</button>
        <button type="button" class="btn btn-danger" onclick="closeModal(event)">Annuler</button>
      </div>
    </div>
  </div>
</div>

     <!-- jQuery -->
    <script src="../js/jquery-2.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="../vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="../vendors/chart.js/js/chart.min.js"></script>
    <script src="../vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../vendors/@coreui/utils/js/coreui-utils.js"></script>
    
    <script>
      $('#')
       onChangeStatus = (event) => {
             event.preventDefault();
             var target = event.target;

             let id = $(target).data("id");
             let action = $(target).data("action");
             let status = $(target).data("status");

             let mBody = document.getElementById('statusMBody');
             mBody.innerHTML = '';
             let body = action +' la commande ?';
                 body += '<input type="text" hidden value="'+id+'" name="commandId" id="commandId">';
                 body += '<input type="text" hidden value="'+status+'" name="statusCmd" id="statusCmd">';

              mBody.innerHTML = body;
              $('#confirmChangeStatus').modal({backdrop: 'static', keyboard: false}) 
              $('#confirmChangeStatus').modal('show');

        };

        changeStatus =  (event) => {
          let id = $('#commandId').val();
          let code = $('#statusCmd').val();
          var formData = new FormData();
          formData.append('_method', 'UPDATE_STATUS');
          formData.append('id', id);
          formData.append('code', code);

          request = $.ajax({
          url: "CommandeController.php",
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
            console.log(response);
            response = JSON.parse(response);
          } catch(err){
              toastr.error("Une erreur est survenue lors du changement du statut");
              console.log(err.message);
              return;
          }

          if(response.success){
            closeModal();

            toastr.success('Statut modifié');
            setTimeout(() => {
                window.location.href = window.location.origin+'/webshop/admin/commande/index.php';
              }, 1000);
               
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
        }

        closeModal =  (event) => {
          $('#confirmChangeStatus').modal('hide');
        }
    </script>

  </body>