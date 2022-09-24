

<?php
require 'include/serveur.php';

$auth=app::getAuth();
$db=app::getDatabase();
$auth->connectFromCookie($db);

if ($auth->user()){
app::redirect('account.php');

}
if (!empty($_POST)&&!empty($_POST['username']) && !empty($_POST['password'])){

    $user=$auth->login($db,$_POST['username'],$_POST['password'],isset($_POST['remember']));
    $session= session::getInstance();
    if($user){
        $session->setFlash('sucess','vous etes maintenant connecté');
        app::redirect('account.php');
    }
    else {
        $session->setFlash('danger','identifiant incorrecte');
    }
    
}
?>
<?php require 'includes/header.php';?>



    <h1> se connecter </h1>

    <form action="" method= "POST">

    <div class= "form-group">

           <label for=""> Pseudo  ou Email </label>
           <input type="text" name="username" class="form-control" />

</div>
    <div class=  "form-group">

        <label for=""> Mot de passe <a href="forget.php">(j'ai oublié mon mot de passe )</label>
        <input type="password" name="password" class="form-control" />

    </div>
    <div class= "form-group">

      <label>
      <input type="checkbox" name="remember" value"1" /> se souvenir de moi
      </label>
</div>

    
 <button  type="submit" class="btn btn-primary"> se connecter </button>
</form>
   
<?php 
require 'include/footer.php';

?>
