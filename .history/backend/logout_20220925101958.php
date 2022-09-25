<?php
session_start();
session_destroy();
// 
$goToHome='location:../froindex.php' ; //Redirect to the login page:
header($goToHome);
?>