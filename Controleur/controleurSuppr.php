<?php

require_once 'Modele/episode.php';
require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurSuppr {

  private $episode;
  private $commentaire;

  public function __construct() {
    $this->episode = new Episode();
    $this->commentaire = new Commentaire();
  }

  // Affiche les épisodes
  public function episode() {
    $episodes = $this->episode->getEpisodes();
    $vue = new Vue("AdminEp");
    $vue->generer(array('episodes' => $episodes));
  }

  // Supprime un épisode
  public function deleteEp($idEpisode) {
    // Sauvegarde de l'épisode
    $this->episode->delete($idEpisode); 
    // Actualisation de l'affichage de l'épisode
    $this->episode();
  }

  // Affiche les commentaires
  public function commentaire() {
    $commentaires = $this->commentaire->getComm();
    $vue = new Vue("AdminComm");
    $vue->generer(array('commentaires' => $commentaires));
  }

  // Supprime un commentaire
  public function deleteComm($idCommentaire) {
    // Sauvegarde du commentaire
    $this->commentaire->delete($idCommentaire); 
    // Actualisation de l'affichage du commentaire
    $this->commentaire();
  }
}
