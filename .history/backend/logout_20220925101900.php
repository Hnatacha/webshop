<?php
session_start();
session_destroy();
// Redirect to the login page:
$goT='location:../index.php' ; //Lien vers le module backend
header('Location: index.html');
?>