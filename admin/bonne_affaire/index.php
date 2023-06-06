<?php

include '../../configDB.php';
include '../../webshopUtils.php';

$bonne_affaires  = findByAllOrderBy('bonne_affaire', $con, 'date_debut','date_fin','pourcentage');

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
          <a href="edit.php" class="btn btn-primary" title="Ajouter un bonne_affaire">
             <i class="fa fa-plus" aria-hidden="true"></i>Ajouter
          </a>
        </div>
        <section class="section" id="products">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">date_debut</th>
                <th scope="col">date_fin</th>
                <th scope="col">pourcentage</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($bonne_affaires as $k => $bonne_affaire)
              {
              ?>
              <tr>
                <th scope="row"><?=$k?></th>
                <td><?=$bonne_affaire['date_debut']?></td>
                <td><?=$bonne_affaire['date_fin']?></td>
                <td><?=$bonne_affaire['pourcentage']?></td>

                <td>
                  <span>
                  <a href="edit.php?id=<?=$bonne_affaire['id']?>" class="text-primary" title="Editer">
                        <i class="fa fa-edit" aria-hidden="true" data-id="<?=$bonne_affaire['id']?>" ></i>
                      </a>
                  <a href="#" class="text-danger ml-2" title="Supprimer" data-id="<?=$bonne_affaire['id']?>"  
                         data-date_debut="<?=$bonne_affaire['date_debut']?>" onclick="onSupprimer(event)">
                        <i class="fa fa-trash" aria-hidden="true" data-id="<?=$bonne_affaire['id']?>"  
                         data-date_debut="<?=$bonne_affaire['date_debut']?>" ></i>
                      </a>
                  </span></td>
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
     <!-- confirmation de la reservation  -->
  <div class="modal" tabindex="-1" role="dialog" id="confirmSuppressioin" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmer suppression</h5>
        <button type="button" class="close" onclick="closeModal(event)" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="supAccessMBody">
        <p>Voulez-vous confirmer la suppression?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-confirm-suppression" onclick="supprimer(event)" class="btn btn-primary">Confirmer</button>
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
       onSupprimer = (event) => {
             event.preventDefault();
             var target = event.target;

             let id = $(target).data("id");
             let date_debut = $(target).data("date_debut");

             let mBody = document.getElementById('supAccessMBody');
             mBody.innerHTML = '';
             let body = date_debut +'<br><br> Supprimer ?';
                 body += '<input type="text" hidden value="'+id+'" name="bonne_affaireID" id="bonne_affaireID">';

              mBody.innerHTML = body;
              $('#confirmSuppressioin').modal({backdrop: 'static', keyboard: false}) 
              $('#confirmSuppressioin').modal('show');

        };

        supprimer =  (event) => {
          let id = $('#bonne_affaireID').val();
          var formData = new FormData();
          formData.append('_method', 'DELETE');
          formData.append('id', id);

          request = $.ajax({
          url: "bonne_affaireController.php",
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
              toastr.error("Une erreur est survenue lors de la suppression");
              console.log(err.message);
              return;
          }

          if(response.success){
            closeModal();

            toastr.success('Bonne_affaire supprimé');
            setTimeout(() => {
                window.location.href = window.location.origin+'/webshop/admin/bonne_affaire/index.php';
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
          $('#confirmSuppressioin').modal('hide');
        }
    </script>

  </body>