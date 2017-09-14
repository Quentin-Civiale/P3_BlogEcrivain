<?php

require_once 'Modele/episode.php';
require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurAdmin {

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

  // Affiche les commentaires
  public function commentaire() {
    $commentaires = $this->commentaire->getComm();
    $vue = new Vue("AdminComm");
    $vue->generer(array('commentaires' => $commentaires));
 
  }
}
