<?php
include '../../configDB.php';
include '../../webshopUtils.php';
$datedeconfirmation = Date("y/m/d H:i:s");

// create new inscription
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
            throw new InvalidArgumentException('nom obligatoire');
        }
        if (!isset($_POST['prenom']) || !strlen($_POST['prenom']))
        {
            throw new InvalidArgumentException('prenom obligatoire');
        }
        if (!isset($_POST['email']) || !strlen($_POST['email']) )
        {
            throw new InvalidArgumentException('email obligatoire');
        }
        
        if (!isset($_POST['mobile']) || !strlen($_POST['mobile']) )
        {
            throw new InvalidArgumentException('mobile obligatoire');
        }

       
        if (!isset($_POST['adresse']) || !strlen($_POST['adresse']) )
        {
            throw new InvalidArgumentException('adresse obligatoire');
        }


        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mobile = (isset($_POST['mobile']) && strlen($_POST['mobile'])) ? $_POST['mobile'] : null;
        $adresse = (isset($_POST['adresse']) && strlen($_POST['adresse'])) ? $_POST['adresse'] :  null;
        $mot_de_passe=$_POST['mot_de_passe'];

           
        $con->begin_transaction();

        if ($stmt = $con->prepare('INSERT INTO compte (nom, prenom, email,mot_de_passe,datedeconfirmation, mobile,adresse ) VALUES (?, ?, ?, ?, ?, ?,? )')) 
        {
            $stmt->bind_param('ssssssss', $nom, $prenom, $email, $mot_de_passe,$datedeconfirmation,$mot_de_passe, $mobile, $adresse);
            $stmt->execute();
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            throw new InvalidArgumentException('Could not prepare statement!');
        }

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'inscription enregistré']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}

// update inscription
/* if ($_POST && $_POST['_method'] == 'PUT') { 

    try {

       
        if (!isset($_POST['nom']) || !strlen($_POST['nom']))
        {
            throw new InvalidArgumentException('nom obligatoire');
        }
        if (!isset($_POST['prenom']) || !strlen($_POST['prenom']))
        {
            throw new InvalidArgumentException('prenom obligatoire');
        }
        if (!isset($_POST['email']) || !strlen($_POST['email']) )
        {
            throw new InvalidArgumentException('email obligatoire');
        }
    
        if (!isset($_POST['mobile']) || !strlen($_POST['mobile']) )
        {
            throw new InvalidArgumentException('mobile obligatoire');
        }
        if (!isset($_POST['adresse']) || !strlen($_POST['adresse']) )
        {
            throw new InvalidArgumentException('adresse obligatoire');
        }


        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mobile = (isset($_POST['mobile']) && strlen($_POST['mobile'])) ? $_POST['mobile'] : null;
        $adresse = (isset($_POST['adresse']) && strlen($_POST['adresse'])) ? $_POST['adresse'] :  null;
       
        $con->begin_transaction();
       
        

       
        

       if ($stmt = $con->prepare('UPDATE compte SET nom=?, prenom=?, email=?, mobile=?,
             adresse=? WHERE id =? ')) {
            $stmt->bind_param('ssssss', $nom, $prenom,  $email, $mobile, $adresse);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }


        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'inscription modifié']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}
 */

if ($_SERVER['REQUEST_METHOD'] == 'PUT') 
{
    parse_str(file_get_contents("php://input"),$post_vars);
    try
    {

    
        if (!isset($post_vars['nom']) || !strlen($post_vars['nom']))
        {
           throw new InvalidArgumentException('Le nom est obligatoire');
        }
        if (!isset($post_vars['email']) || !strlen($post_vars['email'])) 
        {
            throw new InvalidArgumentException("L'adresse email est obligatoire");
        }
        if (!filter_var($post_vars['email'], FILTER_VALIDATE_EMAIL)) 
        {
            throw new InvalidArgumentException("L'adresse email est invalide");
        }

        $con->begin_transaction();

        if ($stmt = $con->prepare('UPDATE compte SET nom=?, prenom=?, email=?, mobile=?, adresse=? WHERE id = ?')) {
            $stmt->bind_param('sssss', $post_vars['nom'], $post_vars['prenom'],  $post_vars['email'], $post_vars['mobile'], $post_vars['adresse']);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Profil modifié']));
    }catch(InvalidArgumentException $exArg){
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    }
    catch(Exception $ex){
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue']));
    }

}


// delete inscription
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

        $inscription = findById('compte', $con, $ID);
        if(empty($inscription))
        {
            throw new InvalidArgumentException('inscription introuvable'); 
        }

        $con->begin_transaction();
        
        if ($stmt = $con->prepare('DELETE FROM compte where id=?')) {
            $stmt->bind_param('s', $ID);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'inscription supprimé']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}