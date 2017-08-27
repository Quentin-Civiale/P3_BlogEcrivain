<?php

require_once 'Modele/modele.php';

class Commentaire extends Modele {

  // Renvoie la liste des commentaires associés à un épisode
  public function getCommentaires($idEpisode) {
    $sql = 'SELECT id AS com_id, publish_date AS com_date,'
            . ' author AS com_auteur, content AS com_contenu FROM commentaires'
            . ' WHERE parent_id='.$idEpisode.' ORDER BY publish_date ASC';
    $commentaires = $this->executerRequete($sql, array($idEpisode));
    return $commentaires;

  }
    
    // Ajoute un commentaire dans la base
  public function ajouterCommentaire($auteur, $contenu, $idEpisode) {
    $sql = 'INSERT INTO commentaires(publish_date, author, content, parent_id)'
      . ' values(?, ?, ?, ?)';
    $date = date('Y-m-d H:i:s');  // Récupère la date courante
    $this->executerRequete($sql, array($date, $auteur, $contenu, $idEpisode)); 
  }
    
    // Renvoie la liste des commentaires
  public function getComm() {
    $sql = 'SELECT id AS com_id, publish_date AS com_date,'
            . ' author AS com_auteur, content AS com_contenu FROM commentaires'
            . ' ORDER BY publish_date ASC';
    $commentaires = $this->executerRequete($sql);
    return $commentaires;
  }
}
