<?php

require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurSupprComm {

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

  // Supprime un commentaire
  public function delete($idCommentaire) {
    // Sauvegarde du commentaire
    $this->commentaire->delete($idCommentaire); 
    // Actualisation de l'affichage du commentaire
    $this->commentaire();
  }
}
