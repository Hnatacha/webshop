<?php
session_start();
session_destroy();
// Redirect to the login page:
$goToHome='location:../index.php' ; //Lien vers le module backend
header(goToHome);
?>