<?php
include '../../configDB.php';
include '../../webshopUtils.php';
$date_message = Date("y/m/d H:i:s");

// create new product
if ($_POST && $_POST['_method'] == 'POST') {

    try 
    {
        $compteId = $_SESSION['id'];
        if (!strlen($compteId)) 
        {
            throw new InvalidArgumentException("Vous n'est pas connecté");
        }
        if (!isset($_POST['libelle']) || !strlen($_POST['libelle']))
        {
            throw new InvalidArgumentException('Libelle obligatoire');
        }
        if (!isset($_POST['categorie_id']) || !strlen($_POST['categorie_id']))
        {
            throw new InvalidArgumentException('Catégorie obligatoire');
        }
        if (!isset($_POST['saison_id']) || !strlen($_POST['saison_id']) )
        {
            throw new InvalidArgumentException('Saison obligatoire');
        }
        if (!isset($_POST['prix']) || !strlen($_POST['prix']) )
        {
            throw new InvalidArgumentException('Prix obligatoire');
        }
        if (!isset($_POST['rate']) || !strlen($_POST['rate']) )
        {
            throw new InvalidArgumentException('Rate obligatoire');
        }
        if (!$_FILES['file'] || $_FILES['file']['size'] <= 0)
        {
            throw new InvalidArgumentException('Image obligatoire');
        }


        $libelle = $_POST['libelle'];
        $quantite = $_POST['quantite'];
        $prix = $_POST['prix'];
        $prixReduction = $_POST['prix_reduction'];
        $description = $_POST['description'];
        $rate = $_POST['rate'];
        $categorie_id = $_POST['categorie_id'];
        $saison_id = $_POST['saison_id'];
        $accessoire_id = (isset($_POST['accessoire_id']) && strlen($_POST['accessoire_id'])) ? $_POST['accessoire_id'] : null;
        $bonne_affaire_id = (isset($_POST['bonne_affaire_id']) && strlen($_POST['bonne_affaire_id'])) ? $_POST['bonne_affaire_id'] :  null;
        $url = null;
        if($_FILES['file'] && $_FILES['file']['size']>0)
        {
            $path_parts = pathinfo($_FILES["file"]["name"]);
            $extension = $path_parts['extension'];

            $filename = Date("YmdHis").uniqid().'.'.$extension;
            $url = "../assets/images/$filename";
            $tmp_image= $_FILES["file"]["tmp_name"];
        }

        $con->begin_transaction();

        if ($stmt = $con->prepare('INSERT INTO produit (libelle, description, quantite, prix, prix_reduction, rate, categorie_id, saison_id, accessoire_id, 
               bonne_affaire_id, url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) 
        {
            $stmt->bind_param('sssssssssss', $libelle, $description, $quantite, $prix, $prixReduction, $rate, $categorie_id, $saison_id, $accessoire_id, $bonne_affaire_id, $url);
            $stmt->execute();
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            throw new InvalidArgumentException('Could not prepare statement!');
        }

        if($_FILES['file'])
        {
            move_uploaded_file($tmp_image,"../../assets/images/$filename");
        }

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Produit enregistré']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        if($_FILES['file'])
        {
            unlink("../../assets/images/$filename");
        }
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}

// update product


// Définition de la fonction getPrixProduit
function getPrixProduit($productId, $con) {
    $prix = floatval($_POST['prix']);

    // Effectuez une requête SQL pour récupérer le prix actuel du produit à partir de la base de données
    // Assurez-vous d'utiliser des requêtes préparées pour éviter les attaques par injection SQL
    $stmt = $con->prepare('SELECT prix FROM produit WHERE id = ?');
    $stmt->bind_param('s', $productId);
    $stmt->execute();
    $stmt->bind_result($prix);
    $stmt->fetch();
    $stmt->close();

    return $prix;
}

if ($_POST && $_POST['_method'] == 'PUT') { 
    try {
        $compteId = $_SESSION['id'];
        if (!strlen($compteId)) {
            throw new InvalidArgumentException("Vous n'êtes pas connecté");
        }

        if (!isset($_POST['libelle']) || !strlen($_POST['libelle'])) {
            throw new InvalidArgumentException('Libellé obligatoire');
        }
        if (!isset($_POST['categorie_id']) || !strlen($_POST['categorie_id'])) {
            throw new InvalidArgumentException('Catégorie obligatoire');
        }
        if (!isset($_POST['saison_id']) || !strlen($_POST['saison_id'])) {
            throw new InvalidArgumentException('Saison obligatoire');
        }
        if (!isset($_POST['prix']) || !strlen($_POST['prix'])) {
            throw new InvalidArgumentException('Prix obligatoire');
        }
        if (!isset($_POST['rate']) || !strlen($_POST['rate'])) {
            throw new InvalidArgumentException('Rate obligatoire');
        }
        if (!$_FILES['file']) {
            throw new InvalidArgumentException('Image obligatoire');
        }

        $libelle = $_POST['libelle'];
        $quantite = $_POST['quantite'];
        $prix = $_POST['prix'];
        $prixReduction = (isset($_POST['prix_reduction']) && strlen($_POST['prix_reduction'])) ? $_POST['prix_reduction'] : null;
        $description = $_POST['description'];
        $rate = $_POST['rate'];
        $categorie_id = $_POST['categorie_id'];
        $saison_id = $_POST['saison_id'];
        $accessoire_id = (isset($_POST['accessoire_id']) && strlen($_POST['accessoire_id'])) ? $_POST['accessoire_id'] : null;
        $bonne_affaire_id = (isset($_POST['bonne_affaire_id']) && strlen($_POST['bonne_affaire_id'])) ? $_POST['bonne_affaire_id'] : null;
        $url = null;
        $productId = $_POST['id'];

        $con->begin_transaction();

        if ($_FILES['file'] && $_FILES['file']['size'] > 0) {
            $path_parts = pathinfo($_FILES["file"]["name"]);
            $extension = $path_parts['extension'];

            $filename = Date("YmdHis") . uniqid() . '.' . $extension;
            $url = "../assets/images/$filename";
            $tmp_image = $_FILES["file"]["tmp_name"];
            move_uploaded_file($tmp_image, "../../assets/images/$filename");
        } else {
            $url = $_POST['url'];
        }

        if ($stmt = $con->prepare('UPDATE produit SET libelle=?, prix=?, description=?, url=?, rate=?,
              categorie_id=?, saison_id=?, accessoire_id=?, bonne_affaire_id=?, prix_reduction=?, quantite=? WHERE id =? ')) {
            $stmt->bind_param('ssssssssssss', $libelle, $prix, $description, $url, $rate, $categorie_id, $saison_id, 
            $accessoire_id, $bonne_affaire_id, $prixReduction, $quantite, $productId);
            $ancienPrix = getPrixProduit($productId, $con);
             $augmentationMax = $ancienPrix * 0.25; // 25% d'augmentation maximum
           if ($prix > ($ancienPrix + $augmentationMax)) {
            throw new InvalidArgumentException("L'augmentation du prix est supérieure à 25%");
             }
           
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }

        if ($_FILES['file'] && $_FILES['file']['size'] > 0) {
            $path = '../' . $_POST['url'];
            unlink($path);
            move_uploaded_file($tmp_image, "../../assets/images/$filename");
        }

        // Vérification de l'augmentation du prix
       

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Produit modifié']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: ' . $ex->getMessage()]));
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
        
        $productID = $_POST['id'];
        if (!isset($productID) || !strlen($productID))
        {
            throw new InvalidArgumentException('Requette est invalide');
        }

        $produit = findById('produit', $con, $productID);
        if(empty($produit))
        {
            throw new InvalidArgumentException('Produit introuvable'); 
        }

        $con->begin_transaction();
        
        if ($stmt = $con->prepare('DELETE FROM produit where id=?')) {
            $stmt->bind_param('s', $productID);
            $stmt->execute();
        } else {
            throw new Exception('Could not prepare statement!');
        }

        $path = '../'.$produit->url;
        unlink($path);

        $con->commit();
        exit(json_encode(['success' => true, 'message' => 'Produit supprimé']));
    } catch (InvalidArgumentException $exArg) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => $exArg->getMessage()]));
    } catch (Exception $ex) {
        $con->rollback();
        exit(json_encode(['success' => false, 'message' => 'Une erreur interne est survenue: '.$ex->getMessage()]));
    }
}

