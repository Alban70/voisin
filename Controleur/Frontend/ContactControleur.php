<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 27/02/2018
 * Time: 13:28
 */

namespace Controleur\Frontend;

use Lib\Application;
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
//use Tools\Token_Form;

class ContactControleur extends \Lib\Controleur
{
    protected function indexAction()
    {
        //$cm = new FamilleManager();
        //$familles = $cm->getAllFamilles();
        //$data = ['familles' => $familles];
        //$this->render('famille/listeFamille.html.php', $data);
        $this->render('contact/myContactHome.php');
    }


}



