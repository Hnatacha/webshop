<?php
include '../../configDB.php';
include '../../webshopUtils.php';
$date_message = Date("y/m/d H:i:s");

// create new bonne_affaire
if ($_POST && $_POST['_method'] == 'POST') {

    try 
    {
        $compteId = $_SESSION['id'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
        if (!isset($_POST['date_debut']) || !strlen($_POST['date_debut']))
        {
            throw new InvalidArgumentException('date_debut obligatoire');
        }
        if (!isset($_POST['date_fin']) || !strlen($_POST['date_fin']))
        {
            throw new InvalidArgumentException('date_fin obligatoire');
        }
        if (!isset($_POST['pourcentage']) || !strlen($_POST['pourcentage']))
        {
            throw new InvalidArgumentException('pourcentage obligatoire');
        }
        if (empty($_POST['date_debut']) || empty($_POST['date_fin']) ||empty($_POST['pourcentage']) ) {
            // One or more values are empty.
            exit('Please complete the registration form');
        }
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $pourcentage = $_POST['pourcentage'];


        $con->begin_transaction();

        if ($stmt = $con->prepare('INSERT INTO bonne_affaire (date_debut,date_fin, pourcentage) VALUES (?,?,?)')) 
        {
            $stmt->bind_param('sss',"'.$date_debut'","'.$date_fin.'","'.$pourcentage.'");
            $stmt->execute();
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            throw new InvalidArgumentException('Could not prepare statement!');
        }

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Bonne_affaire enregistré']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}

// update bonne_affaire
if ($_POST && $_POST['_method'] == 'PUT') { 

    try {

        $compteId = $_SESSION['id'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }

        if (!isset($_POST['date_debut']) || !strlen($_POST['date_debut']))
        {
            throw new InvalidArgumentException('date_debut obligatoire');
        }
        if (!isset($_POST['date_fin']) || !strlen($_POST['date_fin']))
        {
            throw new InvalidArgumentException('date_fin obligatoire');
        }
        if (!isset($_POST['pourcentage']) || !strlen($_POST['pourcentage']))
        {
            throw new InvalidArgumentException('pourcentage obligatoire');
        }
        if (empty($_POST['date_debut']) || empty($_POST['date_fin']) ||empty($_POST['pourcentage']) ) {
            // One or more values are empty.
            exit('Please complete the registration form');
        }
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
        $pourcentage = $_POST['pourcentage'];
       
        $bonne_affaireId = $_POST['id'];

        $con->begin_transaction();
        

        if ($stmt = $con->prepare('UPDATE bonne_affaire SET date_debut=? date_fin=? pourcentage = ?  WHERE id =? ')) {
            $stmt->bind_param('sss', $date_debut,$date_fin, $pourcentage);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }


        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Bonne_affaire modifié']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}

// delete bonne_affaire
if ($_POST && $_POST['_method'] == 'DELETE') { 

    try {

        $compteId = $_SESSION['id'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
        
        $ID = $_POST['id'];
        if (!isset($ID) || !strlen($ID))
        {
            throw new InvalidArgumentException('Requette est invalide');
        }

        $bonne_affaire = findById('bonne_affaire', $con, $ID);
        if(empty($bonne_affaire))
        {
            throw new InvalidArgumentException('Bonne_affaire introuvable'); 
        }

        $con->begin_transaction();
        
        if ($stmt = $con->prepare('DELETE FROM bonne_affaire where id=?')) {
            $stmt->bind_param('s', $ID);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Bonne_affaire supprimé']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}