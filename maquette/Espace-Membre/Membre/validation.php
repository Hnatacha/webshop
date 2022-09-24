<?php
class Validation{

    private $data;
    private $errors=[];
    
    public function __construct($data){
        $this->data=$data;

    }
    private function getfield($field){
        if(!isset($this->data[$field])){
            return null;
        }
        return $this->data[$field];
        
    }

    public function alphanumerique ($field,$errormsg)
    {
        if (!isset($this->data[$field])||!preg_match('/^[a-zA-Z0-9_]+$/',$this->getfield($field)))
    {
        $this-> errors [$field]=$errormsg;

    }

    }
    public function unique($field,$db,$table,$errormsg){

        $record=$db->query("SELECT id FROM $table WHERE $field =?",[$this->getfield($field)])->fetch();

        if($record){
            $this-> errors [$field]=$errormsg;

        }
        
    }
    public function isEmail ($field,$errormsg){

        if(!filter_var($this->getfield($field), FILTER_VALIDATE_EMAIL)){
            
            $this-> errors [$field]=$errormsg;

        }
    }
    public function confirmation ($field,$errormsg=''){
        $value= $this->getfield($field);

        if(empty( $value)||$value != $this->getfield($field,'confirm'))
    {
        $this-> errors [$field]=$errormsg;
    }
   }
    public  function isvalid(){
        return empty($this-> errors);
    }
    public  function getErrors(){
        return $this-> errors;
    }


}