
<?php
 require'include/serveur.php';
if (!isset($_GET['id'])&& isset($_GET['token']) ){

    $auth=app::getAuth();

    $db=app::getDatabase();

    $user=$auth ->resetToken($db,$_GET['id'],$_GET['token']);
    
    if($user){

    if (!empty($_POST)){
        $validation=new Validation($_POST);

        $validation -> confirmation('password');

        if ($validation->isvalid()){

            $password=$auth->hashPassword($_POST['password']);
            
             $db->query('UPDATE users SET password=? reset_at = NULL, reset_token= Null WHERE id=?',[$password,$_GET['id']]);
             $auth-> connect($user);
            session::getInstance()->setFlash('sucess','votre mot de passe a bien ete modifié');
           app::redirect('account.php');
            exit();

        }
    }
}
else {
    session::getInstance()-> setFlash('danger',"ce n'est pas valide");
    app::redirect('loggin.php');
   
}
}else{
    app::redirect('loggin.php');
}

?>
<?php require 'include/header.php'?>
    <h1> Reinitialiser mon mot de passe </h1>

    <form action="" method= "POST">

    <div class= "form-group">

           <label for=""> Mot de passe  </label>
           <input type="password" name="password" class="form-control" />

</div>
    <div class=  "form-group">

        <label for=""> Confirmation du mot de passe <a href="forget.php">(j'ai oublié mon mot de passe )</label>
        <input type="password" name="password_confirm" class="form-control" />

    </div>
    
 <button  type="submit" class="btn btn-primary"> reinitialiser votre mot de passe </button>
</form>


<?php 
require 'include/footer.php';

?>
