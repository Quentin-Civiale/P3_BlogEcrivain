<?php

require_once 'Modele/episode.php';
require_once 'Vue/vue.php';

class ControleurEditeur {

  private $episode;

  public function __construct() {
    $this->episode = new Episode();
  }

  // Affiche un épisode
  public function episode() {
    $vue = new Vue("AdminEp");
    $vue->generer(array('episode'));
  }

  // Ajoute un épisode
  public function editer($episodeNb, $titre, $contenu) {
    // Sauvegarde de l'épisode
    $this->episode->ajouterEpisode($episodeNb, $titre, $contenu); 
    // Actualisation de l'affichage de l'épisode
    $this->episode();
  }
    
  // Affiche l'éditeur
  public function editeur() {
    $vue = new Vue("Editeur");
    $vue->generer(array('editeur'));
  }
}
