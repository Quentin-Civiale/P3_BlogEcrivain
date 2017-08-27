<?php

require_once 'Vue/vue.php';

class ControleurContact {
    
    public function contact(){
        $vue = new Vue ("Contact");
        $vue->generer(array('contact'));
    }
}
