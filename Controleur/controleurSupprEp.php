<?php

require_once 'Modele/episode.php';
require_once 'Vue/vue.php';

class ControleurSupprEp {

  private $episode;

  public function __construct() {
    $this->episode = new Episode();
  }

  // Affiche les épisodes
  public function episode() {
    $vue = new Vue("AdminEp");
    $vue->generer(array('episode'));
  }

  // Supprime un épisode
  public function delete($idEpisode) {
    // Sauvegarde de l'épisode
    $this->episode->delete($idEpisode); 
    // Actualisation de l'affichage de l'épisode
    $this->episode();
  }
}
