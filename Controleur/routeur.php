<?php

require_once 'Controleur/controleurAccueil.php';
require_once 'Controleur/controleurEpisode.php';
require_once 'Controleur/controleurEpisodeDetail.php';
require_once 'Controleur/controleurContact.php';
require_once 'Controleur/controleurUser.php';
require_once 'Controleur/controleurAdmin.php';
require_once 'Controleur/controleurEditeur.php';
require_once 'Controleur/controleurSuppr.php';
require_once 'Controleur/controleurModif.php';
require_once 'Controleur/controleurSignal.php';
require_once 'Vue/vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlEpisode;
  private $ctrlEpisodeDetail;
  private $ctrlContact;
  private $ctrlUser;
  private $ctrlAdmin;
  private $ctrlEditeur;
  private $ctrlSuppr;
  private $ctrlModif;
  private $ctrlSignal;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlEpisode = new ControleurEpisode();
    $this->ctrlEpisodeDetail = new ControleurEpisodeDetail();
    $this->ctrlContact = new ControleurContact();
    $this->ctrlUser = new ControleurUser();
    $this->ctrlAdmin = new ControleurAdmin();
    $this->ctrlEditeur = new ControleurEditeur();
    $this->ctrlSuppr = new ControleurSuppr();
    $this->ctrlModif = new ControleurModif();
    $this->ctrlSignal= new ControleurSignal();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
      if (isset($_GET['action'])) {
          
          switch ($_GET['action']) {
                case 'episode':
                    $idEpisode = intval($this->getParametre($_GET, 'id'));
                    if ($idEpisode != 0) {
                        $this->ctrlEpisodeDetail->episodeDetail($idEpisode);
                    } else {
                        throw new Exception("Identifiant de l'épisode non valide");
                    }
                    break;
                case 'commenter':
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idEpisode = $this->getParametre($_POST, 'id');
                    $this->ctrlEpisodeDetail->commenter($auteur, $contenu, $idEpisode);
                    break;
                case 'editer':
                    $episodeNb = $this->getParametre($_POST, 'episodeNb');
                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $this->ctrlEditeur->editer($episodeNb, $titre, $contenu);
                    break;
                  case 'editeur':
                    $this->ctrlEditeur->editeur();
                    break;
                case 'connexion':
                    $login = $this->getParametre($_POST, 'login');
                    $pass = $this->getParametre($_POST, 'pass');
                    $this->ctrlUser->connecte($login, $pass);
                    break;
                case 'deconnexion':
                    $this->ctrlUser->deconnecte();
                    break;
                case 'formulaire':
                    $this->ctrlUser->formulaire();
                    break;
                case 'Episodes':
                    $this->ctrlEpisode->episode();
                    break;
                case 'contact':
                    $this->ctrlContact->contact();
                    break;
                case 'adminEp':
                    $this->ctrlAdmin->episode();
                    break;
                case 'adminComm':
                    $this->ctrlAdmin->commentaire();
                    break;
                case 'modifEp':
                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idEpisode = $this->getParametre($_POST, 'id');
                    $this->ctrlModif->modifEpisode($idEpisode, $titre, $contenu);
                    break;
                case 'editeurModifEp':
                   $idEpisode = $this->getParametre($_POST, 'id');
                    if ($idEpisode != 0) {
                        $this->ctrlModif->editeurModifEp($idEpisode);
                    } else {
                        throw new Exception("Identifiant de l'épisode non valide");
                    }
                    break;
                case 'modifComm':
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $epId = $this->getParametre($_POST, 'epId');
                    $signal = $this->getParametre($_POST, 'signal');
                    $idCommentaire = $this->getParametre($_POST, 'id');
                    $this->ctrlModif->modifCommentaire($idCommentaire, $auteur, $contenu, $signal, $epId);
                    break;
                case 'editeurModifComm':
                   $idCommentaire = $this->getParametre($_POST, 'id');
                    if ($idCommentaire != 0) {
                        $this->ctrlModif->editeurModifComm($idCommentaire);
                    } else {
                        throw new Exception("Identifiant du commentaire non valide");
                    }
                    break;
                case 'deleteEp':
                    $idEpisode = $this->getParametre($_POST, 'id');
                    $this->ctrlSuppr->deleteEp($idEpisode);
                    break;
                case 'deleteComm':
                    $idCommentaire = $this->getParametre($_POST, 'id');
                    $this->ctrlSuppr->deleteComm($idCommentaire);
                    break;
                case 'signalement':
                    $idEpisode = $this->getParametre($_POST, 'idEp');
                    $idCommentaire = $this->getParametre($_POST, 'idComm');
                    $this->ctrlSignal->signal($idCommentaire, $idEpisode);
                    break;
                
              default:
                  throw new Exception("Action non valide : ". $_GET['action']);
                  break;
          }
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
