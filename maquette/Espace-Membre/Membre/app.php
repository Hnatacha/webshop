<?php

class app{
    static $db=null;

    static function getDatabase(){

        if(!self::$db){
  
       self:: $db=  new Database ('root','','espace membre');
       
        }
       return self::$db;
    }
    static function getAuth(){

        return new Auth(session::getInstance(),  ['restriction_msg' => "vous n'avez pas le droit d'accéder à cette page" 
    ]);
    }
    static function redirect($page){

        header("Location: $page");

        exit();
    }
}

