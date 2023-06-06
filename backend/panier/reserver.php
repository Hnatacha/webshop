<?php
include '../../configDB.php';
include '../../webshopUtils.php';

if ($_POST) {

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    exit(json_encode(['success' => false, 'message' => 'Connectez vous avant de reserver']));
}

$compteId = $_SESSION['id'];

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['ids'], $_POST['qts']) && empty($_POST['ids']) && empty($_POST['qts'])) {
    // Could not get the data that should have been sent.
    exit (json_encode(['success' => false, 'message' => 'Aucun produit pour la reservation']));
}

//Todo: creer la table pour l'enresitrement
$date = new DateTime();
$dateCommande =  $date->format("y/m/d H:i:s");
try {
    $con->begin_transaction();

    $reference = generateReference('RES');
    if ($stmt = $con->prepare('INSERT INTO commande (date_commande, compte_id, reference) VALUES (?, ?, ?)')) {
        $stmt->bind_param('sss', $dateCommande,  $compteId, $reference);
        $stmt->execute();

        $commandeId = $con->insert_id;
    
        $ids = json_decode($_POST['ids']);
        $qts = json_decode($_POST['qts']);

        // enregistrement des lignes de commande
        if ($stmtInsertLigne = $con->prepare('INSERT INTO ligne_commande (produit_id, commande_id, quantity, prix, prix_total) VALUES (?, ?, ?, ?, ?)')) {

            foreach($ids as $k => $productId)
            {
                $price = 0;
                $total_price = 0;

                if ($stmt = $con->prepare('SELECT prix FROM produit WHERE id = ?')) {
                    $stmt->bind_param('i', $productId);
                    $stmt->execute();
                    $stmt->bind_result($price);
                    $stmt->fetch();
                    $stmt->close();

                    $quantity = $qts[$k];
                    $total_price = (int) $price * (int) $quantity; 
                   
                    $stmtInsertLigne->bind_param('sssss', $productId,  $commandeId, $quantity, $price, $total_price);
                    $stmtInsertLigne->execute();
                }
               
            }
            
           

        } else {
            $con->rollback();
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            throw new Exception('Une erreur est survenue');
        }
       
        $con->commit();
        $_SESSION['panier'] = array();
        exit (json_encode(['success' => true, 'message' => 'Reservation enregistré']));
    } else {
        $con->rollback();
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        throw new Exception('Une erreur est survenue');
    }

} catch (Exception $e){
    $con->rollback();
    exit (json_encode(['success' => false, 'message' => $e->getMessage()]));
} finally {
    $stmtInsertLigne->close();
}


}

?>