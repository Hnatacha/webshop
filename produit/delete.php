<?php 
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($bdd, "DELETE FROM produit WHERE id=$id");
header("Location:index.php");
?>
