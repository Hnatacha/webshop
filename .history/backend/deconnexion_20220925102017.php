<?php
session_start();
session_destroy();
// 
$goToHome='location:../frontend/connexion.php' ; //Redirect to the login page:
header($goToHome);
?>