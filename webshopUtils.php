
<?php


//supprimer les produits
//si la variable del existe
if (isset($_GET['del'])) {
    $id_del = $_GET['del'];
    //suppression
    unset($_SESSION['produit'][$id_del]);
}


function searchProductsCount($con, $search)
{

    $sql = " SELECT COUNT(P.id) AS total FROM produit as  P 
    LEFT JOIN categorie as C ON C.id = P.categorie_id
    LEFT JOIN saison  as S ON S.id = P.saison_id
    LEFT JOIN accessoire as A ON A.id = P.accessoire_id
    WHERE P.libelle LIKE '%" . $search . "%'
      OR P.description LIKE '%" . $search . "%'
      OR C.nom LIKE '%" . $search . "%'
      OR S.nom LIKE '%" . $search . "%' 
      OR A.nom LIKE '%" . $search . "%'
      ORDER BY P.id DESC";

    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}
function PaginateProducts($con, $search, $pageFirstResult, $perPage)
{
    if ($_GET) {

        try {
            // Now we check if the data was submitted, isset() function will check if the data exists.
            if (!isset($_GET['commande']) || empty($_GET['commande'])) {
                throw new Exception("Aucune commande trouvé");
            }

            $commadeId = $_GET['commande'];
            $compteId = $_SESSION['id'];
            if (!strlen($compteId)) {
                throw new Exception("Vous n'est pas connecté");
            }

            $query = " SELECT LC.id AS lc_id, P.libelle, CT.nom nom_categorie, LC.quantity, LC.prix, P.url AS image 
            FROM ligne_commande LC 
            JOIN commande C ON LC.commande_id  = C.id 
            JOIN produit P ON P.id  = LC.produit_id 
            JOIN categorie CT ON CT.id  = P.categorie_id 
            JOIN
            WHERE C.id = " . $commadeId . "  AND C.compte_id = " . $compteId . " ; ";

            $db = mysqli_query($con, $query);

            if (mysqli_num_rows($db) > 0) {
                return exit(json_encode(['success' => true, 'response' => mysqli_fetch_all($db, MYSQLI_ASSOC)]));
            } else {
                return exit(json_encode(['success' => true, 'response' => array()]));
            }
        } catch (Exception $ex) {
            exit(json_encode(['success' => false, 'message' => $ex->getMessage()]));
        }
    }
    $sql = " SELECT P. *, C.nom AS nom_categorie, S.nom AS nom_saison FROM produit as  P 
    LEFT JOIN categorie as C ON C.id = P.categorie_id 
    LEFT JOIN saison  as S ON S.id = P.saison_id
    LEFT JOIN accessoire as A ON A.id = P.accessoire_id
    WHERE P.libelle LIKE '%$search%'
      OR P.description LIKE '%$search%'
      OR C.nom LIKE '%$search%'
      OR S.nom LIKE '%$search%' 
      OR A.nom LIKE '%$search%'
      ORDER BY P.id DESC LIMIT $pageFirstResult, $perPage";

    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}

function searchPaginateProducts($con, $search, $pageFirstResult, $perPage)
{

    $sql = " SELECT P. *, C.nom AS nom_categorie, S.nom AS nom_saison FROM produit as  P 
    LEFT JOIN categorie as C ON C.id = P.categorie_id 
    LEFT JOIN saison  as S ON S.id = P.saison_id
    LEFT JOIN accessoire as A ON A.id = P.accessoire_id
    WHERE P.libelle LIKE '%$search%'
      OR P.description LIKE '%$search%'
      OR C.nom LIKE '%$search%'
      OR S.nom LIKE '%$search%' 
      OR A.nom LIKE '%$search%'
      ORDER BY P.id DESC LIMIT $pageFirstResult, $perPage";

    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}



function affichage($table, $con)
{
    $sql = "SELECT * FROM $table WHERE accessoire_id IS NULL ORDER BY id DESC";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}
function affichageSaison($table, $con)
{
    $sql = "SELECT * FROM $table  ORDER BY id DESC";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}
//cette methode permet l'affichage des enregistrement d'une table en fct de l'id
function findById($table, $con, $id)
{
    $sql = "SELECT * FROM $table WHERE $table.id = $id";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_object($query);
    } else {
        return null;
    }
}

function findByAllOrderBy($table, $con, $column = 'id')
{
    $sql = "SELECT * FROM $table ORDER BY $column";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}

