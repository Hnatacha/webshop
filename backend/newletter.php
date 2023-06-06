<?php
include '../configDB.php';

if ($_POST) {

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['nom'],   $_POST['email'])) {
    // Could not get the data that should have been sent.
    exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['nom'])  || empty($_POST['email'])) {
    // One or more values are empty.
    exit('Please complete the registration form');
}

if ($stmt = $con->prepare('INSERT INTO newletter (nom, email) VALUES (?, ?)')) {
    $stmt->bind_param('ss', $_POST['nom'],  $_POST['email']);
    $stmt->execute();
    
    header('Location: ../frontend/accueil.php');
} else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}

}

?>