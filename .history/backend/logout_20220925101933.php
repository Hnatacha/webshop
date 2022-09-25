<?php
session_start();
session_destroy();
// 
$goToHome='location:../index.php' ; //Redirect to the login page:
header($goToHome);
?>