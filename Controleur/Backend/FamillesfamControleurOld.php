<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 27/02/2018
 * Time: 13:28
 */

namespace Controleur\Backend;

use Modele\Famille;
use Modele\FamilleManager;
use Modele\Sousfamille;
use Modele\SousfamilleManager;
use Modele\Famillesfam;
use Modele\famillesfamManager;

class FamillesfamControleur extends \Lib\Controleur
{
    protected function indexAction()
    {

        //$all_familles_sousfamilles = new Famillesfam();
        $lfsf = new FamillesfamManager();
        $all_familles_sousfamilles = $lfsf->getAllFamilles_sousFamille();

        //$this->render('famille/myFamilleHome.php', $data);
        $data = ['all_familles_sousfamilles' => $all_familles_sousfamilles];
        $this->render('famille/myFamilleHome.php', $data);
    }

    protected function addAction()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $famille = new Famille();
        //$fm = new FamilleManager();


        $sousfamille = new Sousfamille();
        //$fm = new FamilleManager();


        $famille_sousfamille = new Famillesfam();
        $lfsf = new FamillesfamManager();


        if ($famille_sousfamille->getErreur() == []) {
            $famille->setFamId($_POST['valeurL_famId']);
            $sousfamille->setSfamId($_POST['valeurL_sFamId']);
            $famille_sousfamille->setFamilleLib('lien');
            $famille_sousfamille->setSfamilleLib('lien');

            $lfsf->insertFamille_sousFamille($famille_sousfamille, $famille, $sousfamille);
            header('Location: ' . \Lib\Application::$racine . 'famille');
            exit();

        }
        }
        $this->render('famille/myFamilleHome.php', [/*"token" => $token,*/ "erreurs" => $famille_sousfamille->getErreur()]);
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


        /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id=$_POST['valeur_id'];
            $famille = new \Modele\Famille();
            $fm = new \Modele\FamilleManager();
            $famille_edit = $fm->getFamilleById($id);



                    if ($famille->getErreur() == []) {
                        $fm = new \Modele\FamilleManager();
                        $famille->setId($famille_edit->getId());
                        //$article->setAuteur($_SESSION['auteur']);
                        $famille->setDate(new \DateTime('now'));
                        $famille->setLibelle($_POST['libelle']);
                        $famille->setActif($_POST['actif']);
                        $famille->setType($_POST['type']);
                        $famille->setStatut($_POST['statut']);

                        $fm->updateFamille($famille);
                        header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
                        exit();
                    }

        }else{
            header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
            exit();
        }

        $data = ["erreurs" => $famille->getErreur(), "famille_edit" => $famille_edit];
        $this->render('famille/modifier.html.php', $data);*/
    }
    protected function modifyAction(){
        /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $famille = new \Modele\Famille();
            $fm = new \Modele\FamilleManager();

                    if ($famille->getErreur() == []) {
                        $famille->setFamId($_POST['fam_id']);
                        //$article->setAuteur($_SESSION['auteur']);
                        $famille->setDate(new \DateTime('now'));
                        $famille->setLibelle($_POST['libelle']);
                        $famille->setActif($_POST['actif']);
                        $famille->setType($_POST['type']);
                        $famille->setStatut($_POST['statut']);

                        $fm->updateFamille($famille);
                        header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
                        exit();
                    }

        }else{
            header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
            exit();
        }*/

        $id = $_POST['valeurFam_id'];
        $fam = new familleManager();
        $famille_edit = $fam->getFamilleById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        }
        $data = ["famille_edit" => $famille_edit];
        $this->render('famille/modifyFamille.html.php', $data);
    }

    protected function deleteAction()
    {
        $id = $_POST['valeurFam_id'];
        $fam = new FamilleManager();
        $famille = $fam->getFamilleById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($famille->getErreur() == []) {
                $fam->deleteFamille($famille);
                header('Location: ' . \Lib\Application::$racine . 'famille');
                exit();
            }
        }
    }
    protected function searchAction()
    {

        $famille = new Famille();
        $fam = new FamilleManager();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            if ($famille->getErreur() == []) {
                $famille->setLibelle('%'.$_POST['libelleFamille'].'%');
                $famille->setType('%'.$_POST['typeFamille'].'%');
                $fam = new FamilleManager();
                $all_familles = $fam->filtreFamille($famille);

                $sfm = new SousfamilleManager();
                $all_sousfamilles = $sfm->getAllsousFamilles();

            }
            $data = ['all_familles' => $all_familles, 'all_sousfamilles' => $all_sousfamilles];
            $this->render('famille/myFamilleHome.php', $data);
        }

    }
}