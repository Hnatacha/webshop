<?php
session_start();

// Supprimer tous les produits du panier
unset($_SESSION['panier']);

// Rediriger vers une autre page
header("location:../../frontend/panier.php"); 

exit();
?>








