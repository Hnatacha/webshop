<?php 

     // db config
     include '../configDB.php'; 
     include '../webshopUtils.php';
     
     $commandes = recupererCommande($con);
     $totalArticle = 0;
     $montantTotal = 0;

?>

<!DOCTYPE>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>webshop - Mes reservations</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/css/templatemo-webshop.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/lightbox.css">
    <link rel="stylesheet" href="../assets/css/panier.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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

    <!-- ***** Header Area End ***** -->

    <!-- ***** Products Area Starts ***** -->
    <div class="content">
      <div class="container">
        <?php  if(empty($commandes)) {?>
            <img src="" alt="">
            <h2 class="mb-0 text-secondary">Aucune commande</h2>
        <?php } else {?>
            <section class="gradient-custom">
                <div class="">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Référence</th>
                                <th scope="col">Article(s)</th>
                                <th scope="col">Montant(€)</th> 
                                <th scope="col">Status</th> 
                                <th scope="col">Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($commandes as $k => $commande)
                            {
                                $totalArticle += (int)$commande['total_article'];
                                $montantTotal += (double)$commande['montant'];
                                $data = json_encode($commande);
                            ?>
                            <tr>
                                <th scope="row"><?= $k ?></th>
                                <td><?=$commande['date_commande'] ?></td>
                                <td><?=$commande['reference'] ?></td>
                                <td><?=$commande['total_article'] ?></td>
                                <td><?=$commande['montant'] ?></td>
                                <td><?=$commande['status'] ?></td>
                                <td><span>
                                    <a href="#" class="text-primary" title="Détail" onclick="detailCommande(event)" >
                                        <i class="fa fa-info-circle" aria-hidden="true" data-id="<?=$commande['id']?>" data-reference="<?=$commande['reference']?>"></i></a>
                                    <a href="#" class="text-danger ml-2" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </span></td>
                            </tr>

                            <?php
                           } ?>
                           <tr><th>Total</th><td></td><td></td><td class="font-weight-bold"><?=$totalArticle?></td><td class="font-weight-bold"><?=$montantTotal?></td></tr>
                        </tbody>
                    </table>
                </div>
            </section>
        <?php }?>
      </div>
    </div>

    <!-- Modal detail commande -->
<div class="modal" tabindex="-1" role="dialog" id="orderDetail">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span id="orderDetailRef"> </span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="orderDetailBody">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
         
    
    <!-- ***** Products Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php include '../components/footer.php'; ?>


    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

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
    <script src="../assets/js/webshop.js"></script>

    <script>
        detailCommande = (event) => {
             var target = event.target;
             let id = $(target).data("id");
             let reference = $(target).data("reference");

             let mTitle = document.getElementById('orderDetailRef');
             let mBody = document.getElementById('orderDetailBody');
             mTitle.innerHTML = 'Détail commande: '+reference;
             mBody.innerHTML = '';

             request = $.ajax({
                url: "../backend/orderItem.php?commande="+id,
                type: "get",
            });

            // Callback handler that will be called on success
            request.done(function(response, textStatus, jqXHR) {
                // Log a message to the console
                let resp = JSON.parse(response)
                console.log(resp);
                if(resp.success === true) {

                  var tableData = " <table class='table'><thead> <tr> <th scope='col'></th> "
                                  + " <th scope='col'>Nom</th> <th scope='col'>Catégorie</th> "
                                  + " <th scope='col'>Prix(€)</th> <th scope='col'>Quantité</th> "
                                  + " </tr>  </thead> <tbody> ";

                  resp.response.forEach((item) => {
                    tableData += `<tr>`;
                    tableData += '<td><img src="'+item.image+'" style="width: 30px; height: 50px;"></td>';
                    tableData += '<td class="">'+item.libelle+'</td>';
                    tableData += '<td class="">'+item.nom_categorie+'</td>';
                    tableData += '<td class="">'+item.prix+'</td>';
                    tableData += '<td class="">'+item.quantity+'</td>';
                    tableData += `</tr>`;
                  });

                  tableData += `</tbody> </table>`;
                  mBody.innerHTML = tableData;

                  $('#orderDetail').modal('show');

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

           //  $('#orderDetail').modal('hide');
            console.log(reference);
        }
    </script>

</body>