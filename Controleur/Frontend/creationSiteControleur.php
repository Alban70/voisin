<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 28/03/2018
 * Time: 18:54
 */

namespace Controleur\Frontend;
//use \Modele\EditoManager;

class creationSiteControleur extends \Lib\Controleur
{
    protected function indexAction()
    {
        $this->render('creation_site/myCreationSite.php');

    }
}