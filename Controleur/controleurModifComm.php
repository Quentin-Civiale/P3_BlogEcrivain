<?php

require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurModifComm {

  private $commentaire;

  public function __construct() {
    $this->commentaire = new Commentaire();
  }

  // Affiche les commentaires
  public function commentaire() {
    $commentaires = $this->commentaire->getComms();
    $vue = new Vue("AdminComm");
    $vue->generer(array('commentaires' => $commentaires));
  }

  // Modifie un commentaire
  public function modifCommentaire($idCommentaire, $auteur, $contenu, $signal, $epId) {
    // Sauvegarde du commentaire
    $this->commentaire->modifCommentaire($idCommentaire, $auteur, $contenu, $signal, $epId);
    // Actualisation de l'affichage du commentaire
    $this->commentaire();
  }
    
  // Affiche l'éditeur
  public function editeurModif($commentaireId) {
    $commentaire = $this->commentaire->getCommentaire($commentaireId);
    $vue = new Vue("ModifComm");
    $vue->generer(array('modifComm' => $commentaire));
  }
}
