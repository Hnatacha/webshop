<?php
session_start();
session_destroy();
// 
$goToHome='location:../frontindex.php' ; //Redirect to the login page:
header($goToHome);
?>