
<?php
require 'include/serveur.php';
if (!empty($_POST)&&!empty($_POST['email'])){
    $db=app::getDatabase();
    $auth=app::getAuth();
    $session=session::getInstance();
    if ($auth->resetPassword($db,$_POST['email'])){
        $session->setFlash('sucess','les instructions vous ont bien été envoyées par émail');
        app::redirect('login.php');
        

    }else{
        $session ->setFlash('danger','Aucun compte ne correspond  à cet adresse');

    }
}

?>
    <h1> se connecter </h1>

    <form action="" method= "POST">

    <div class= "form-group">

           <label for="">  Email </label>
           <input type="email" name="email" class="form-control" />

</div>
   
    
 <button  type="submit" class="btn btn-primary"> se connecter </button>
</form>


<?php 
require 'include/footer.php';

?>