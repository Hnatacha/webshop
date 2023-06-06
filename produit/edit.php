<?php
include("config.php");
$cat = "SELECT*FROM categorie ";
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
  
    } else {    
        //mise à jour de la table
        $result = mysqli_query($bdd, "UPDATE produit SET libelle='$libelle',prix='$prix',description='$description',url='$url',rate ='$rate',categorie_id ='$categorie',saison_id='$saison',accessoire_id ='$accessoire',bonne_affaire_id='$bonne_affaire',prix_reduction='$prix_reduction',quantite='$quantite' WHERE id=$id");
        
        //rediriger la page d'acceuil. Dans notre cas c'est la page index.php
        header("Location: index.php");
    }
}
?>
<?php
//récuperer id depuis url
$id = $_GET['id'];
 
//extraction des données associées avec ce ID particulierar
$result = mysqli_query($bdd, "SELECT * FROM produit WHERE id=$id");

// lecture du curseur 
while($res = mysqli_fetch_array($result))
{
    $libelle	= $res['libelle'];
    $prix	= $res['prix'];
    $description 	= $res['description'];
    $url 	= $res['url'];
    $rate	= $res['rate'];
    $categorie 	= $res['categorie_id'];
    $saison 	= $res['saison_id'];
    $accessoire 	= $res['accessoire_id'];
    $bonne_affaire	= $res['bonne_affaire_id'];
    $prix_reduction 	= $res['prix_reduction'];
    $quantite 	= $res['quantite'];      
}
?>
<html>
<head>    
    <title>Afficher les Données</title>
</head>
 
<body>
    <a href="index.php">Acceuil</a>
    <br/><br/>
    
    <form action="edit.php" method="post" >
        <table border="0">
            <tr> 
                <td>LIBELLE</td>
                <td><input type="text" name="libelle"></td>
            </tr>
            <tr> 
                <td>PRIX</td>
                <td><input type="text" name="prix"></td>
            </tr>
            <tr> 
                <td>DESCRIPTION</td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr> 
                <td>URL</td>
                <td><input type="text" name="url"></td>
            </tr>
            <tr> 
                <td>RATE</td>
                <td><input type="text" name="rate"></td>
            </tr>
            <tr> 
                <td>CATEGORIE</td>
                <td>
                    <select name="nomcategorie">
                       <?php  while ($row = mysqli_fetch_array($listcat)):?>
                      <option value ="<?php echo $row[0];?>">
                        <?php echo $row[1];?>
                      </option>
                      <?php endwhile ?>
                   </select>
                 </td>
            </tr>
            <tr> 
                <td>SAISON</td>
                <td>
                    <select name="nomsaison">
                       <?php  while ($row = mysqli_fetch_array($listsai)):?>
                      <option value ="<?php echo $row[0];?>">
                        <?php echo $row[1];?>
                      </option>
                      <?php endwhile ?>
                   </select>
                 </td>
            </tr>
            <tr> 
                <td>ACCESSOIRE</td>
                <td>
                    <select name="nomaccessoire">
                       <?php  while ($row = mysqli_fetch_array($listacc)):?>
                      <option value ="<?php echo $row[0];?>">
                        <?php echo $row[1];?>
                      </option>
                      <?php endwhile ?>
                   </select>
                 </td>
            </tr>
            <tr> 
                <td>BONNE AFFAIRE</td>
                <td>
                    <select name="nombonne_affaire">
                       <?php  while ($row = mysqli_fetch_array($listbo_af)):?>
                      <option value ="<?php echo $row[0];?>">
                        <?php echo $row[1];?>
                      </option>
                      <?php endwhile ?>
                   </select>
                 </td>
            </tr>
            <tr> 
                <td>PRIX DE REDUCTION</td>
                <td><input type="text" name="prix_reduction"></td>
            </tr>
            <tr> 
                <td>QUANTITE</td>
                <td><input type="text" name="quantite"></td>
            </tr>
            <tr> 
                <td> add </td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>  
</body>
</html>