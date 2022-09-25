<?php
session_start();
session_destroy();
// 
$goToHome='location:../frontend/index.php' ; //Redirect to the login page:
header($goToHome);
?>