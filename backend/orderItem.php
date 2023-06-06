<?php
include '../configDB.php';

if ($_GET) 
{

  try
  {
    // Now we check if the data was submitted, isset() function will check if the data exists.
    if (!isset($_GET['commande']) || empty($_GET['commande'])) 
    {
        throw new Exception("Aucune commande trouvé");
    }

    $commadeId = $_GET['commande'];
    $compteId = $_SESSION['id'];
    if(!strlen($compteId))
    {
        throw new Exception("Vous n'est pas connecté");
    }

    $query = " SELECT LC.id AS lc_id, P.libelle, CT.nom nom_categorie, LC.quantity, LC.prix, P.url AS image 
            FROM ligne_commande LC 
            JOIN commande C ON LC.commande_id  = C.id 
            JOIN produit P ON P.id  = LC.produit_id 
            JOIN categorie CT ON CT.id  = P.categorie_id 
            WHERE C.id = " .$commadeId. "  AND C.compte_id = " .$compteId. " ; ";
    
    $db = mysqli_query($con, $query);

    if (mysqli_num_rows($db) > 0) 
    {
      return exit(json_encode(['success' => true, 'response' => mysqli_fetch_all($db, MYSQLI_ASSOC)]));
    } else {
      return exit(json_encode(['success' => true, 'response' => array()]));
    }

  } catch(Exception $ex) {
    exit(json_encode(['success' => false, 'message' => $ex->getMessage()]));
  }

}

?>