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
require_once 'Controleur/controleurSupprComm.php';
require_once 'Controleur/controleurModifEp.php';
require_once 'Controleur/controleurModifComm.php';
require_once 'Controleur/controleurSignal.php';
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
  private $ctrlSupprComm;
  private $ctrlModifEp;
  private $ctrlModifComm;
  private $ctrlSignal;

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
    $this->ctrlSupprComm = new ControleurSupprComm();
    $this->ctrlModifEp = new ControleurModifEp();
    $this->ctrlModifComm = new ControleurModifComm();
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
                    $this->ctrlAdminEp->episode();
                    break;
                case 'adminComm':
                    $this->ctrlAdminComm->commentaire();
                    break;
                case 'modifEp':
                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idEpisode = $this->getParametre($_POST, 'id');
                    $this->ctrlModifEp->modifEpisode($idEpisode, $titre, $contenu);
                    break;
                case 'editeurModifEp':
                   $idEpisode = $this->getParametre($_POST, 'id');
                    if ($idEpisode != 0) {
                        $this->ctrlModifEp->editeurModif($idEpisode);
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
                    $this->ctrlModifComm->modifCommentaire($idCommentaire, $auteur, $contenu, $signal, $epId);
                    break;
                case 'editeurModifComm':
                   $idCommentaire = $this->getParametre($_POST, 'id');
                    if ($idCommentaire != 0) {
                        $this->ctrlModifComm->editeurModif($idCommentaire);
                    } else {
                        throw new Exception("Identifiant du commentaire non valide");
                    }
                    break;
                /*case 'editeurModif':
                   $editType = $this->getParametre($_POST, 'editType')
                   $idObject = $this->getParametre($_POST, 'id');
                    if (editType == "episode" && $idObject != 0) {
                        $this->ctrlModifEp->editeurModif($idObject);
                    } 
                    else if (editType == "commentaire" && $idObject != 0) {
                        $this->ctrlModifComm->editeurModif($idObject);
                    } 
                    else {
                      throw new Exception("Identifiant de l'épisode non valide");
                    }
                    break;*/
                case 'deleteEp':
                    $idEpisode = $this->getParametre($_POST, 'id');
                    $this->ctrlSupprEp->delete($idEpisode);
                    break;
                case 'deleteComm':
                    $idCommentaire = $this->getParametre($_POST, 'id');
                    $this->ctrlSupprComm->delete($idCommentaire);
                    break;
                case 'signalement':
                    $idCommentaire = $this->getParametre($_POST, 'id');
                    $this->ctrlSignal->signal($idCommentaire);
                    break;
                
              default:
                  throw new Exception("Action non valide : ". $_GET['action']);
                  break;
          }
          
         /*if ($_GET['action'] == 'episode') {
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
          else if ($_GET['action'] == 'signal') {
              $this->ctrlSignal->signal();
            }
        else
          throw new Exception("Action non valide");*/
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
