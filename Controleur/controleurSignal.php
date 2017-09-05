<?php

require_once 'Modele/episode.php';
require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurSignal {

  private $episode;
  private $commentaire;

    
  public function __construct() {
   
    $this->episode = new Episode();
    $this->commentaire = new Commentaire();
  }

  // Affiche les commentaires
  /*public function commentaire() {
    $commentaires = $this->commentaire->getComm();
    $vue = new Vue("AdminComm");
    $vue->generer(array('commentaires' => $commentaires));
  }*/
    
    // Affiche les détails sur un épisode
  public function episodeDetail($idEpisode) {
    $episode = $this->episode->getEpisode($idEpisode);
    $commentaires = $this->commentaire->getCommentaires($idEpisode);
    $vue = new Vue("EpisodeDetail");
    $vue->generer(array('episode' => $episode, 'commentaires' => $commentaires));
  }
    
  // Signale un commentaire
  public function signal($idCommentaire, $idEpisode) {
    // Sauvegarde du signalement du commentaire
    $this->commentaire->signal($idCommentaire, $idEpisode); 
    // Actualisation de l'affichage du commentaire
    $this->episodeDetail($idEpisode);
  }
}
