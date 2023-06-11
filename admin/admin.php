<?php
// Inclusion du fichier pour enregistrer les accès
// include("admin_counter.php");

// // Inclusion du fichier pour afficher le nombre d'accès
// include("admin_counter_display.php");


// if (isset($_POST['valider'])) {
//   if (!empty($_POST['userName']) and !empty($_POST['mdp'])) {
//     $userName_par_defaut = "admin";
//     $mdp_par_defaut = "12345";
//     $userName_saisi = htmlspecialchars($_POST['userName']);
//     $mdp_saisi = htmlspecialchars($_POST['mdp']);
//     if ($userName_saisi == $userName_par_defaut and $mdp_saisi == $mdp_par_defaut) {
//       session_start();
//       $_SESSION['isAdminConnected'] = TRUE;
//       $_SESSION['adminConnectedName'] = $userName_saisi;

//       header('Location: index.php');
//     } else {
//       echo "votre mot de passe ou userName incorrect";
//     }
//   } else {
//     echo "veuillez completez tous les champs";
//   }
// }

// Connexion à la base de données

 ?>





  <!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login/css/bootstrap.min.css">
    <link rel="stylesheet" href="login/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="login/plugins/sticky/css/slick.css">
    <link rel="stylesheet" href="login/plugins/sticky/css/slick-theme.css">
    <link rel="stylesheet" href="login/plugins/testimonial/css/owl.carousel.min.css">
    <link rel="stylesheet" href="login/plugins/testimonial/css/owl.theme.min.css">
    <link rel="stylesheet" href="login/css/style.css">

    <title>Next Technologies</title>
</head>



<body>

    <div id="home" class="container-fluid">

        <!--  ************************* Header Starts Here ************************** -->
                                                                             
                                                                                                                                              
          <!-- ######## Header End ####### --> 
         <div class="container">
             <div class="row">
                 <div class="col-sm-4 login-box">
                     <div class="title-box">
                         <h2>Admin Login</h2>
                         <p>s'il vous plait entrer les details de votre login</p>
                     </div>
                     <form method="POST" action="login.php">
                     <div class="row">
                         <input type="text" placeholder="Entrer Votre Username" class="form-control inpt-sm" name="username" autocomplete="off">
                     </div>
                     <div class="row">
                         <input type="password" placeholder="Entrer Votre mot de passe" class="form-control inpt-sm"name="password" >
                     </div>
                     <div class="row chk-lab">
        
                     </div>
                     <div class=" submot-row">
                         <button class="btn btn-sm btn-success"  type="submit" name="valider"><i class="fas fa-paper-plane"  type="submit" name="valider"></i> se connecter</button>
                     </div>
                     </form> 
                 </div>
             </div>
         </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
        
        </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="login/js/jquery-3.2.1.min.js"></script>
        <script src="login/js/popper.js"></script>
        <script src="login/js/bootstrap.min.js"></script>
        <script src="login/plugins/sticky/js/slick.min.js"></script>
        <script src="login/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
        <script src="login/plugins/testimonial/js/owl.carousel.min.js"></script>
        <script src="login/js/script.js"></script>
</body>

</html>