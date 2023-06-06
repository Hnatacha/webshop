<?php
include '../../configDB.php';
include '../../webshopUtils.php';
$date_message = Date("y/m/d H:i:s");

// create new accessoire
if ($_POST && $_POST['_method'] == 'POST') {

    try 
    {
        $compteId = $_SESSION['id'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
        if (!isset($_POST['nom']) || !strlen($_POST['nom']))
        {
            throw new InvalidArgumentException('Nom obligatoire');
        }


        $nom = $_POST['nom'];

        $con->begin_transaction();

        if ($stmt = $con->prepare('INSERT INTO accessoire (nom) VALUES (?)')) 
        {
            $stmt->bind_param('s', $nom);
            $stmt->execute();
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            throw new InvalidArgumentException('Could not prepare statement!');
        }

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Accessoire enregistré']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}

// update accessoire
if ($_POST && $_POST['_method'] == 'PUT') { 

    try {

        $compteId = $_SESSION['id'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
        
        $nom = $_POST['nom'];

        if (!isset($nom) || !strlen($nom))
        {
            throw new InvalidArgumentException('Nom obligatoire');
        }

       
        $accessoireId = $_POST['id'];

        $con->begin_transaction();
        

        if ($stmt = $con->prepare('UPDATE accessoire SET nom=? WHERE id =? ')) {
            $stmt->bind_param('ss', $nom, $accessoireId);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }


        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Accessoire modifié']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}

// delete accessoire
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

        $accessoire = findById('accessoire', $con, $ID);
        if(empty($accessoire))
        {
            throw new InvalidArgumentException('Accessoire introuvable'); 
        }

        $con->begin_transaction();
        
        if ($stmt = $con->prepare('DELETE FROM accessoire where id=?')) {
            $stmt->bind_param('s', $ID);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Accessoire supprimé']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}