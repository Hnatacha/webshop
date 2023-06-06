<?php
include '../configDB.php';
$date_message = Date("y/m/d H:i:s");

if ($_POST) {

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['nom'], $_POST['message'],  $_POST['email'])) {
    // Could not get the data that should have been sent.
    exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['nom']) || empty($_POST['message']) || empty($_POST['email'])) {
    // One or more values are empty.
    exit('Please complete the registration form');
}

if ($stmt = $con->prepare('INSERT INTO contact (nom, email, message,date_message) VALUES (?, ?, ?,?)')) {
    $stmt->bind_param('ssss', $_POST['nom'],  $_POST['email'], $_POST['message'],$date_message);
    $stmt->execute();
    
    header('Location: ../frontend/accueil.php');
} else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}

}

?>