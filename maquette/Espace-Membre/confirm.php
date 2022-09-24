<?php
require'include/seveur.php';
$db=app::getDatabase();

if (app::getAuth()->confirm ($db,$_GET['id'],$_GET['token'],session::getInstance())){

    session::getInstance()->setFlash('success',"ce token n'est plus valide"); 
   app::redirect('account.php');


}else{
    session::getInstance()->setFlash('danger',"ce token n'est plus valide");
    app::redirect('login.php');
   
}