<?php
session_start();
session_destroy();
// Redirect to the login page:
$lienA='location:../index.php' ; //Lien vers le module backend
header('Location: index.html');
?>