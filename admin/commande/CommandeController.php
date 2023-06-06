<?php
include '../../configDB.php';
include '../../webshopUtils.php';

// update statut commande
if ($_POST && $_POST['_method'] == 'UPDATE_STATUS') { 

    try {

        $compteId = $_SESSION['id'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
        $code = $_POST['code'];
        $id = $_POST['id'];
       
        if (!isset($code) || !strlen($code))
        {
            throw new InvalidArgumentException('status obligatoire');
        }
        if (!isset($id ) || !strlen($id ))
        {
            throw new InvalidArgumentException('Commande obligatoire');
        }
   
        $status = findStatusByCode('status_commande', $con, $code);
        if (!isset($status ) || empty($status))
        {
            throw new InvalidArgumentException('Le status n\'existe pas');
        }
        $status = (object) $status;
        
        $con->begin_transaction();
        
        if ($stmt = $con->prepare('UPDATE commande SET status_id =? WHERE id =? ')) {
            $stmt->bind_param('ss', $status->id, $id);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Status modifié']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}
