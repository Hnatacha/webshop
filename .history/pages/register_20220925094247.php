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

    <link rel="stylesheet" href="../assets/font/icomoon/style.css">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/templatemo-webshop.css">


    <link rel="stylesheet" href="../assets/css/lightbox.css">

    <style>
      .errorMessage {
        color: red;
        text-transform: lowercase;
        font-family: monospace;
        font-size: 13px;
      }
    </style>

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
    <?php include './components/banner.php'; ?>
    <!-- ***** Header Area End ***** -->


    <center>
      <div class="col-md-5 content">
        <div class="form-block">
          <div class="mb-4">
            <h3> <u><strong>INSCRIPTION</strong></u></h3>
            <p> veuillez remplir tous champs svp!!</p>
          </div>

          <form action="./traitement/inscription.php" method="post">
            <div class="form-group first">
              <label for="first name" align="left">Nom</label>
              <input type="text" class="form-control" id="nom" name="nom">
              <span class="errorMessage errorMessageNom" id="errorMessageNom">Veuillez renseigner votre nom</span>
            </div>
            <div class="form-group first">
              <label for="prenom">Prenom</label>
              <input type="text" class="form-control" id="prenom" name="prenom">
              <span class="errorMessage errorMessagePrenom" id="errorMessagePrenom">Veuillez renseigner votre prenom</span>
            </div>
            <div class="form-group first">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email">
              <span class="errorMessage errorMessageEmail" id="errorMessageEmail">Veuillez confirmer votre email</span>
            </div>
            <div class="form-group last mb-4">
              <label for="motdepasse">mot de passe </label>
              <input type="password" class="form-control" id="motdepasse" name="motdepasse">
              <span class="errorMessage errorMessageMotDePasse" id="errorMessageMotDePasse">Veuillez renseigner votre mot de passe</span>
            </div>
            <div class="form-group last mb-4">
              <label for="confirmermdp">confirmer mot de passe</label>
              <input type="password" class="form-control" id="confirmermdp" name="confirmermdp">
              <span class="errorMessage errorMessageConfirmationMotDePasse" id="errorMessageConfirmationMotDePasse">Veuillez confirmer votre mot de passe</span>
              <span class="errorMessage errorMessageMotDePasseDifferent" id="errorMessageMotDePasseDifferent">Les mots de passe sont differents</span>
            </div>

            <input id="valider" type="submit" name="submit" value="valider" class="btn btn-pill text-white btn-block btn-primary">
          </form>




        </div>
      </div>
    </center>
    <!-- ***** Subscribe Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php include './components/footer.php'; ?>


    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>

    <script>
      $(function() {
        $(".errorMessageNom").hide();
        $(".errorMessagePrenom").hide();
        $(".errorMessageEmail").hide();
        $(".errorMessageMotDePasse").hide();
        $(".errorMessageConfirmationMotDePasse").hide();
        $(".errorMessageMotDePasseDifferent").hide();
      });

      $("body").on("submit", function() {
        let valeurNom = $("#nom").val();
        let valeurPrenom = $("#prenom").val();
        let valeurEmail = $("#email").val();
        let valeurMotDePasse = $("#motdepasse").val();
        let valeurConfirmationMotDePasse = $("#confirmermdp").val();
        if (valeurNom == '') {
          $("#errorMessageNom").show();
          return false;
        } else {
          $(".errorMessageNom").hide();
        }
        if (valeurPrenom == '') {
          $("#errorMessagePrenom").show();
          return false;
        } else {
          $(".errorMessagePrenom").hide();
        }
        if (valeurEmail == '') {
          $("#errorMessageEmail").show();
          return false;
        } else {
          $(".errorMessageEmail").hide();
        }
        if (valeurMotDePasse == '') {
          $("#errorMessageMotDePasse").show();
          return false;
        } else {
          $(".errorMessageMotDePasse").hide();
        }
        if (valeurConfirmationMotDePasse == '') {
          $("#errorMessageConfirmationMotDePasse").show();
          return false;
        } else {
          $(".errorMessageConfirmationMotDePasse").hide();
        }
        if (valeurMotDePasse !== valeurConfirmationMotDePasse) {
          $("#errorMessageMotDePasseDifferent").show();
          return false;
        } else {
          $(".errorMessageMotDePasseDifferent").hide();
        }



      });
    </script>

  </body>
</php>