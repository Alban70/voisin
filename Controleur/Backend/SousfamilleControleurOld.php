<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 27/02/2018
 * Time: 13:28
 */

namespace Controleur\Backend;

use Modele\Sousfamille;
use Modele\SousfamilleManager;
use Modele\Famille;
use Modele\FamilleManager;

class sousfamilleControleur extends \Lib\Controleur
{
    protected function indexAction()
    {

        $sfm = new SousfamilleManager();
        $all_sousfamilles = $sfm->getAllsousFamilles();

        $fam = new FamilleManager();
        $all_familles = $fam->getAllFamilles();

        $data = ['all_familles' => $all_familles, 'all_sousfamilles' => $all_sousfamilles];
        $this->render('famille/myFamilleHome.php', $data);

        //$data = ['all_sousfamilles' => $all_sousfamilles];
        //$this->render('famille/myFamilleHome.php', $data);
    }

    protected function addAction()
    {
        $fm = new FamilleManager();
        $all_familles = $fm->getAllFamilles();
        $data = ['all_familles' => $all_familles];
        $this->render('SousFamille/createSousFamille.html.php', $data);


        //$this->render('SousFamille/createSousFamille.html.php');

    }
    protected function editAction()
    {
        /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id=$_POST['valeur_id'];
            $fm = new \Modele\FamilleManager();
            $famille_edit = $fm->getFamilleById($id);



        }else{
            header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
            exit();
        }

        $data = ["famille_edit" => $famille_edit];
        $this->render('famille/modifier.html.php', $data);*/


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


                        $fm->updateFamille($famille);
                        header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
                        exit();
                    }

        }else{
            header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
            exit();
        }*/


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['valeurSousFam_id'];
            $sfam = new sousfamilleManager();
            $sousfamille_edit = $sfam->getSousFamilleById($id);
            if ($sousfamille_edit->getErreur() == []) {



            }

        }else{
            header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
            exit();
        }

        $data = ["sousfamille_edit" => $sousfamille_edit];
        $this->render('SousFamille/modifySousFamille.html.php', $data);


    }

    protected function deleteAction()
    {
        $id = $_POST['valeurSousFam_id'];
        $sfam = new SousfamilleManager();
        $sousfamille = $sfam->getSousFamilleById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($sousfamille->getErreur() == []) {
                $sfam->deleteSousFamille($sousfamille);
                header('Location: ' . \Lib\Application::$racine . 'famille');
                exit();
            }
        }
    }
    protected function searchAction()
    {
        $sousfamille = new Sousfamille();
        $sfam = new SousfamilleManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($sousfamille->getErreur() == []) {
                $sousfamille->setLibelle('%'.$_POST['libelleSousFamille'].'%');
                $sousfamille->setType('%'.$_POST['typeSousFamille'].'%');

                $all_sousfamilles = $sfam->filtreSousFamille($sousfamille);

                $fam = new FamilleManager();
                $all_familles = $fam->getAllFamilles();

            }
            $data = ['all_familles' => $all_familles, 'all_sousfamilles' => $all_sousfamilles];
            $this->render('famille/myFamilleHome.php', $data);


            //$data = ['all_sousfamilles' => $all_sousfamilles];
            //$this->render('famille/myFamilleHome.php', $data);
        }

    }
}