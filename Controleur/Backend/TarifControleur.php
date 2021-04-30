<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 27/02/2018
 * Time: 13:28
 */

namespace Controleur\Backend;

use Modele\Editolien;
use Modele\EditolienManager;
use Modele\Famille;
use Modele\FamilleManager;
use Modele\Sousfamille;
use Modele\SousfamilleManager;
use Modele\Famillesfam;
use Modele\famillesfamManager;
use Modele\Tarif;
use Modele\TarifManager;

class TarifControleur extends \Lib\Controleur
{
    protected function indexAction()
    {

        //$all_familles_sousfamilles = new Famillesfam();
        $elm = new EditolienManager();
        $all_editolien = $elm->getAlleditoLien();

        //$this->render('famille/myFamilleHome.php', $data);
        $data = ['all_editolien' => $all_editolien];
        $this->render('famille/myFamilleHome.php', $data);
    }
    protected function addAction()
    {
        $tarif_edit = new Tarif();
        //$tm = new TarifManager();
        $tarif_edit->setArticleId($_POST['valeurTAR3_IdART']);
        $tarif_edit->setEditoId($_POST['valeurTAR3_IdEDI']);
        //$id->setArticleId->$_POST['valeurTAR3_IdEDI'];
        //$id2 = $_POST['valeurTAR3_IdART'];

        $data = ['tarif_edit' => $tarif_edit];
        $this->render('tarifs/createTarif.html.php', $data);

    }
    protected function modifyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['valeurTAR3_IdART'];
            $id2 = $_POST['valeurTAR3_IdEDI'];
            $tm = new TarifManager();
            $tarif_edit = $tm->getArticleById($id, $id2);

        }
        $data = ["tarif_edit" => $tarif_edit];
        $this->render('tarifs/modifyTarif.html.php', $data);
    }

    protected function editAction()
    {

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


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $editolien = new Editolien();
            $edl = new EditolienManager();
            if ($editolien->getErreur() == []) {

                //$editolien->setTitre('%'.$_POST['titre'].'%');
                $editolien->setType('%'.$_POST['typeEDL'].'%');
                //$ed = new EditoManager();
                $all_editolien = $edl->filtreEditoLien($editolien);
                //header('Location: ' . \Lib\Application::$racine . 'connexion');
                //header('Location: ' . \Lib\Application::$racine . 'edito');
                //exit();
            }
            $data = ['all_editos' => $all_editos];
            $this->render('editoBE/myEditoBEhome.php', $data);
        }

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