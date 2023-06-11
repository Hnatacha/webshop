

<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'webshops';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['email'], $_POST['mot_de_passe'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the email and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, mot_de_passe FROM compte WHERE email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['mot_de_passe'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $id;
            echo 'Welcome ' . $_SESSION['email'] . '!';

            // Retrieve user IP address
            $userIP = $_SERVER['REMOTE_ADDR'];

            // Retrieve current date and time
            $dateTime = date('Y-m-d H:i:s');
            // Vérification si l'entrée pour l'utilisateur existe déjà dans la table "compteur"
            $query = "SELECT * FROM login_logs WHERE user_compte = $id";
            $result = $con->query($query);
            if ($result->num_rows == 0) {
                // Insert IP address and date/time into the table
                $query = "INSERT INTO login_logs (user_compte, ip_adress, login_time) VALUES (?, ?, ?)";
                $stmt = $con->prepare($query);
                if ($stmt) {
                    $stmt->bind_param('iss', $id, $userIP, $dateTime);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    echo 'Erreur lors de la préparation de la requête.';
                }
            } else {
                // Incorrect password
                echo 'erreur';
            }
            // Vérification si l'entrée pour l'utilisateur existe déjà dans la table "compteur"
            // Vérification si l'entrée pour l'utilisateur existe déjà dans la table "compteur_client"
            $query = "SELECT * FROM compteur_client WHERE utilisateur_id = $id";
            $result = $con->query($query);

            if ($result->num_rows == 0) {
                // L'entrée n'existe pas, l'ajouter avec la valeur initiale 1 et l'adresse IP actuelle
                $query = "INSERT INTO compteur_client (utilisateur_id, vues, derniere_ip) VALUES ($id, 1, '$userIP')";
            } else {
                $row = $result->fetch_assoc();
                $previousIP = $row['derniere_ip'];

                if ($previousIP == $userIP) {
                    // Même adresse IP, incrémenter le compteur
                    $query = "UPDATE compteur_client SET vues = vues + 1 WHERE utilisateur_id = $id";
                } else {
                    // Adresse IP différente, insérer une nouvelle ligne dans le compteur avec l'adresse IP actuelle
                    $query = "INSERT INTO compteur_client (utilisateur_id, vues, derniere_ip) VALUES ($id, 1, '$userIP')";
                }
            }

            $con->query($query);
            if (!isset($_SESSION['activity_log'])) {
                $_SESSION['activity_log'] = array();
            }
            
            $_SESSION['activity_log'][] = "L'utilisateur s'est connecté avec succès à la date et heure actuelles.";
            

            header('Location: ../frontend/membre.php');
        } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }

    $stmt->close();
}
?>
