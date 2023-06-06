<?php

include_once("config.php");
$result = mysqli_query($bdd, "SELECT * FROM produit ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>Page Acceuil</title>
</head>
 
<body>
    <p><u> Administration de vos données </u></p>
	<br />
    <table width="60%" border=0>
        <tr bgcolor="#CCCCCC">
			<td>ID</td>
            <td>LIBELLE</td>
            <td>PRIX</td>
            <td>DESCRIPTION</td>
            <td>URL</td>
            <td>RATE</td>
            <td>CATEGORIE</td>
            <td>SAISON</td>
            <td>ACCESSOIRE</td>
            <td>BONNE AFFAIRE</td>
            <td>PRIX DE REDUCTION</td>
            <td>QUANTITE</td>
            <td>Options Admin</td>
        </tr>
		
        <?php 
        
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
			echo "<td>".$res['id']."</td>";
            echo "<td>".$res['libelle']."</td>";
            echo "<td>".$res['prix']."</td>";
            echo "<td>".$res['description']."</td>"; 
            echo "<td>"."<img src=' ".$res['url']."' width =60 px /></td>";
            echo "<td>".$res['rate']."</td>";
            echo "<td>".$res['categorie_id']."</td>";
            echo "<td>".$res['saison_id']."</td>"; 
            echo "<td>".$res['accessoire_id']."</td>";
            echo "<td>".$res['bonne_affaire_id']."</td>";
            echo "<td>".$res['prix_reduction']."</td>";
            echo "<td>".$res['quantite']."</td>"; 
            echo "<td>	<a href=\"edit.php?id=$res[id]\">Modifier</a>   | 
						<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Veuillez confirmer ?')\">Supprimer</a>   |
						<a href=\"addition.php\">Ajouter</a> </td>";       
			echo "</tr>";
		}
        ?>
    </table>
</body>
</html>