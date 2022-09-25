<?php
$loggedin = isset($_SESSION['loggedin']);
$data = array('one', 'two', 'three');
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


$produits = affichageParSaison("produit", $connexion, "saison_id=2");
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
$saisonSelectionne = affichageParIdentifiant("saison",$connexion, "id=2"); // exemple de retour $res[1,"automne"]; 
echo 'valll::::' .$saisonSelectionne[0];
$premiereEntree = ($pageActuelle - 1) * $produitParPage; // On calcul la première entrée à lire
$elements = paginationParSaison("produit", $premiereEntree, $produitParPage, $connexion, "saison_id=2");
?>

<!DOCTYPE>

