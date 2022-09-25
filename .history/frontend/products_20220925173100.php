<?php
$loggedin = isset($_SESSION['loggedin']);
$data = array('one', 'two', 'three');
$connexion = mysqli_connect("localhost", "root", "", "webshops");

//cette methode permet l'affichage des enregistrement d'une table
function affichage($table, $con)
{
    $sql = "SELECT * FROM $table ORDER BY id DESC";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return "Empty table";
    }
}
//cette methode permet de paginner 
function pagination($table, $firstPage, $messageParPage, $con)
{
    $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $firstPage, $messageParPage ";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return "Empty table";
    }
}


$produits = affichage("produit", $connexion);
$produitParPage = 5;
$nombreDePages = ceil(sizeof($produits) / $produitParPage);
if (isset($_GET['page'])) { // Si la variable $_GET['page'] existe... 
    $pageActuelle = intval($_GET['page']);
    if ($pageActuelle > $nombreDePages) { // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
        $pageActuelle = $nombreDePages;
    }
} else { // Sinon 
    $pageActuelle = 1; // La page actuelle est la n°1    
}
$premiereEntree = ($pageActuelle - 1) * $messagesParPage; // On calcul la première entrée à lire
$elements = pagination("produit", $premiereEntree, $produitParPage, $connexion);
?>

