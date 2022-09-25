<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: connexion.php');
    exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'webshops';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT mot_de_passe, email,  FROM compte WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
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


    <title>webshop - Membre Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/templatemo-webshop.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/lightbox.css">
    <link rel="stylesheet" href="../assets/css/panier.css">
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

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Espace Membre <?=$_SESSION['email']?></h2>
                        <span> veuillez souscrire a l'une des conditions pour etre membre </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->

        <center>
            <div class="main-border-button">

                <a href="register.php"> Inscription </a>

                <span> </span>


                <a href="connexion.php"> connection </a>
            </div>
        </center>








</body>
<!-- ***** Footer Start ***** -->
<?php include '../components/footer.php'; ?>

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

<!-- Global Init -->
<script src="../assets/js/custom.js"></script>

<script>
    $(function() {
        var selectedClass = "";
        $("p").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function() {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });
</script>

</html>