<?php
session_start();
session_destroy();
// 
$goToHome='location: authentification.php' ; //Redirect to the home page:
header($goToHome);
?>