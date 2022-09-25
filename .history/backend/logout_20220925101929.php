<?php
session_start();
session_destroy();
// 
$goToHome='location:../index.php' ; //Lien vers le module backend
header($goToHome);
?>