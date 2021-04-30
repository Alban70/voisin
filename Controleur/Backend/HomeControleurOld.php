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
use Modele\EditocatManager;

use Modele\Edito;
use Modele\Editobis;
use \Modele\EditoManager;
use Modele\Editolien;
use Modele\EditolienManager;

use Modele\Famille;
use Modele\FamilleManager;

class HomeControleur extends \Lib\Controleur
{
    protected function indexAction()
    {
        $all_editos = new Edito();
        $ed = new EditoManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump('hello1');
            $all_editos->setTitre('%' . $_POST['titreEdi1'] . '%');
            $all_editos->setType('%' . $_POST['typeEdi1'] . '%');
            $all_editos->setStatut('%' . $_POST['statutEdi1'] . '%');
        }
        if (($all_editos->getTitre() !== NULL) && ($all_editos->getType() !== NULL)&& ($all_editos->getStatut() !== NULL)) :
            $all_editos->setTitre('%' . $_POST['titreEdi1'] . '%');
            $all_editos->setType('%' . $_POST['typeEdi1'] . '%');
            $all_editos->setStatut('%' . $_POST['statutEdi1'] . '%');
            $all_editos = $ed->filtreMix($all_editos);
        else :
            $all_editos = $ed->getAllEdito();
        endif;

        $all_categories = new Categorie();
        $cm = new CategorieManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $all_categories->setLibelle('%' . $_POST['libelleCat1'] . '%');
            $all_categories->setType('%' . $_POST['typeCat1'] . '%');
        }
        if (($all_categories->getLibelle() !== NULL) && ($all_categories->getType() !== NULL)) :
            $all_categories->setLibelle('%' . $_POST['libelleCat1'] . '%');
            $all_categories->setType('%' . $_POST['typeCat1'] . '%');
            $all_categories = $cm->filtreMix($all_categories);
        else :
            $all_categories = $cm->getAllCategoriesByEtiquette();
            //$all_categories2= $all_categories;

        endif;

        /*$ed = new EditoManager();
        $all_editos = $ed->getAllEdito();

        $cm = new CategorieManager();
        $all_categories = $cm->getAllCategorie();*/

        $fm = new FamilleManager();
        $all_FamilleSlugs = $fm->getAllFamillesBySlug();





        $all_editos_result = new Edito();
        $ed = new EditoManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump('hello1');
            $all_editos_result->setPays('%' . $_POST['pays'] . '%');
            $all_editos_result->setRegion('%' . $_POST['region'] . '%');
            $all_editos_result->setStatut('%' . $_POST['type'] . '%');
            $all_editos_result->setTitre('%' . $_POST['titre'] . '%');
        }
        if (($all_editos_result->getTitre() !== NULL) && ($all_editos_result->getPays() !== NULL)&& ($all_editos_result->getStatut() !== NULL)&& ($all_editos_result->getRegion() !== NULL)) :
            $all_editos_result->setPays('%' . $_POST['pays'] . '%');
            $all_editos_result->setRegion('%' . $_POST['region'] . '%');
            $all_editos_result->setStatut('%' . $_POST['type'] . '%');
            $all_editos_result->setStatut('%' . $_POST['titre'] . '%');
            $all_editos_result = $ed->filtreResult($all_editos_result);
        else :
            $all_editos_result = $ed->getAllEdito();
        endif;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edito = new Edito();
            $ed = new EditoManager();
            if ($edito->getErreur() == []) {
                $edito->setTitre('%' . $_POST['titre'] . '%');
                $edito->setType('%' . $_POST['type'] . '%');
                $ed = new EditoManager();
                $all_editos = $ed->filtreEdito($edito);
                //header('Location: ' . \Lib\Application::$racine . 'connexion');
                //header('Location: ' . \Lib\Application::$racine . 'edito');
                //exit();
            }
            $data = ['all_editos' => $all_editos];
            $this->render('HomeBE/myEditoBEhome.php', $data);
        }

        $data = ['all_editos' => $all_editos, 'all_categories' => $all_categories, 'all_editocats' => $all_editocats, 'all_categorielien' => $all_categorielien, 'all_FamilleSlugs' => $all_FamilleSlugs];
        $this->render('editoBE/myEditoBEhome.php', $data);

//stop
    }

    protected function editAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edito = new Edito();
            $ed = new EditoManager();
            $edito->setTitre($_POST['titre']);
            //$edito->setContenu($_POST['contenu']);
            $edito->setType('edito');
            $edito->setPublier(1);

            if ($edito->getErreur() == []) {
                $ed->insertEdito($edito);
                //header('Location: ' . \Lib\Application::$racine . 'connexion');
                //header('Location: ' . \Lib\Application::$racine . 'edito/index');
                //exit();
            }
            $data = ['edito' => $edito];
            $this->render('EditoBE/createEdito.html.php', $data);
            //$this->render('EditoBE/myEditoBEhome.php', [/*"token" => $token,*/ "erreurs" => $edito->getErreur()]);
        }

    }

    protected function addAction()
    {
        $this->render('EditoBE/createEdito.html.php');

    }
    protected function addecclAction()
    {
        $ed = new EditoManager();
        $all_editos = $ed->getAllEdito();

        $cm = new CategorieManager();
        $all_categories = $cm->getAllCategorie();


        $ecm = new EditocatManager();
        $all_editocats = $ecm->getAlleditocat();

        $clm = new CategorielienManager();
        $all_categorielien = $clm->getAllcategoriesLien();


        $data = ['all_editos' => $all_editos, 'all_categories' => $all_categories, 'all_editocats' => $all_editocats, 'all_categorielien' => $all_categorielien];
        $this->render('editoBE/myEditoBEhome.php', $data);

    }


    protected function modifyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['valeurEdi_id1'];
            //$edito_edit = new Edito();
            $ed = new EditoManager();
            $edito_edit = $ed->getEditoById($id);
                    }
            $data = ["edito_edit" => $edito_edit];
            $this->render('EditoBE/modifyEdito.html.php', $data);
    }
    protected function deleteAction()
    {
        $id = $_POST['valeurEdi_id1'];
        //$edito_edit = new Edito();
        $ed = new EditoManager();
        $edito = $ed->getEditoById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($edito->getErreur() == []) {
                $ed->deleteEdito($edito);
                header('Location: ' . \Lib\Application::$racine . 'edito');
                exit();
            }
        }

    }

    protected function searchAction()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edito = new Edito();
            $ed = new EditoManager();
            if ($edito->getErreur() == []) {
                $edito->setTitre('%' . $_POST['titre'] . '%');
                $edito->setType('%' . $_POST['type'] . '%');
                $ed = new EditoManager();
                $all_editos = $ed->filtreEdito($edito);
                //header('Location: ' . \Lib\Application::$racine . 'connexion');
                //header('Location: ' . \Lib\Application::$racine . 'edito');
                //exit();
            }
            $data = ['all_editos' => $all_editos];
            $this->render('editoBE/myEditoBEhome.php', $data);
        }

    }


}