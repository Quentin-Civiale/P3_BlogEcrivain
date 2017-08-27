<?php

require_once 'Modele/episode.php';
require_once 'Vue/vue.php';

class ControleurAdminEp {

  private $episode;

  public function __construct() {
    $this->episode = new Episode();
  }

  // Affiche les épisodes
  public function episode() {
    $episodes = $this->episode->getEpisodes();
    $vue = new Vue("AdminEp");
    $vue->generer(array('episodes' => $episodes));
  }
}
