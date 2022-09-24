<?php 
require_once 'include/serveur.php';
app::getAuth()->restrict();

if (!empty($_POST)){
    if (empty ($_POST ['password'])||$_POST['password']!= $_POST['password_confirm']){
        $_SESSION['flash']['danger']='les mots de passes ne sont pas correspondants';
    } else{
        $user_id=$_SESSION['auth']-> id;
        $password =password_hash($_POST['password'],PASSWORD_BCRYPT);
        
         $pdo->prepare ('UPDATE users SET password=?')->execute([$password]);
        $_SESSION['flash']['success']="votre compte a été bien mis à jour";
    }
}

require 'include/header.php';

?>
    <h1> Bonjour <?= $_SESSION['auth']->username;?> </h1>
    <form action ="" method="Post">
        <div class="form-group">
            <input class ="form-control" type ="password" name="password" placeholder="changer de mot de passe"/>
        </div>
        <div class="form-group">
            <input class ="form-control" type ="password" name="password_confirm" placeholder="confirmation du  mot de passe"/>
        </div>
        <button  type="submit" class="btn btn-primary"> M'inscrire </button>
    </form>



<?php 
require 'include/footer.php';

?>
