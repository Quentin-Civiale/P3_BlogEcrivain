<?php

require_once 'Modele/episode.php';
require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurEpisodeDetail {

  private $episode;
  private $commentaire;

  public function __construct() {
    $this->episode = new Episode();
    $this->commentaire = new Commentaire();
  }

  // Affiche les détails sur un épisode
  public function episodeDetail($idEpisode) {
    $episode = $this->episode->getEpisode($idEpisode);
    $commentaires = $this->commentaire->getCommentaires($idEpisode);
    $vue = new Vue("EpisodeDetail");
    $vue->generer(array('episode' => $episode, 'commentaires' => $commentaires));
  }
    
  // Ajoute un commentaire à un épisode
  public function commenter($auteur, $contenu, $idEpisode) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idEpisode); 
    // Actualisation de l'affichage de l'épisode
    $this->episodeDetail($idEpisode);
  }
}
