<?php
include '../../configDB.php';
include '../../webshopUtils.php';
$date_message = Date("y/m/d H:i:s");

// create new product
if ($_POST && $_POST['_method'] == 'POST') {

    try 
    {
        $compteId = $_SESSION['idcontact'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
        if (!isset($_POST['nom']) || !strlen($_POST['nom']))
        {
            throw new InvalidArgumentException('nom obligatoire');
        }
        if (!isset($_POST['email']) || !strlen($_POST['email']))
        {
            throw new InvalidArgumentException('email obligatoire');
        }
        if (!isset($_POST['message']) || !strlen($_POST['message']))
        {
            throw new InvalidArgumentException('message obligatoire');
        }
        
        if (!isset($_POST['etat']) || !strlen($_POST['etat']) )
        {
            throw new InvalidArgumentException('etat obligatoire');
        }
        

        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $etat = $_POST['etat'];
        $con->begin_transaction();

        if ($stmt = $con->prepare('INSERT INTO contact (nom, email, message, etat) VALUES (?, ?, ?, ?)')) 
        {
            $stmt->bind_param('ssss', $nom, $email, $message, $etat);
            $stmt->execute();
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            throw new InvalidArgumentException('Could not prepare statement!');
        }

        

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'contact enregistré']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}

// update product
if ($_POST && $_POST['_method'] == 'PUT') { 
    try 
    {
        $compteId = $_SESSION['idcontact'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
        if (!isset($_POST['nom']) || !strlen($_POST['nom']))
        {
            throw new InvalidArgumentException('nom obligatoire');
        }
        if (!isset($_POST['email']) || !strlen($_POST['email']))
        {
            throw new InvalidArgumentException('email obligatoire');
        }
        if (!isset($_POST['message']) || !strlen($_POST['message']))
        {
            throw new InvalidArgumentException('message obligatoire');
        }
        
        if (!isset($_POST['etat']) || !strlen($_POST['etat']) )
        {
            throw new InvalidArgumentException('etat obligatoire');
        }
        

        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $etat = $_POST['etat'];
        $con->begin_transaction();

        if ($stmt = $con->prepare('UPDATE contact SET nom=?, email=?, message=?,etat=? WHERE id =? ')) {
            $stmt->bind_param('ssss', $nom, $email,  $message, $etat);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }

        

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'contact enregistré']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }

       
}

// delete product
if ($_POST && $_POST['_method'] == 'DELETE') { 

    try {

        $compteId = $_SESSION['id'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
        
        $contactID = $_POST['idcontact'];
        if (!isset($contactID) || !strlen($contactID))
        {
            throw new InvalidArgumentException('Requette est invalide');
        }

        $produit = findById('contact', $con, $contactID);
        if(empty($produit))
        {
            throw new InvalidArgumentException('contact introuvable'); 
        }

        $con->begin_transaction();
        
        if ($stmt = $con->prepare('DELETE FROM contact where id=?')) {
            $stmt->bind_param('s', $contactID);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }

        $path = '../'.$produit->url;
        unlink($path);

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'contact supprimé']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}