<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 28/03/2018
 * Time: 18:54
 */

namespace Controleur\Frontend;
//use \Modele\EditoManager;

class formationReseauxSociauxControleur extends \Lib\Controleur
{
    protected function indexAction()
    {
        //$ed = new EditoManager();
        //$all_editos = $ed->getAllEdito();
        //$data = ['all_editos' => $all_editos];
        $this->render('formation_reseaux_sociaux/myFrsHome.php');
    }
}