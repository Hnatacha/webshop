

<?php
require_once'include/serveur.php';

//je veux récuperer le premier utilisateur



if (!empty($_POST))
{
    $errors= array();

   $db=app::getDatabase();
   $validation =new Validation ($_POST);
   
   $validation->alphanumerique('username',"votre pseudo n'est pas valide (alphanumérique)");
   if($validation->isvalid()){
    $validation->unique('username',$db,'users','ce pseudo est déjà pris');

   }
  
   $validation->isEmail('email', "votre email n'est pas valide");
   if($validation->isvalid()){
   $validation->unique('email',$db,'users','cette email a déjà été utiliser pour un autre compte');
   }
   $validation-> confirmation ('password', 'vous devez entrer un mot de passe valide');




    if ($validation->isvalid())
    {
  

   app::getAuth()-> register($db,$_POST['username'],$_POST['password'],$_POST['email']);
    
   session::getInstance()-> setFlash('success',"un email de confirmation vous a été envoyez pour valider votre compte"  );
   app::redirect (' login.php');
     exit();



    } else{
        $error=$validation->getErrors();
    }
}
   
?>
<?php require'include/header.php';?>

<h1> S'inscrire </h1>

<?php if(!empty($errors)):?>

<div class="alert alert-danger">
    <p> vous n'avez pas correctement remplir le formulaire</p>
    <ul>

      <?php foreach($errors as $error): ?>

          <li>
              <?=$error;
              ?>
        </li>

          <?php endforeach;?>
    </ul>
</div>


<?php endif;?>

<form action="" method= "POST">

    <div class= "form-group">

        <label for=""> Pseudo </label>
        <input type="text" name="username" class="form-control" />

    </div>
    <div class=  "form-group">

        <label for=""> Email </label>
        <input type="text" name="email" class="form-control" />

    </div>
    <div class=  "form-group">

        <label for=""> Mot de passe </label>
        <input type="password" name="password" class="form-control" />

    </div>
    <div class="form-group">

        <label for=""> confirmez votre mot de passe </label>
         <input type="password" name="password_confirm" class="form-control"/> 

    </div>
 <button  type="submit" class="btn btn-primary"> M'inscrire </button>
</form>

<?php require 'include/footer.php'?>
















