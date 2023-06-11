<?php
// Vérification si les données du formulaire ont été soumises
if(isset($_POST['username']) && isset($_POST['password'])){
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "webshops";

    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Requête pour vérifier si l'utilisateur existe dans la base de données
    $query = "SELECT * FROM admin_utilisateur WHERE username = '$username' AND mot_de_passe = '$password'";
    $result = $conn->query($query);

    if($result->num_rows == 1){
        // Utilisateur authentifié
        $row = $result->fetch_assoc();
        $utilisateur_id = $row['id'];

        // Vérification si l'entrée pour l'utilisateur existe déjà dans la table "compteur"
        $query = "SELECT * FROM compteur WHERE admin_id = $utilisateur_id";
        $result = $conn->query($query);

        if($result->num_rows == 0){
            // L'entrée n'existe pas, l'ajouter avec la valeur initiale 1
            $query = "INSERT INTO compteur (admin_id, vues) VALUES ($utilisateur_id, 1)";
        } else {
            // L'entrée existe, incrémenter le compteur
            $query = "UPDATE compteur SET vues = vues + 1 WHERE admin_id = $utilisateur_id";
        }

        $conn->query($query);

        // Redirection vers la page d'accueil ou une autre page appropriée
        header('Location: index.php');
        exit();
    } else {
        // Identifiants invalides
        echo "Identifiants invalides. Veuillez réessayer.";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
}
?>
