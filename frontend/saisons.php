<?php
$loggedin = isset($_SESSION['loggedin']);
//$data = array('one', 'two', 'three');
$connexion = mysqli_connect("localhost", "root", "", "webshops");



//cette methode permet l'affichage des enregistrement d'une table en fct de l'id
function affichageParIdentifiant($table, $con, $id)
{
    $sql = "SELECT * FROM $table WHERE $id";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return "Empty table";
    }
}

//cette methode permet l'affichage des enregistrement d'une table en fct des saisons
function affichageParSaison($table, $con, $saison)
{
    $sql = "SELECT * FROM $table WHERE $saison ORDER BY id DESC";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return "Empty table";
    }
}
//cette methode permet de paginner 
function paginationParSaison($table, $firstPage, $messageParPage, $con, $saison)
{
    $sql = "SELECT * FROM $table WHERE $saison ORDER BY id DESC LIMIT $firstPage, $messageParPage ";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return "Empty table";
    }
}

$saisonSelectionne = affichageParIdentifiant("saison",$connexion, "id='".$_GET['idsaison']."'"); // exemple de retour $res[[1,"automne"]]; 

$produits = affichageParSaison("produit", $connexion, "saison_id='".$_GET['idsaison']."'");
$produitParPage = 9;
$nombreDePages = ceil(sizeof($produits) / $produitParPage);
if (isset($_GET['page'])) { // Si la variable $_GET['page'] existe... 
    $pageActuelle = intval($_GET['page']);
    if ($pageActuelle > $nombreDePages) { // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
        $pageActuelle = $nombreDePages;
    }
} else { // Sinon 
    $pageActuelle = 1; // La page actuelle est la n°1    
}

$premiereEntree = ($pageActuelle - 1) * $produitParPage; // On calcul la première entrée à lire
$elements = paginationParSaison("produit", $premiereEntree, $produitParPage, $connexion, "saison_id='".$_GET['idsaison']."'");
?>

<!DOCTYPE>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <title>webshop - Product Listing Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/templatemo-webshop.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/lightbox.css">
    <link rel="stylesheet" href="../assets/css/panier.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
    <?php include '../components/header.php'; ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Nos derniers Produits d'<?php echo $saisonSelectionne[0]["nom"] ?></h2>
                        <span>Decouvrez tous nos produits</span>
                    </div>
                </div>
            </div>
        </div>
       
        
        <div class="container">
            <div class="row">
              <?php include 'listProducts.php' ?>

                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <?php
                                for ($i = 1; $i <= $nombreDePages; $i++) { //On fait notre boucle
                                    //On va faire notre condition
                                    if ($i == $pageActuelle) { //Si il s'agit de la page actuelle...
                                        echo ' 
                                        <li class="active">
                                        <a href="#">' . $i . '</a>
                                        </li>';
                                    } else { //Sinon...
                                        echo ' 
                                            <li>
                                                <a href="products.php?page=' . $i . '">' . $i . '</a>
                                            </li>';
                                    }
                                } 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
         -->
    </section>
    <!-- ***** Products Area Ends ***** -->

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
    <script src="../assets/js/webshop.js"></script>

    
</body>