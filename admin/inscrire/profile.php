<?php
include '../../configDB.php';

// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT datedeconfirmation, email, nom, prenom, mobile, adresse FROM compte WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($datedeconfirmation, $email, $nom, $prenom, $mobile, $adresse);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <title>webshop - Profil</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/css/templatemo-webshop.css">

    <link rel="stylesheet" href="../../assets/css/lightbox.css">
    <link rel="stylesheet" href="../../assets/css/panier.css">
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
    <?php include '../../components/banner.php'; ?>
    <!-- ***** Header Area End ***** -->

    <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="../assets/images/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?= $nom ?> <?= $prenom ?></h5>
                            <p class="text-muted mb-4"><?= $adresse ?></p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary" id="edit-profile">Modifier</button>
                                <button type="button" class="btn btn-outline-primary ms-1"><a href="../backend/delete.php"> Supprimer </a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form id="form-profile">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nom/Prénom</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col"><input type="text" class="form-control text-muted mb-0" require name="nom" placeholder="Nom" id="nom" value="<?= $nom ?>"></div>
                                            <div class="col"><input type="text" class="form-control text-muted mb-0"  name="prenom" placeholder="Prénom" id="prenom" value="<?= $prenom ?>"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-muted mb-0" name="email" require placeholder="Email" id="email" value="<?= $email ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Mobile</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-muted mb-0" name="mobile" placeholder="Mobile" id="mobile" value="<?= $mobile ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Adresse</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-muted mb-0" name="addresse" placeholder="Votre adresse" id="adresse" value="<?= $adresse ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1"><a href="reservation.php">Mes reservations</a></span>
                            </p>
                        </div>
                        </div>
                    </div>
            
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Subscribe Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php include '../../components/footer.php'; ?>


    <!-- jQuery -->
    <script src="../../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../../assets/js/popper.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


    <!-- Plugins -->
    <script src="../../assets/js/owl-carousel.js"></script>
    <script src="../../assets/js/accordions.js"></script>
    <script src="../../assets/js/datepicker.js"></script>
    <script src="../../assets/js/scrollreveal.min.js"></script>
    <script src="../../assets/js/waypoints.min.js"></script>
    <script src="../../assets/js/jquery.counterup.min.js"></script>
    <script src="../../assets/js/imgfix.min.js"></script>
    <script src="../../assets/js/slick.js"></script>
    <script src="../../assets/js/lightbox.js"></script>
    <script src="../../assets/js/isotope.js"></script>
    <script src="../../assets/js/main.js"></script>

    <!-- Global Init -->
    <script src="../../assets/js/custom.js"></script>
    <script src="../../assets/js/webshop.js"></script>

    <script>

        let form = document.getElementById('form-profile');

        reloadWindows = () => {
            window.location.href = window.location.href;
        }
        
        $("#edit-profile").on("click", function() {
            
            event.preventDefault;
            

            let valeurNom = $("#nom").val();
            let valeurPrenom = $("#prenom").val();
            let valeurEmail = $("#email").val();
            let valeurMobile = $("#mobile").val();
            let valeurAdresse = $("#adresse").val();

            let valeurMotDePasse = $("#motdepasse").val();
            let valeurNouveauMotDePasse = $("#confirmermdp").val();

            request = $.ajax({
                url: "../backend/profile.php",
                type: "put",
                data: {
                    nom: valeurNom,
                    prenom: valeurPrenom,
                    email: valeurEmail,
                    mobile: valeurMobile,
                    adresse: valeurAdresse
                }
            });

            // Callback handler that will be called on success
            request.done(function(response, textStatus, jqXHR) {
                // Log a message to the console
                console.log(response);
                let resp = JSON.parse(response)
                if(resp.success === true) {
                 toastr.success(resp.message);
                 setTimeout(reloadWindows, 1000);
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
    </script>

</body>
</php>