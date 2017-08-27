<?php

require_once 'Vue/vue.php';

class ControleurAccueil {
    
    public function accueil(){
        $vue = new Vue ("Accueil");
        $vue->generer(array('accueil'));
    }
}
