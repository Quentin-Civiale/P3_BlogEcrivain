<?php

require_once 'Modele/episode.php';
require_once 'Modele/commentaire.php';
require_once 'Vue/vue.php';

class ControleurModif {

  private $episode;
  private $commentaire;

  public function __construct() {
    $this->episode = new Episode();
    $this->commentaire = new Commentaire();
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
  public function editeurModifEp($episodeId) {
    $episode = $this->episode->getEpisode($episodeId);
    $vue = new Vue("ModifEp");
    $vue->generer(array('modifEp' => $episode));
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
  public function editeurModifComm($commentaireId) {
    $commentaire = $this->commentaire->getCommentaire($commentaireId);
    $vue = new Vue("ModifComm");
    $vue->generer(array('modifComm' => $commentaire));
  }
}
