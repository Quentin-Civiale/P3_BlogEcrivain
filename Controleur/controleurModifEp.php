<?php

require_once 'Modele/episode.php';
require_once 'Vue/vue.php';

class ControleurModifEp {

  private $episode;

  public function __construct() {
    $this->episode = new Episode();
  }

  // Affiche un épisode
  public function episode() {
    $episodes = $this->episode->getEpisodes();
    $vue = new Vue("AdminEp");
    $vue->generer(array('episodes' => $episodes));
  }

  // Modifie un épisode
  public function modifEpisode($idEpisode, $titre, $contenu) {
    // Sauvegarde de l'épisode
    $this->episode->modifEpisode($idEpisode, $titre, $contenu); 
    // Actualisation de l'affichage de l'épisode
    $this->episode();
  }
    
  // Affiche l'éditeur
  public function editeurModif($episodeId) {
    $episode = $this->episode->getEpisode($episodeId);
    $vue = new Vue("ModifEp");
    $vue->generer(array('modifEp' => $episode));
  }
}
