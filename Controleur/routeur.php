<?php

require_once 'Controleur/controleurAccueil.php';
require_once 'Controleur/controleurEpisode.php';
require_once 'Controleur/controleurEpisodeDetail.php';
require_once 'Controleur/controleurContact.php';
require_once 'Controleur/controleurUser.php';
require_once 'Controleur/controleurAdminEp.php';
require_once 'Controleur/controleurAdminComm.php';
require_once 'Controleur/controleurEditeur.php';
require_once 'Controleur/controleurSupprEp.php';
require_once 'Vue/vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlEpisode;
  private $ctrlEpisodeDetail;
  private $ctrlContact;
  private $ctrlUser;
  private $ctrlAdminEp;
  private $ctrlAdminComm;
  private $ctrlEditeur;
  private $ctrlSupprEp;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlEpisode = new ControleurEpisode();
    $this->ctrlEpisodeDetail = new ControleurEpisodeDetail();
    $this->ctrlContact = new ControleurContact();
    $this->ctrlUser = new ControleurUser();
    $this->ctrlAdminEp = new ControleurAdminEp();
    $this->ctrlAdminComm = new ControleurAdminComm();
    $this->ctrlEditeur = new ControleurEditeur();
    $this->ctrlSupprEp = new ControleurSupprEp();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
      if (isset($_GET['action'])) {
         if ($_GET['action'] == 'episode') {
            $idEpisode = intval($this->getParametre($_GET, 'id'));
            if ($idEpisode != 0) {
                $this->ctrlEpisodeDetail->episodeDetail($idEpisode);
            }
                else
                  throw new Exception("Identifiant de l'épisode non valide");
          }
          else if ($_GET['action'] == 'commenter') {
              $auteur = $this->getParametre($_POST, 'auteur');
              $contenu = $this->getParametre($_POST, 'contenu');
              $idEpisode = $this->getParametre($_POST, 'id');
              $this->ctrlEpisodeDetail->commenter($auteur, $contenu, $idEpisode);
            }
          else if ($_GET['action'] == 'editer') {
              $episodeNb = $this->getParametre($_POST, 'episodeNb');
              $titre = $this->getParametre($_POST, 'titre');
              $contenu = $this->getParametre($_POST, 'contenu');
              $this->ctrlEditeur->editer($episodeNb, $titre, $contenu);
            }
          else if ($_GET['action'] == 'connexion') {
              $login = $this->getParametre($_POST, 'login');
              $pass = $this->getParametre($_POST, 'pass');
              $this->ctrlUser->connecte($login, $pass);
            }
          else if ($_GET['action'] == 'formulaire') {
              $this->ctrlUser->formulaire();
            }
          else if ($_GET['action'] == 'Episodes') {
              $this->ctrlEpisode->episode();
            }
          else if ($_GET['action'] == 'contact') {
              $this->ctrlContact->contact();
            }
          else if ($_GET['action'] == 'adminEp') {
              $this->ctrlAdminEp->episode();
            }
          else if ($_GET['action'] == 'adminComm') {
              $this->ctrlAdminComm->commentaire();
            }
          else if ($_GET['action'] == 'delete') {
              $this->ctrlSupprEp->delete();
            }
          else if ($_GET['action'] == 'editeur') {
              $this->ctrlEditeur->editeur();
            }
          /*else if ($_GET['action'] == 'signal') {
              $this->ctrlSignal->signal();
            }*/
        else
          throw new Exception("Action non valide");
      }
      else {  // aucune action définie : affichage de l'accueil
        $this->ctrlAccueil->accueil();
      }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
    
  // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
      return $tableau[$nom];
    }
    else
      throw new Exception("Paramètre '$nom' absent");
  }
}
