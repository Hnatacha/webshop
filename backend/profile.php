<?php
include '../configDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') 
{
    parse_str(file_get_contents("php://input"),$post_vars);
    try
    {

        $compteId = $_SESSION['id'];
        if(!strlen($compteId))
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
    
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

        if ($stmt = $con->prepare('UPDATE compte SET nom=?, prenom=?, email=?, mobile=?, adresse=? WHERE id = '.$compteId)) {
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

?>