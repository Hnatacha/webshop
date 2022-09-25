<?php
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
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['nom'],$_POST['prenom'], $_POST['mot_de_passe'], $_POST['email'])) {
    // Could not get the data that should have been sent.
    exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['nom']) || empty($_POST['prenom']) ||empty($_POST['mot_de_passe']) || empty($_POST['email'])) {
    // One or more values are empty.
    exit('Please complete the registration form');
}
//We need to check email validation
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email is not valid!');
}

//We need to check passord character length check
if (strlen($_POST['mot_de_passe']) > 10 || strlen($_POST['mot_de_passe']) < 5) {
    exit('Password must be between 5 and 10 characters long!');
}
// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, mot_de_passe FROM compte WHERE email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        echo 'Username exists, please choose another!';
    } else {
        // Insert new account
        // Username doesnt exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO compte (nom, prenom, mot_de_passe, email) VALUES (?, ?, ?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
            $stmt->bind_param('ssss', $_POST['nom'],  $_POST['prenom'], $password, $_POST['email']);
            $stmt->execute();
            $from    = 'noreply@yourdomain.com';
            $subject = 'Account Activation Required';
            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            // Update the activation variable below
            $message = '<p>You have successfully registered, you can now login!</p>';
            mail($_POST['email'], $subject, $message, $headers);
            echo 'Please check your email to activate your account!';
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}
$con->close();
