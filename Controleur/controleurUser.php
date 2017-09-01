<?php

require_once 'Modele/episode.php';
require_once 'Modele/users.php';
require_once 'Vue/vue.php';

class ControleurUser{
    
    public function __construct() {
    $this->episode = new Episode();
    $this->user = new Users();
  }
    
    public function connecte($login, $pass){
        if($this->user->verifUser($login, $pass) == true){
            $episodes = $this->episode->getEpisodes();
            $_SESSION['Auth'] = true;
            $vue = new Vue ("AdminEp");
            $vue->generer(array('episodes' => $episodes));
        }
        else {
            $vue = new Vue ("User");
            $vue->generer(array());
        }
    }
    
    public function deconnecte(){
            $_SESSION['Auth'] = false;
            $vue = new Vue ("Accueil");
            $vue->generer(array());
    }
    
    public function formulaire(){
        $vue = new Vue ("User");
        $vue->generer(array());
    }
}
