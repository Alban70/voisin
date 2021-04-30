<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 27/02/2018
 * Time: 13:28
 */

namespace Controleur\Backend;
use Modele\Edito;
use Modele\EditoManager;
use Modele\EditoslugManager;
use Modele\Nomenclature;
use Modele\NomenclatureManager;
use Modele\Famille;
use Modele\FamilleManager;


class NomenclatureControleur extends \Lib\Controleur
{
    protected function indexAction()
    {
        $all_articles1 = new Edito();
        $cm1 = new EditoManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $all_articles1->setTitre('%' . $_POST['libelleArt1'] . '%');
            $all_articles1->setType('%' . $_POST['typeArt1'] . '%');
        }
if (($all_articles1->getTitre() !== NULL) && ($all_articles1->getType() !== NULL)) :
    $all_articles1->setTitre('%' . $_POST['libelleArt1'] . '%');
    $all_articles1->setType('%' . $_POST['typeArt1'] . '%');
    $all_articles1 = $cm1->filtreMix($all_articles1);
    else :
        $all_articles1 = $cm1->getAllEdito();
endif;

        $all_articles2 = new Edito();
        $cm2 = new EditoManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $all_articles2->setTitre('%' . $_POST['libelleArt2'] . '%');
            $all_articles2->setType('%' . $_POST['typeArt2'] . '%');
        }
        if (($all_articles2->getTitre() !== NULL) && ($all_articles2->getType() !== NULL)) :
            $all_articles2->setTitre('%' . $_POST['libelleArt2'] . '%');
            $all_articles2->setType('%' . $_POST['typeArt2'] . '%');
            $all_articles2 = $cm1->filtreMix($all_articles2);
        else :
            $all_articles = $cm2->getAllEdito();
            $all_articles2 = $all_articles;

        endif;

        $article = new Edito();
        $cm3 = new EditoManager();
        $all_nomemclatures = new Nomenclature();
        $sm = new NomenclatureManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id= $_POST['artNo_Id1'];

            $article = $cm3->getEditoById($id);
        }
        if ($article !== false) :
            $all_nomemclatures->setEdito($article);
            $all_nomemclatures = $sm->getAllNomenclaturesByEdito($all_nomemclatures, $article);
        else :
            $all_nomemclatures= $sm->getAllNomenclature();
        endif;
        $data = ['all_articles1' => $all_articles1, 'all_articles2' => $all_articles2, 'all_nomemclatures' => $all_nomemclatures];
        $this->render('NomenclatureBE/myNomenclatureHome.php', $data);
        //$this->render('NomenclatureBE/myNomenclatureHome.php');
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
        //var_dump('hello');
        //var_dump('hello1');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id= $_POST['artNo_Id1'];
            $article1 = new Edito();
            $cm1 = new EditoManager();
            $article1 = $cm1->getEditoById($id);
//var_dump($_POST);
            //var_dump($article1);
            $id2= $_POST['artNo_Id2'];
            $article2 = new Edito();
            $cm2 = new EditoManager();
            $article2 = $cm2->getEditoById($id2);
            //var_dump('hello1');
            //var_dump($article1);

    $nav_edit = new Nomenclature();
    //$sm = new NomenclatureManager();
    if ($nav_edit->getErreur() == []) {
        //var_dump('hello2');
        $nav_edit->setParent($_POST['parentNo']);
        $nav_edit->setStatut($_POST['statutNo']);
        $nav_edit->setNavigation($_POST['nomNo']);
        $nav_edit->setTitre($_POST['TitreNo']);

        if($nav_edit->getStatut() ==='nomenclature'):
        //if($nav_edit->getStatut() ==='1'):
            $nav_edit->setEditoId($article1->getId());
            $nav_edit->setLibelle1($article1->getTitre());
            $nav_edit->setType1($article1->getType());
            $nav_edit->setEditoId2($article2->getId());
            $nav_edit->setLibelle2($article2->getTitre());
            $nav_edit->setType2($article2->getType());
        endif;
        if($nav_edit->getStatut() ==='navigation'):
        //if($nav_edit->getStatut() ==='2'):

            //if($nav_edit->getParent() ==='2'):
                if($nav_edit->getParent() ==='page'):
                $nav_edit->setEditoId($_POST['artNo_Id1']);
                $nav_edit->setLibelle1($article1->getTitre());
                $nav_edit->setType1($article1->getType());
                $nav_edit->setEditoId2(0);
            endif;
            if($nav_edit->getParent() ==='item'):
            //if($nav_edit->getParent() ==='1'):
                $nav_edit->setEditoId(0);
                $nav_edit->setEditoId2(0);
                //var_dump('hello3');
                //var_dump($nav_edit);
            endif;
        endif;

        //header('Location: ' . \Lib\Application::$racine . 'nomenclature');
        //exit();
    }
}
        //var_dump('hello3');
        $data = ["nav_edit" => $nav_edit];
        $this->render('NomenclatureBE/createNav.html.php', $data);
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