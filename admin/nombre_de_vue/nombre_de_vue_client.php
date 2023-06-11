<!DOCTYPE php>
<php lang="en">

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



    <!-- ***** Header Area Start ***** -->
    <?php include '../partial/sidebar.php'; ?>

    <!-- ***** Header Area End ***** -->
  

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
  <?php include '../partial/header.php'; ?>
  
  <div class="content">
    <div class="container">
      <div class="row align-items-center">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "webshops";
        
        $conn = new mysqli($servername, $username, $password, $database);
        
        // Vérification de la connexion
        if ($conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $conn->connect_error);
        }
        
        // Liste des produits
        $admin_vues = mysqli_query($conn, "SELECT compte.nom, compteur_client.vues, compteur_client.derniere_ip FROM compteur_client JOIN compte ON compteur_client.utilisateur_id = compte.id");
        
        // Vérification si des données sont disponibles
        if (mysqli_num_rows($admin_vues) > 0) {
            $quantite_totale = 0;
            ?>
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">nom_admin</th>
                  <th scope="col">nombre_vue</th>
                  <th scope="col">adresse_ip</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Boucle à travers les résultats
                while ($admin_vue = mysqli_fetch_assoc($admin_vues)) {
                    $quantite_totale += $admin_vue['vues'];
                    ?>
                    <tr>
                      <td class="text-left"><?= $admin_vue['nom'] ?></td>
                      <td class="text-left"><?= $admin_vue['vues'] ?></td>
                      <td class="text-left"><?= $admin_vue['derniere_ip'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr class="total">
                  <th>nombre_total_vue : <?= $quantite_totale ?></th>
                </tr>
              </tbody>
            </table>
            
            <?php
        } else {
            echo "Votre tableau  est vide";
        }
        ?>

      </div>
    </div>
  </div>
</div>


          </div>
        </div>
        <?php include '../partial/footer.php'; ?>
      </div>


      <!-- confirmation de la reservation  -->

      <!-- ***** Subscribe Area Ends ***** -->

      <!-- ***** Footer Start ***** -->



      <!-- jQuery -->
      <script src="../assets/js/jquery-2.1.0.min.js"></script>

      <!-- Bootstrap -->
      <script src="../assets/js/popper.js"></script>
      <script src="../assets/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



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


  </body>
</php>