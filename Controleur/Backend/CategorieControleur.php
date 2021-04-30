<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 28/03/2018
 * Time: 18:54
 */

namespace Controleur\Backend;
use Modele\Categorie;
use Modele\CategorieManager;
use Modele\CategorielienManager;
use Modele\Famille;
use Modele\FamilleManager;

class CategorieControleur extends \Lib\Controleur
{
    protected function indexAction()
    {
        $cm = new CategorieManager();
        $all_categories = $cm->getAllCategorie();

        //$clm = new CategorielienManager();
        //$all_categorielien = $clm->getAlleditoLien();


        //$data = ['all_categories1' => $all_categories1, 'all_categories2' => $all_categories2, 'all_categorielien' => $all_categorielien];
        //$this->render('editoBE/myEditoBEhome.php', $data);

    }

    protected function editAction()
    {


    }

    protected function addAction()
    {
        /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edito = new Edito();
            $ed = new EditoManager();
            $edito->setTitre($_POST['titre']);
            //$edito->setContenu($_POST['contenu']);
            $edito->setType('edito');
            $edito->setPublier(1);
            if ($edito->getErreur() == []) {
                $ed->insertEdito($edito);
                //header('Location: ' . \Lib\Application::$racine . 'connexion');
                header('Location: ' . \Lib\Application::$racine . 'edito/index');
                exit();
            }
        }
        $this->render('EditoBE/createEdito.html.php');*/

        $this->render('CategorieBE/createCategorie.html.php');

    }
    protected function modifyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['valeurCat_id1'];
            $cm = new CategorieManager();
            $categorie_edit = $cm->getCategorieById($id);
        }
        $data = ["categorie_edit" => $categorie_edit];
        $this->render('CategorieBE/modifyCategorie.html.php', $data);
    }
    protected function deleteAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['valeurCat_id1'];
            $cm = new CategorieManager();
            $categorie = $cm->getCategorieById($id);
            if ($categorie->getErreur() == []) {
                $cm->deleteCategorie($categorie);
                header('Location: ' . \Lib\Application::$racine . 'slugs');
                exit();
            }
        }

    }

    /*protected function searchAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $all_categories1 = new Categorie();
            $cm1 = new CategorieManager();
            if ($all_categories1->getErreur() == []) {
                $all_categories1->setLibelle('%' . $_POST['libelleCat1'] . '%');
                //$all_categories1->setType('%' . $_POST['type'] . '%');
                $all_categories1->setFamId($_POST['fam_id']);
                $all_categories1 = $cm1->filtreMix($all_categories1);
            }
            $fm = new FamilleManager();
            $famille = $fm->getFamillesByEtiquette();
            $cm2 = new CategorieManager();
            $all_categories2 = $cm2->getAllCategoriesByEtiquette($famille);

            $fm = new FamilleManager();
            $all_FamilleSlugs = $fm->getAllFamillesBySlug();

            $data = ['all_categories1' => $all_categories1, 'all_categories2' => $all_categories2, 'all_FamilleSlugs' => $all_FamilleSlugs];
            $this->render('SlugsBE/myCategorieBEhome.php', $data);
        }
    }*/
    /*protected function searchAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $all_categories1 = new Categorie();
            $cm1 = new CategorieManager();
            if ($all_categories1->getErreur() == []) {

                $all_categories1->setLibelle('%' . $_POST['libelleCat1'] . '%');
                //$all_categories1->setType('%' . $_POST['type'] . '%');
                $fm2 = new FamilleManager();
                $famille = $fm2->getCategorieById($_POST['fam_id']);
                //$all_categories1->setFamId($_POST['fam_id']);
                $all_categories1 = $cm1->filtreMix($all_categories1, $famille);
                //$all_categories1= $all_categories;
            }
            $all_categories2 = new Categorie();
            $cm2 = new CategorieManager();
            if ($all_categories2->getErreur() == []) {
                $all_categories2->setLibelle('%' . $_POST['libelleCat2'] . '%');
                $fm = new FamilleManager();
                $famille = $fm->getFamillesByEtiquette();
                //$all_categories2->setFamId($_POST['fam_id']);
                $all_categories2 = $cm2->filtreMix($all_categories2, $famille);
                //$all_categories2= $all_categories;
            }

            //$cm2 = new CategorieManager();
            //$all_categories2 = $cm2->getAllCategoriesByEtiquette($famille);

            $fm = new FamilleManager();
            $all_FamilleSlugs = $fm->getAllFamillesBySlug();

            $data = ['all_categories1' => $all_categories1, 'all_categories2' => $all_categories2, 'all_FamilleSlugs' => $all_FamilleSlugs];
            $this->render('SlugsBE/myCategorieBEhome.php', $data);
        }
    }*/
    protected function searchAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $all_categories1 = new Categorie();
            //var_dump('hello');
            //var_dump('hello');
            $cm1 = new CategorieManager();
            //if ($all_categories1->getErreur() == []) {
                $all_categories1->setLibelle('%' . $_POST['libelleCat1'] . '%');
            $all_categories1->setType('%' . $_POST['typeCat1'] . '%');
                $fm2 = new FamilleManager();
            //var_dump('hello');
            //var_dump('hello');
            //var_dump($all_categories1);
                $all_categories1 = $cm1->filtreMix($all_categories1);
            //}
            $all_categories2 = new Categorie();
            $cm2 = new CategorieManager();
            $all_categories2 = $cm2->getAllCategorie();
            $data = ['all_categories1' => $all_categories1, 'all_categories2' => $all_categories2];
            //var_dump($data);
            $this->render('SlugsBE/myCategorieBEhome.php', $data);
        }
    }
}