<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 06/02/2018
 * Time: 13:42
 */

namespace Controleur\Backend;


use Lib\Application;
use Modele\AuteurManager;
use Modele\Auteur;
use Modele\ContactManager;
use Modele\Contact;
use Modele\CoordonneesManager;
use Modele\Coordonnees;
use Modele\Membre;
use Modele\MembreManager;
use Modele\CommandeManager;
use Tools\Token_Form;


class MembreControleur extends \Lib\Controleur
{


    public function indexAction()
    {
        $mm = new MembreManager();
        $membres = $mm->getAllMembres();
        $data = ['membres' => $membres];
        $this->render('membre/myMembreHome.php', $data);


        /*$auteur = $_SESSION['auteur'];

        $am = new AuteurManager();
        //$auteur = $am->getAuteurByLogin($auteur);
        $auteur = $am->getAuteurById($auteur->getId());


        $cm = new ContactManager();
        $contact = $cm->getContactById($auteur);
        //$contact = $cm->getContactById($contact->getContactId());


        $mm = new MembreManager();
        //$membre = $mm->getMembreById($contact->getId());
        $membre = $mm->getMembreById($contact);

        $mcoord = new CoordonneesManager();
        $coordonnees = $mcoord->getCoordonneesById($contact);

        $comm = new CommandeManager();
        $commandes = $comm->getAllCommandesById($contact);
        $data = ['auteur' => $auteur, 'contact' => $contact, 'membre' => $membre, 'coordonnees' => $coordonnees, 'commandes' => $commandes ];
        //$data = ['auteur' => $auteur, 'contact' => $contact];
        $this->render('membre/acceuil_membres.html.php', $data);*/


        /*if (!isset($_SESSION['auteur'])) {
            header('Location: ' . \Lib\Application::$racine . 'theme_membresPo/web/connexion');
            exit;
        } else {
            $auteur = new Auteur($_SESSION['auteur']);
            $am = new AuteurManager();
            $auteur = $am->getAuteurByLogin($auteur);
            $data = ['auteur' => $auteur];
            $this->render('edito/listeArticle.html.php', $data);
        }*/
    }
    public function editAction()
    {

        $auteur = $_SESSION['auteur'];
        $am = new AuteurManager();
        $auteur = $am->getAuteurById($auteur->getId());
        $cm = new ContactManager();
        $contact = $cm->getContactById($auteur);
        $mm = new MembreManager();
        $membre = $mm->getMembreById($contact);
        $mcoord = new CoordonneesManager();
        $coordonnees = $mcoord->getCoordonneesById($contact);




        $data = ['auteur' => $auteur, 'contact' => $contact, 'membre' => $membre, 'coordonnees' => $coordonnees];
        $this->render('membre/modifier.html.php', $data);


        /*$auteur = $_SESSION['auteur'];
        $am = new AuteurManager();
        $auteur = $am->getAuteurById($auteur->getId());
        $cm = new ContactManager();
        $contact = $cm->getContactById($auteur);
        $mm = new MembreManager();
        $membre = $mm->getMembreById($contact);
        $mcoord = new CoordonneesManager();
        $coordonnees = $mcoord->getCoordonneesById($contact);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $am = new AuteurManager();
                $cm = new ContactManager();
                $mm = new MembreManager();
                $mcoord = new CoordonneesManager();
                //$membre_update->setId($membre->getId());
                $membre_update->setSocId($_POST['soc_id']);
                $membre_update->setNom($_POST['rs']);
                $membre_update->setAdresse1($_POST['adresse1']);
                $membre_update->setCp($_POST['cp']);
                $membre_update->setVille($_POST['ville']);
                $contact_update->setContactId($_POST['contact_id']);
                $contact_update->setNom($_POST['nom']);
                $contact_update->setPrenom($_POST['prenom']);
                $auteur_update->setId($_POST['id']);
                $auteur_update->setLogin($_POST['login']);
                $coordonnees_update->setCoordId($_POST['coord_id']);
                $coordonnees_update->setTel($_POST['tel']);
                $coordonnees_update->setEmail($_POST['email']);
                $am->updateAuteur($auteur_update);
                $cm->updateContact($contact_update);
                $mm->updateMembre($membre_update);
                $mcoord->updateCoordonnees($coordonnees_update);
                header('Location: ' . \Lib\Application::$racine . 'membre/acceuil_membres.html.php');
                exit();


        }else{
            header('Location: ' . \Lib\Application::$racine . 'membre/acceuil_membres.html.php');
            exit();
        }
        $data = ['auteur' => $auteur, 'contact' => $contact, 'membre' => $membre, 'coordonnees' => $coordonnees];
        //$data = ['auteur' => $auteur, 'contact' => $contact];
        $this->render('membre/modifier.html.php', $data);*/

    }
    protected function modifierAction()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $auteur_update = new Auteur();
            $contact_update = new Contact();
            $membre_update = new Membre();
            $coordonnees_update = new Coordonnees();
            $am = new AuteurManager();
            $cm = new ContactManager();
            $mm = new MembreManager();
            $mcoord = new CoordonneesManager();
            //$membre_update->setId($membre->getId());
            $membre_update->setSocId($_POST['soc_id']);
            $membre_update->setNom($_POST['rs']);
            $membre_update->setAdresse1($_POST['adresse1']);
            $membre_update->setCp($_POST['cp']);
            $membre_update->setVille($_POST['ville']);
            $contact_update->setContactId($_POST['contact_id']);
            $contact_update->setNom($_POST['nom']);
            $contact_update->setPrenom($_POST['prenom']);
            $auteur_update->setId($_POST['id']);
            $auteur_update->setLogin($_POST['login']);
            $coordonnees_update->setCoordId($_POST['coord_id']);
            $coordonnees_update->setTel($_POST['tel']);
            $coordonnees_update->setEmail($_POST['email']);
            $am->updateAuteur($auteur_update);
            $cm->updateContact($contact_update);
            $mm->updateMembre($membre_update);
            $mcoord->updateCoordonnees($coordonnees_update);
            header('Location: ' . \Lib\Application::$racine . 'membre/acceuil_membres.html.php');
            exit();


        }else{
            header('Location: ' . \Lib\Application::$racine . 'membre/acceuil_membres.html.php');
            exit();
        }
    }
    protected function listeAction()
    {
        $mm = new MembreManager();
        $membres = $mm->getAllMembres();
        $data = ['membres' => $membres];
        $this->render('membre/myMembreHome.php', $data);

    }
}