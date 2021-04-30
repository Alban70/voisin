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
//use Modele\CategorielienManager;
use Modele\Slugs;
use Modele\SlugsManager;
use Modele\Famille;
use Modele\FamilleManager;


class SlugsControleur extends \Lib\Controleur
{
    protected function indexAction()
    {
        $all_categories1 = new Categorie();
        $cm1 = new CategorieManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //$id= $_POST['ESedito_Id'];
            //$edito = $ed1->getEditoById($id);

        $all_categories1->setLibelle('%' . $_POST['libelleCat1'] . '%');
        $all_categories1->setType('%' . $_POST['typeCat1'] . '%');
        }
if (($all_categories1->getLibelle() !== NULL) && ($all_categories1->getType() !== NULL)) :
    $all_categories1->setLibelle('%' . $_POST['libelleCat1'] . '%');
    $all_categories1->setType('%' . $_POST['typeCat1'] . '%');
    $all_categories1 = $cm1->filtreMix($all_categories1);
    else :
$all_categories1 = $cm1->getAllCategorie();
endif;

        $all_categories2 = new Categorie();
        $cm2 = new CategorieManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $all_categories2->setLibelle('%' . $_POST['libelleCat2'] . '%');
            $all_categories2->setType('%' . $_POST['typeCat2'] . '%');
        }
        if (($all_categories2->getLibelle() !== NULL) && ($all_categories2->getType() !== NULL)) :
            $all_categories2->setLibelle('%' . $_POST['libelleCat2'] . '%');
            $all_categories2->setType('%' . $_POST['typeCat2'] . '%');
            $all_categories2 = $cm1->filtreMix($all_categories2);
        else :
            $all_categories = $cm2->getAllCategorie();
            $all_categories2= $all_categories;

        endif;

        $categorie = new Categorie();
        $cm3 = new CategorieManager();
        $all_slugs = new Slugs();
        $sm = new SlugsManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id= $_POST['catSlug_Id1'];
            //$all_slugs->setParent('%' . $_POST['parentSlug'] . '%');
            $categorie = $cm3->getCategorieById($id);
        }
        if ($categorie !== false) :
            $all_slugs->setCategorie($categorie);
            //$all_catlienCopie->setStatut('copie');
            $all_slugs = $sm->getAllslugByCategorie($all_slugs, $categorie);
        else :
            $all_slugs= $sm->getAllSlugs();
        endif;
        $data = ['all_categories1' => $all_categories1, 'all_categories2' => $all_categories2, 'all_slugs' => $all_slugs];
        $this->render('SlugsBE/myCategorieLienhome.php', $data);
    }
    protected function navAction()
    {
        //$all_slugs = new Slugs();
        $sm = new SlugsManager();
        $all_slug = $sm-> nav();
        $i = 1;
        foreach ($all_slug as $i => $lug):
            $i++;
            switch ($lug) {
                case ($lug->getType1() === 'pays'):
                    //echo $lug->getType2();
                    $pays = $lug->getType2();
                    var_dump($pays);
                    break;
            }
        endforeach;

    }

    protected function addAction()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id= $_POST['catSlug_Id1'];
            $categorie1 = new Categorie();
            $cm1 = new CategorieManager();
            $categorie1 = $cm1->getCategorieById($id);

            $id2= $_POST['catSlug_Id2'];
            $categorie2 = new Categorie();
            $cm2 = new CategorieManager();
            $categorie2 = $cm2->getCategorieById($id2);


    $slug = new Slugs();
    $sm = new SlugsManager();
    if ($slug->getErreur() == []) {
        $cm = new CategorieManager();
        $slug->setCatId($_POST['catSlug_Id1']);
        $slug->setCatId2($_POST['catSlug_Id2']);
        $slug->setStatut('nav');
        $sm->insertSlug($slug, $categorie1, $categorie2);
        header('Location: ' . \Lib\Application::$racine . 'slugs');
        exit();
    }
}
    }
    protected function editAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id=$_POST['valeurFam_id'];
            $fm = new \Modele\FamilleManager();
            $famille_edit = $fm->getFamilleById($id);
        }else{
            header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
            exit();
        }
        $data = ["famille_edit" => $famille_edit];
        $this->render('famille/modifier.html.php', $data);

    }
    protected function modifyAction(){

        $id = $_POST['valeurCATL_Id'];
        //$categorielien = new Categorielien();
        $clm = new CategorielienManager();
        $categorielien = $clm->getCatLienById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        }
        $data = ["categorielien" => $categorielien];
        $this->render('CatLien/modifyCatLien.html.php', $data);
    }

    protected function deleteAction()
    {
        $id = $_POST['valeurSlug_Id'];
        $sm = new SlugsManager();
        $slug = $sm->getSlugById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($slug->getErreur() == []) {
                $sm->deleteSlug($slug);
                header('Location: ' . \Lib\Application::$racine . 'slugs');
                exit();
            }
        }
    }
}