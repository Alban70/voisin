<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 06/02/2018
 * Time: 13:42
 */

namespace Controleur\Backend;


use Lib\Application;
use Modele\Auteur;
use Modele\contact;
use Modele\ContactManager;
use Modele\Coordonnees;
use Modele\CoordonneesManager;
use Modele\Membre;
use Modele\AuteurManager;
use Modele\MembreManager;
use Tools\Token_Form;


class ConnexionControleur extends \Lib\Controleur
{
    use Token_Form;


        public function disconnectAction(){
                session_destroy();
                //setcookie(session_name(), session_id(), time() - 10, '/', null, null, true);
                header('Location: ' . \Lib\Application::$racine . 'app.php');
                exit();
        }
}