<?php

require_once 'Modele/users.php';
require_once 'Vue/vue.php';

class ControleurUser{
    
    public function __construct() {
    $this->user = new Users();
  }
    
    public function connecte($login, $pass){
        if($this->user->verifUser($login, $pass) == true){
            $vue = new Vue ("AdminEp");
            $vue->generer(array());
        }
        else {
            $vue = new Vue ("User");
            $vue->generer(array());
        }
    }
    
    public function formulaire(){
        $vue = new Vue ("User");
        $vue->generer(array());
    }
}