//cette methode permet l'affichage des enregistrement d'une table en fct des saisons
function affichageParSaison($table, $con, $saison)
{
    $sql = "SELECT * FROM $table WHERE $saison WHERE accessoire_id IS NULL ORDER BY id DESC";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}
//cette methode permet de paginner 

//cette methode permet de paginner 
function pagination($table, $firstPage, $messageParPage, $con)
{
    $sql = "SELECT * FROM $table WHERE accessoire_id IS NULL ORDER BY id DESC LIMIT $firstPage, $messageParPage ";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}
function paginationParSaison($table, $firstPage, $messageParPage, $con, $saison)
{
    $sql = "SELECT * FROM $table WHERE $saison AND accessoire_id IS NULL  ORDER BY id DESC LIMIT $firstPage, $messageParPage ";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}


//
function affichageBonneAffaire($tableA, $tableB, $con)
{
    $sql = "SELECT * FROM  $tableA
                                    INNER JOIN $tableB 
                                    ON  $tableA.bonne_affaire_id = $tableB.id";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}

function paginationBonneAffaire($tableA, $tableB, $firstPage, $messageParPage, $con)
{

    $sql = "SELECT * FROM  $tableA
        INNER JOIN $tableB 
        ON  $tableA.bonne_affaire_id = $tableB.id ORDER BY $tableA.id DESC LIMIT $firstPage, $messageParPage";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}

//
function affichageAccessoire($tableA, $tableB, $con)
{
    $sql = "SELECT * FROM  $tableA
                         JOIN $tableB  ON  $tableA.accessoire_id = $tableB.id";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}
function paginationAccessoire($tableA, $tableB, $firstPage, $messageParPage, $con)
{

    $sql = "SELECT * FROM  $tableA
        INNER JOIN $tableB 
        ON  $tableA.accessoire_id = $tableB.id ORDER BY $tableA.id DESC LIMIT $firstPage, $messageParPage";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        return array();
    }
}

/**
 * generate reference by type in webshop
 *
 * @param string $type
 * @param integer $bytes
 * @return string la reference généré
 */
function generateReference($type, $bytes = 5)
{
    $date = new DateTime();
    $reference = 'WESP' . $date->format('Ymd') . $type . rand(10, 200);
    return strtoupper($reference);
}

/**
 * Récupération des commandes du compte courant
 *
 * @param [type] $con db connexion
 * @return array liste des commandes
 */
function recupererCommande($con)
{
    $compteId = $_SESSION['id'];
    if (!strlen($compteId)) {
        return array();
    }

    $query = " SELECT   sc.nom AS status, C.id,  C.date_commande, C.reference, count(LC.id) AS total_article, sum(LC.prix_total) AS montant
                 FROM commande C  
                 JOIN ligne_commande LC ON LC.commande_id  = C.id
                 LEFT JOIN status_commande as sc ON sc.id = C.status_id
                 WHERE C.compte_id = " . $compteId . "
                 GROUP BY C.id ; ";

    $db = mysqli_query($con, $query);
    if (mysqli_num_rows($db) > 0) {
        return mysqli_fetch_all($db, MYSQLI_ASSOC);
    } else {
        return array();
    }
}

function recupererInfoCommande($con)
{
    /* $compteId = $_SESSION['id'];
    if (!strlen($compteId)) {
        return array();
    } */

    $query = " SELECT C.id, LC.id AS ligne_commande_id, P.libelle AS libelle_produit, 
      C.reference, C.date_commande, LC.prix, sc.nom AS status,  C.status_id, LC.quantity, CONCAT(CPTE.nom, ' ', CPTE.prenom) AS nom_client
      FROM ligne_commande LC 
      JOIN commande C ON LC.commande_id  = C.id 
      JOIN produit P ON P.id  = LC.produit_id 
      LEFT JOIN status_commande as sc ON sc.id = C.status_id
      JOIN compte CPTE ON CPTE.id  = C.compte_id ";

    $db = mysqli_query($con, $query);
    if (mysqli_num_rows($db) > 0) {
        return mysqli_fetch_all($db, MYSQLI_ASSOC);
    } else {
        return array();
    }
}


/**
 * Utilisé cette fonction juste sur les tables de style status
 *
 * @param [type] $table
 * @param [type] $con
 * @param [type] $code
 * @return void
 */
function findStatusByCode($table, $con, $code)
{
    $sql = "SELECT * FROM $table WHERE $table.`code` = '$code'";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        return mysqli_fetch_object($query);
    } else {
        return null;
    }
}
?>
