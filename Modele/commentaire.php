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
    
    // Renvoie les informations sur un commentaire
  public function getCommentaire($idCommentaire) {
    $sql = 'SELECT id AS com_id, publish_date AS com_date,'
            . ' author AS com_auteur, content AS com_contenu,'
            . ' signal_number AS com_signal, parent_id AS com_epId FROM commentaires'
            . ' WHERE id=?';
    $commentaire = $this->executerRequete($sql, array($idCommentaire));
    if ($commentaire->rowCount() == 1)
      return $commentaire->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCommentaire'");
    }
        
    // Renvoie la liste des commentaires
  public function getComm() {
    $sql = 'SELECT id AS com_id, publish_date AS com_date,'
            . ' parent_id AS com_epId, signal_number AS com_signal,'
            . ' author AS com_auteur, content AS com_contenu FROM commentaires'
            . ' ORDER BY publish_date ASC';
    $commentaires = $this->executerRequete($sql);
    return $commentaires;
  }
    
    // Renvoie la liste des commentaires du blog
  public function getComms() {
    $sql = 'SELECT id AS com_id, publish_date AS com_date,'
            . 'author AS com_auteur, content AS com_contenu,'
            . ' signal_number AS com_signal, parent_id AS com_epId FROM commentaires'
            . ' ORDER BY id asc';
    $commentaires = $this->executerRequete($sql);
    return $commentaires;
  }
    
    // Ajoute un commentaire dans la base
  public function ajouterCommentaire($auteur, $contenu, $idEpisode) {
    $sql = 'INSERT INTO commentaires(publish_date, author, content, parent_id)'
      . ' values(?, ?, ?, ?)';
    $date = date('Y-m-d H:i:s');  // Récupère la date courante
    $this->executerRequete($sql, array($date, $auteur, $contenu, $idEpisode)); 
  }
    
    // Modifie un commentaire dans la bdd
  public function modifCommentaire($idCommentaire, $auteur, $contenu, $signal, $epId) {
    $sql = "UPDATE commentaires SET author='$auteur', content='$contenu', signal_number='$signal', parent_id='$epId' WHERE id='$idCommentaire'";
    $commentaires = $this->executerRequete($sql);
    echo "Commentaire modifié";
    }
        
    // Supprimer un commentaire de la bdd
  public function delete($idCommentaire){
      $sql = 'DELETE FROM commentaires WHERE id='.$idCommentaire;
      $commentaires = $this->executerRequete($sql/*, array($idEpisode)*/);
    return $commentaires;
  }
    
    // Signaler un commentaire de la bdd
  public function signal($idCommentaire){
      $sql = 'UPDATE `commentaires` SET `signal_number` = `signal_number` +1 WHERE `id`='.$idCommentaire;
      $commentaires = $this->executerRequete($sql);
    return $commentaires;
  }
}
