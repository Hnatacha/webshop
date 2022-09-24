<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produits du site</title>
    <link rel=stylesheet type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=webshops','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
?>
<?php

if (empty($_POST ['nom']) || !preg_match ('[A-Za-z]',$_POST ['nom'])){
$errors ['nom']="votre nom n'est pas valide (alphanumérique) ";
}
if (empty($_POST ['prénom']) || !preg_match ('[A-Za-z]',$_POST ['prénom'])){
$errors ['prénom']="votre prénom n'est pas valide (alphanumérique) ";
}
if (empty($_POST ['adresse']) ){
$errors ['adresse']="veuillez saisir votre adresse ";
}
if (empty($_POST ['téléphone']) ){
$errors ['téléphone']="veuillez saisir votre téléphone ";
}
if (empty($_POST ['email']) || !filter_var ($_POST ['email'],FILTER_VALIDATE_EMAIL)){
$errors ['email']="votre émail n'est pas valide (alphanumérique) ";
}
if (empty($_POST ['sujet']) ){
$errors ['sujet']="veuillez saisir votre sujet";
}
if (empty($_POST ['message']) ){
$errors ['message']="veuillez saisir votre message ";
}
if (empty($errors)){

 $req = $pdo ->prepare("INSERT INTO contacts SET nom=?,prénom =?,adresse=?,téléphone=?,email=?,sujet=?,message=?");
$req -> execute (array($_POST ['nom'],$_POST ['prénom'],$_POST ['adresse'],$_POST ['téléphone'],$_POST ['e-mail'],$_POST ['sujet'],$_POST ['message']));
die ('Message envoyé');
}
?>








		
			  <h1>Contactez nous</h1>
		  <p>Un problème, une question? N’hésitez pas à utiliser ce formulaire pour prendre contact avec nous !</p>
				<form  action="" method= "POST">
					<div class ="form-group">
					   <label for="nom">Votre nom</label>
						<input type = "text" name="nom" placeholder = "votre nom "class ="form-control"/> 
					</div>
					<div class ="form-group"> 
						<label for="prénom">Votre prenom</label>
						<input type = "text" name="prénom" placeholder = "votre prenom "class ="form-control"/> 
					</div>
					<div class ="form-group">
						<label for="email">Votre email</label>
						<input type = "email" name="email" placeholder = "votre email " class ="form-control"/> 
					</div>
					<div class ="form-group">
						<label for="adresse">Votre adresse</label>
						<input type = "adresse" name="adresse" placeholder = "votre adresse" class ="form-control" /> 
					</div>
					<div class ="form-group">
						<label for="téléphone">Votre telephone</label>
						<input type = "téléphone" name="téléphone" placeholder = "votre telephone" class ="form-control"  /> 
					</div>
					<div class ="form-group">
					  <label for="sujet">Quel est le sujet de votre message ?</label>
					  <select name="sujet" id="sujet" >
						  <option value="" disabled selected hidden>Choisissez le sujet de votre message</option>
						  <option value="probleme-compte">Problème avec mon compte</option>
						  <option value="question-produit">Question à propos d’un produit</option>
						  <option value="suivi-commande">Suivi de ma commande</option>
						    <option value="suggestion">Suggestion</option>
						  <option value="autre">Autre...</option>
					   </select>
					</div>    
					<div class ="form-group">
					  <label for="message">Votre message</label>
					  <textarea id="message" name="message" placeholder="saisir ici" class ="form-control" ></textarea>
					</div>
					<div>

					  <button type="submit" class ="btn btn-primary" > ENVOYER VOTRE MESSAGE</button>
					</div>
				</form>
				
		
	
	
					
</body>
</html>