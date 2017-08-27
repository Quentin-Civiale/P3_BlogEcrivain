<?php

require_once 'Modele/modele.php';

class Episode extends Modele {

  // Renvoie la liste des épisodes du blog
  public function getEpisodes() {
    $sql = 'SELECT id AS ep_id, publish_date AS ep_date,'
            . 'episode_number AS ep_nb, title AS ep_titre, content AS ep_contenu FROM episodes'
            . ' ORDER BY id asc';
    $episodes = $this->executerRequete($sql);
    return $episodes;
  }

  // Renvoie les informations sur un épisode
  public function getEpisode($idEpisode) {
    $sql = 'SELECT id AS ep_id, publish_date AS ep_date,'
            . 'episode_number AS ep_nb, title AS ep_titre, content AS ep_contenu FROM episodes'
            . ' WHERE id=?';
    $episode = $this->executerRequete($sql, array($idEpisode));
    if ($episode->rowCount() == 1)
      return $episode->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun épisode ne correspond à l'identifiant '$idEpisode'");
    }
    
  // Ajoute un épisode dans la bdd
  public function ajouterEpisode($episodeNb, $titre, $contenu) {
    $sql = 'INSERT INTO episodes(episode_number, title, publish_date, content)'
      . ' values(?, ?, ?, ?)';
    $date = date('Y-m-d H:i:s');  // Récupère la date courante
    $this->executerRequete($sql, array($episodeNb, $titre, $date, $contenu)); 
  }
    
  // Supprimer un épisode de la bdd
  public function delete($idEpisode){
      $sql = 'DELETE FROM episodes WHERE id='.$idEpisode;
      $episodes = $this->executerRequete($sql/*, array($idEpisode)*/);
    return $episodes;
  }
}
