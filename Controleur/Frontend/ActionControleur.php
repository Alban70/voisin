<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 27/02/2018
 * Time: 13:28
 */

namespace Controleur\Frontend;

use Lib\Application;
use Modele\ActionManager;
use Modele\Auteur;
use Modele\Contact;
use Modele\ContactManager;
use Modele\Coordonnees;
use Modele\CoordonneesManager;
use Modele\Membre;
use Modele\AuteurManager;
use Modele\MembreManager;
use Modele\Commande;
use Modele\CommandeManager;
use Modele\Action;

//use Tools\Token_Form;

class ActionControleur extends \Lib\Controleur
{
    protected function indexAction()
    {
        //$cm = new FamilleManager();
        //$familles = $cm->getAllFamilles();
        //$data = ['familles' => $familles];
        //$this->render('famille/listeFamille.html.php', $data);
        $this->render('contact/myContactHome.php');
    }

    protected function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {



            $membre = new Membre;
            $mm = new MembreManager();
            $membre->setNom($_POST['ste']);

            //$mm->getMembreByNom($membre);
            //if ($am->getMembreByNom($membre)!== false) {
                //$membre->setErreur(['Login déjà pris. Essayez en un autre']);
            //}else{
                //$membre->setErreur(['Login déjà pris. Essayez en un autre']);
            //}


            $contact = new Contact;
            $cm = new ContactManager();
            $contact->setNom($_POST['nom']);
            $contact->setPrenom($_POST['prenom']);

            $coordonnees = new Coordonnees();
            $coorm = new CoordonneesManager();
            $coordonnees->setTel($_POST['tel']);
            $coordonnees->setEmail($_POST['email']);

            $auteur = new Auteur();
            $autm = new AuteurManager();
            $auteur->setStatut('En attente');


            $action= new Action();
            $am = new ActionManager();
            $action->setLibelle('Demande de contact');

            if ($action->getErreur() == []) {
                $am->insertContactAction($auteur, $membre, $contact, $coordonnees, $action);
                //header('Location: ' . \Lib\Application::$racine . 'connexion');
                header('Location: ' . \Lib\Application::$racine . 'app.php');
                exit();

            }
        }

        $this->render('contact/myContactHome.php', [/*"token" => $token,*/ "erreurs" => $action->getErreur()]);
    }
    protected function auditAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $membre = new Membre;
            $mm = new MembreManager();
            $membre->setNom($_POST['ste']);

            //$mm->getMembreByNom($membre);
            //if ($am->getMembreByNom($membre)!== false) {
            //$membre->setErreur(['Login déjà pris. Essayez en un autre']);
            //}else{
            //$membre->setErreur(['Login déjà pris. Essayez en un autre']);
            //}


            $contact = new Contact;
            $cm = new ContactManager();
            $contact->setNom($_POST['nom']);
            $contact->setPrenom($_POST['prenom']);

            $coordonnees = new Coordonnees();
            $coorm = new CoordonneesManager();
            $coordonnees->setTel($_POST['tel']);
            $coordonnees->setEmail($_POST['email']);

            $auteur = new Auteur();
            $autm = new AuteurManager();
            $auteur->setStatut('En attente');


            $action= new Action();
            $am = new ActionManager();
            $action->setLibelle('Demande de contact');
            $action->setDesignation($_POST['Commentaires']);

            if ($action->getErreur() == []) {
                $am->insertContactActionAudit($auteur, $membre, $contact, $coordonnees, $action);
                //header('Location: ' . \Lib\Application::$racine . 'connexion');
                header('Location: ' . \Lib\Application::$racine . 'app.php');
                exit();

            }
        }

        $this->render('Audit_gratuit/myAuditHome.php', [/*"token" => $token,*/ "erreurs" => $action->getErreur()]);
    }
}



