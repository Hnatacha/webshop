<?php
session_start();
session_destroy();
// 
$goToHome='location:../frontend/acc.php' ; //Redirect to the login page:
header($goToHome);
?>