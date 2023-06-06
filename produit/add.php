<html>
<head>
    <title>Add Data</title>
</head>
<body>
<?php
include_once("config.php");
$cat = "SELECT*FROM categorie where 1";
 $listcat =mysqli_query($bdd,$cat) ;

 $acc = "SELECT*FROM accessoire";
 $list_acc =mysqli_query($bdd,$acc) ;

 $bo_af = "SELECT*FROM bonne_affaire";
 $listbo_af =mysqli_query($bdd,$bo_af) ;

 $sai = "SELECT*FROM saison";
 $listsai =mysqli_query($bdd,$sai) ;

if(isset($_POST['Submit'])) {    
    $libelle	= $_POST['libelle'];
    $prix	= $_POST['prix'];
    $description 	= $_POST['description'];
    $url 	= $_POST['url'];
    $rate	= $_POST['rate'];
    $categorie 	= $_POST['nomcategorie'];
    $saison 	= $_POST['nomsaison'];
    $accessoire 	= $_POST['nomaccessoire'];
    $bonne_affaire	= $_POST['nombonne_affaire'];
    $prix_reduction 	= $_POST['prix_reduction'];
    $quantite 	= $_POST['quantite'];      
        
    if(empty($libelle) || empty($prix) || empty($description)|| empty($url) || empty($rate) || empty($categorie)|| empty($saison)|| empty($accessoire) || empty($bonne_affaire) || empty($prix_reduction)|| empty($quantite)) {                
        if(empty($libelle)) {
            echo "<font color='red'>libelle field is empty.</font><br/>";
        }
        
        if(empty($prix)) {
            echo "<font color='red'>prix field is empty.</font><br/>";
        }
        
        if(empty($description)) {
            echo "<font color='red'>description field is empty.</font><br/>";
        }
        
        if(empty($url)) {
            echo "<font color='red'>url field is empty.</font><br/>";
        }
        
        if(empty($rate)) {
            echo "<font color='red'>rate field is empty.</font><br/>";
        }
        
        if(empty($categorie)) {
            echo "<font color='red'>categorie field is empty.</font><br/>";
        }
        
        
        if(empty($saison)) {
            echo "<font color='red'>saison field is empty.</font><br/>";
        }
        if(empty($accessoire)) {
            echo "<font color='red'>accessoire field is empty.</font><br/>";
        }
        
        if(empty($bonne_affaire)) {
            echo "<font color='red'>bonne_affaire field is empty.</font><br/>";
        }
        
        if(empty($prix_reduction)) {
            echo "<font color='red'>prix_reduction field is empty.</font><br/>";
        }
        if(empty($quantite)) {
            echo "<font color='red'>quantite field is empty.</font><br/>";
        }
        
        echo "<br/><a href='javascript:self.history.back();'>Retour</a>";
    
    }
   
     else { 
     
    $result = mysqli_query($bdd, "INSERT INTO produit (libelle,prix,description,url,rate,categorie_id,saison_id,accessoire_id, bonne_affaire_id,prix_reduction,quantite) VALUES('$libelle','$prix','$description','$url','$rate','$categorie','$saison','$accessoire','$bonne_affaire','$prix_reduction','$quantite')");
        
    echo "<font color='green'>Data added successfully.";
    echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>