<?php

require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurAdminComm {

  private $commentaire;

  public function __construct() {
    $this->commentaire = new Commentaire();
  }

  // Affiche les commentaires
  public function commentaire() {
    $commentaires = $this->commentaire->getComm();
    $vue = new Vue("AdminComm");
    $vue->generer(array('commentaires' => $commentaires));
  }
}
