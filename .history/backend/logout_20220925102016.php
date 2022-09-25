<?php
session_start();
session_destroy();
// 
$goToHome='location:../frontend/conn.php' ; //Redirect to the login page:
header($goToHome);
?>