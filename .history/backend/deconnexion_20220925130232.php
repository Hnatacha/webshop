<?php
session_start();
session_destroy();
// 
$goToHome='location:../frontend/accueil.php' ; //Redirect to the home page:
header($goToHome);
?>