<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 27/02/2018
 * Time: 13:28
 */

namespace Controleur\Backend;

use Modele\Categorie;
use Modele\CategorieManager;
use Modele\Edito;
use Modele\EditoManager;
use Modele\Editocat;
use Modele\EditocatManager;
use Modele\Categorielien;
use Modele\CategorielienManager;
use Modele\Editolien;
use Modele\EditolienManager;
use Modele\Editoslug;
use Modele\EditoslugManager;
use Modele\Famille;
use Modele\FamilleManager;
use Modele\Slugs;
use Modele\SlugsManager;
use Modele\Sousfamille;
use Modele\SousfamilleManager;
use Modele\Famillesfam;
use Modele\famillesfamManager;

class EditoslugControleur extends \Lib\Controleur
{
    protected function indexAction()
    {


    }
    protected function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id= $_POST['ESedito_Id'];
            $id1= $_POST['ESslug_Id'];
            $id2= $_POST['EScat_Id1'];
            $id3= $_POST['EScat_Id2'];

            $edito = new Edito();
            $ed = new EditoManager();
            $edito = $ed->getEditoById($id);

            $slugs = new Slugs();
            $sm = new SlugsManager();
            $slugs = $sm->getSlugById($id1);

            $categorie1 = new Categorie();
            $cm1 = new CategorieManager();
            $categorie1 = $cm1->getCategorieById($id2);


            $categorie2 = new Categorie();
            $cm2 = new CategorieManager();
            $categorie2 = $cm2->getCategorieById($id3);

            //$EditoSlugs = new Editoslug();
            $esm = new EditoslugManager();
            $esm->insertEditoSlugs($edito, $slugs, $categorie1, $categorie2);


            header('Location: ' . \Lib\Application::$racine . 'edito');
            exit();
            //}
        }
    }

    protected function modifyAction()
    {

    }
    protected function editAction()
    {

    }


    protected function deleteAction()
    {

    }
}