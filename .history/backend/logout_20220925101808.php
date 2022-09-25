<?php
session_start();
session_destroy();
// Redirect to the login page:
$lienA='location:backend/admin.php' ; //Lien vers le module backend
header('Location: index.html');
?>