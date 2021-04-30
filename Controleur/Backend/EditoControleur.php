<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 28/03/2018
 * Time: 18:54
 */

namespace Controleur\Backend;

use Lib\PDOFactory;
use Modele\Categorie;
use Modele\Categorielien;
use Modele\CategorieManager;
use Modele\CategorielienManager;
use Modele\EditocatManager;
use Modele\Edito;
use Modele\Editobis;
use \Modele\EditoManager;
use Modele\Editolien;
use Modele\EditolienManager;

use Modele\Editoslug;
use Modele\EditoslugManager;
use Modele\Famille;
use Modele\FamilleManager;
use Modele\Slugs;
use Modele\SlugsManager;
use Lib\Application;
use Lib\EntiteManager;
use \PDO;

use Modele\Image;
use Modele\Thumbnail;
use Tools\Token_Form;
use Tools\Upload_Image;


class EditoControleur extends \Lib\Controleur
{
    use Upload_Image;
    use Token_Form;

    protected function indexAction()
    {
/*<?php
        if (($_SERVER['REQUEST_URI'] != "/category/ielts/") && ($_SERVER['REQUEST_URI'] != "/category/tage-mage/")) {?>
        	<!--<img class="img-responsive" style="width:196px;" src="<?php echo get_template_directory_uri();  ?>/images/headers/kaplan-logo.png"  />-->
	<?php } //?>*/

        $all_editos = new Edito();
        $ed = new EditoManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $all_editos->setTitre('%' . $_POST['titreEdi1'] . '%');
            $all_editos->setType('%' . $_POST['typeEdi1'] . '%');
            $all_editos->setStatut('%' . $_POST['statutEdi1'] . '%');
        }
        if (($all_editos->getTitre() !== NULL) && ($all_editos->getType() !== NULL) && ($all_editos->getStatut() !== NULL)) :
            $all_editos->setTitre('%' . $_POST['titreEdi1'] . '%');
            $all_editos->setType('%' . $_POST['typeEdi1'] . '%');
            $all_editos->setStatut('%' . $_POST['statutEdi1'] . '%');
            $all_editos = $ed->filtreMix($all_editos);
        else :
            $all_editos = $ed->getAllEdito();
        endif;

        $all_slugs = new Slugs();
        $sm = new SlugsManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $all_slugs->setType1('%' . $_POST['typeSlug'] . '%');
        }
        if ($all_slugs->getType1() !== NULL) :
            $all_slugs = $sm->filtreMix($all_slugs);
        else :
            $all_slugs = $sm->getAllSlugs();
        endif;

        $edito = new Edito();
        $ed1 = new EditoManager();
        $all_editoslugs = new Editoslug();
        $esm = new EditoslugManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['ESedito_Id'];
            $edito = $ed1->getEditoById($id);
        }
        if ($edito !== false) :
            $all_editoslugs->setEdito($edito);
            $all_editoslugs = $esm->getAllEditoSlugsByEdito($all_editoslugs, $edito);
        else :
            $all_editoslugs = $esm->getAlleditoSlug();
        endif;

        $data = ['all_editos' => $all_editos, 'all_slugs' => $all_slugs, 'all_editoslugs' => $all_editoslugs];
        $this->render('editoBE/myEditoHome.php', $data);
    }

    /*protected function editAction()
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
        }

    }*/

    /*protected function addAction()
    {
// indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL

        $edito_edit = new Edito();
        $ed = new EditoManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edito_edit->setPublier(1);
            $edito_edit->setType($_POST['typeEdi1']);
            $edito_edit->setStatut($_POST['statutEdi1']);
            $edito_edit->setCode($_POST['code']);

            if (($edito_edit->getType() === 'post') && ($edito_edit->getStatut() === 'region')) :    // enveler
                $json = file_get_contents("../Web/json/import/regions_base/export-region.json");
                $region = json_decode($json);
                if($edito_edit->getCode() ==='region-5'):
                    $edito_edit->setTitre($region->{'region-5'}->{'name'});
                    $edito_edit->setContenu($region->{'region-5'}->{'description'});
                endif;
                if($edito_edit->getCode() ==='region-6'):
                    $edito_edit->setTitre($region->{'region-6'}->{'name'});
                    $edito_edit->setContenu($region->{'region-6'}->{'description'});
                endif;

                $data = ["edito_edit" => $edito_edit];
                $this->render('EditoBEregion/myEditoRegionCreate.php', $data);
            endif;

            if (($edito_edit->getType() === 'post') && ($edito_edit->getStatut() === 'voyage')) :    // enveler
                $days =[];
                if($edito_edit->getCode() ==='4572'):
                    $json = file_get_contents("../Web/json/import/corse.json");
                    //$article = json_decode($json);
                endif;
                if($edito_edit->getCode() ==='4672'):
                    $json = file_get_contents("../Web/json/import/test.json");
                    $article = json_decode($json);
                    if($edito_edit->getDay() ==='1'):
                        $edito_edit->setTitre($article->{'program'}->{'1'}->{'dayProgram'}->{'title'});
                        $edito_edit->setTitre($article->{'program'}->{'1'}->{'dayProgram'}->{'description'});
                    endif;
                    if($edito_edit->getDay() ==='2'):
                        $edito_edit->setTitre($article->{'program'}->{'2'}->{'dayProgram'}->{'title'});
                        $edito_edit->setTitre($article->{'program'}->{'2'}->{'dayProgram'}->{'description'});
                    endif;
                    if($edito_edit->getDay() ==='3'):
                        $edito_edit->setTitre($article->{'program'}->{'3'}->{'dayProgram'}->{'title'});
                        $edito_edit->setTitre($article->{'program'}->{'3'}->{'dayProgram'}->{'description'});
                    endif;
                    if($edito_edit->getDay() ==='4'):
                        $edito_edit->setTitre($article->{'program'}->{'4'}->{'dayProgram'}->{'title'});
                        $edito_edit->setTitre($article->{'program'}->{'4'}->{'dayProgram'}->{'description'});
                    endif;
                    if($edito_edit->getDay() ==='5'):
                        $edito_edit->setTitre($article->{'program'}->{'5'}->{'dayProgram'}->{'title'});
                        $edito_edit->setTitre($article->{'program'}->{'5'}->{'dayProgram'}->{'description'});
                    endif;
                    if($edito_edit->getDay() ==='0'):
                        $edito_edit->setTitre($article->{'name'});
    $edito_edit->setContenu($article->{'description'});
    $edito_edit->setNiveau($article->{'prices'}->{'2019-01-05'}->{'supSgl'});
    $day1 = $article->{'program'}->{'1'}->{'dayProgram'}->{'title'};
    $day2 = $article->{'program'}->{'2'}->{'dayProgram'}->{'title'};
    $day3 = $article->{'program'}->{'3'}->{'dayProgram'}->{'title'};
    $day4 = $article->{'program'}->{'4'}->{'dayProgram'}->{'title'};
    $day5 = $article->{'program'}->{'5'}->{'dayProgram'}->{'title'};
    $days =[$day1, $day2, $day3, $day4, $day5];
    $_SESSION['days'] = $days;
                        endif;
                    //$article = json_decode($json);
                endif;

                $data = ["edito_edit" => $edito_edit, "days" => $days];
                $this->render('EditoBEvoyage/myEditoVoyageCreate.php', $data);
            endif;

        }
    }*/

    /*protected function addAction()
    {
// indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL

        $edito_edit = new Edito();
        $ed = new EditoManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edito_edit->setPublier(1);
            $edito_edit->setType($_POST['typeEdi1']);
            $edito_edit->setStatut($_POST['statutEdi1']);
            $edito_edit->setCode($_POST['code']);

            if (($edito_edit->getType() === 'post') && ($edito_edit->getStatut() === 'region')) :    // enveler
                $json = file_get_contents("../Web/json/import/regions_base/export-region.json");
                $region = json_decode($json);
                if($edito_edit->getCode() ==='region-5'):
                    $edito_edit->setTitre($region->{'region-5'}->{'name'});
                    $edito_edit->setContenu($region->{'region-5'}->{'description'});
                endif;
                if($edito_edit->getCode() ==='region-6'):
                    $edito_edit->setTitre($region->{'region-6'}->{'name'});
                    $edito_edit->setContenu($region->{'region-6'}->{'description'});
                endif;

                $data = ["edito_edit" => $edito_edit];
                $this->render('EditoBEregion/myEditoRegionCreate.php', $data);
            endif;

            if (($edito_edit->getType() === 'post') && ($edito_edit->getStatut() === 'voyage')) :    // enveler
                $days =[];
                if($edito_edit->getCode() ==='4572'):
                    $json = file_get_contents("../Web/json/import/corse.json");
                    //$article = json_decode($json);
                endif;
                if($edito_edit->getCode() ==='4672'):
                    $json = file_get_contents("../Web/json/import/test.json");
                    //$article = json_decode($json);
                endif;
                $article = json_decode($json);

                $edito_edit->setTitre($article->{'name'});
                $edito_edit->setContenu($article->{'description'});
                $edito_edit->setNiveau($article->{'prices'}->{'2019-01-05'}->{'supSgl'});
                //$sup = $article->{'prices'}->{'2019-01-05'}->{'supSgl'};
                //$edito_edit->setNiveau($sup);

                $day1 = $article->{'program'}->{'1'}->{'dayProgram'}->{'title'};
                $day2 = $article->{'program'}->{'2'}->{'dayProgram'}->{'title'};
                $day3 = $article->{'program'}->{'3'}->{'dayProgram'}->{'title'};
                $day4 = $article->{'program'}->{'4'}->{'dayProgram'}->{'title'};
                $day5 = $article->{'program'}->{'5'}->{'dayProgram'}->{'title'};
                $days =[$day1, $day2, $day3, $day4, $day5];

                $_SESSION['days'] = $days;

                $data = ["edito_edit" => $edito_edit, "days" => $days];
                $this->render('EditoBEvoyage/myEditoVoyageCreate.php', $data);
            endif;

        }
    }*/
    protected function addAction()
{
// indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL

    $edito_edit = new Edito();
    $ed = new EditoManager();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $edito_edit->setPublier(1);
        $edito_edit->setType($_POST['typeEdi1']);
        $edito_edit->setStatut($_POST['statutEdi1']);
        $edito_edit->setCode($_POST['code']);
        //var_dump('hello');
        //var_dump('hello2');
        //var_dump($edito_edit);
        //var_dump($_POST['code']);
//var_dump($edito_edit->getCode());
        if (($edito_edit->getType() === 'post') && ($edito_edit->getStatut() === 'region')) :    // enveler
            $json = file_get_contents("../Web/json/import/regions_base/export-region.json");
            $region = json_decode($json);
            if($edito_edit->getCode() ==='region-5'):
                $edito_edit->setTitre($region->{'region-5'}->{'name'});
                $edito_edit->setContenu($region->{'region-5'}->{'description'});
            endif;
            if($edito_edit->getCode() ==='region-6'):
                $edito_edit->setTitre($region->{'region-6'}->{'name'});
                $edito_edit->setContenu($region->{'region-6'}->{'description'});
            endif;

            $data = ["edito_edit" => $edito_edit];
            $this->render('EditoBEregion/myEditoRegionCreate.php', $data);
        endif;

        if (($edito_edit->getType() === 'post') && ($edito_edit->getStatut() === 'voyage')) :    // enveler
            //var_dump('hello3');
            $days =[];
            if($edito_edit->getCode() ==='3655'):
                $json = file_get_contents("../Web/json/import/voyages_base/gastronomy-tour-in-paris-champagne-&-bordeaux.json");
                //$article = json_decode($json);
                //var_dump('hello');
                //var_dump('hello2');
                //var_dump($json);
            endif;
            if($edito_edit->getCode() ==='4572'):
                $json = file_get_contents("../Web/json/import/corse.json");
                //$article = json_decode($json);
            endif;
            if($edito_edit->getCode() ==='4672'):
                $json = file_get_contents("../Web/json/import/test.json");
                //$article = json_decode($json);
            endif;
            $article = json_decode($json);
            //var_dump('hello');
//var_dump($article);
            $edito_edit->setTitre($article->{'name'});
            $edito_edit->setContenu($article->{'description'});
            //$edito_edit->setNiveau($article->{'prices'}->{'2019-01-05'}->{'supSgl'});
            //$sup = $article->{'prices'}->{'2019-01-05'}->{'supSgl'};
            //$edito_edit->setNiveau($sup);

            $day1 = ['titre'=>$article->{'program'}->{'1'}->{'dayProgram'}->{'title'}, 'contenu'=>$article->{'program'}->{'1'}->{'dayProgram'}->{'description'}];
            $day2 = ['titre'=>$article->{'program'}->{'2'}->{'dayProgram'}->{'title'}, 'contenu'=>$article->{'program'}->{'2'}->{'dayProgram'}->{'description'}];
            $day3 = ['titre'=>$article->{'program'}->{'3'}->{'dayProgram'}->{'title'}, 'contenu'=>$article->{'program'}->{'3'}->{'dayProgram'}->{'description'}];
            $day4 = ['titre'=>$article->{'program'}->{'4'}->{'dayProgram'}->{'title'}, 'contenu'=>$article->{'program'}->{'4'}->{'dayProgram'}->{'description'}];





            /*$day5 = [$article->{'program'}->{'5'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'5'}->{'dayProgram'}->{'description'}];
            $day6 = [$article->{'program'}->{'6'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'6'}->{'dayProgram'}->{'description'}];
            $day7 = [$article->{'program'}->{'7'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'7'}->{'dayProgram'}->{'description'}];
            $day8 = [$article->{'program'}->{'8'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'8'}->{'dayProgram'}->{'description'}];
            $day9 = [$article->{'program'}->{'9'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'9'}->{'dayProgram'}->{'description'}];
            $day10 = [$article->{'program'}->{'10'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'10'}->{'dayProgram'}->{'description'}];
            $day11 = [$article->{'program'}->{'11'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'11'}->{'dayProgram'}->{'description'}];
            $day12 = [$article->{'program'}->{'12'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'12'}->{'dayProgram'}->{'description'}];
            $day13 = [$article->{'program'}->{'13'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'13'}->{'dayProgram'}->{'description'}];
            $day14 = [$article->{'program'}->{'14'}->{'dayProgram'}->{'title'}, $article->{'program'}->{'14'}->{'dayProgram'}->{'description'}];*/

            $days =['day-1'=>$day1, 'day-2'=>$day2, 'day-3'=>$day3, 'day-4'=>$day4];

            //$days = array_merge(['day 1'=>$day1], ['day 2'=>$day1], ['day 3'=>$day1], ['day 4'=>$day1]);

            $_SESSION['days'] = $days;

            $data = ["edito_edit" => $edito_edit, "days" => $days];
            $this->render('EditoBEvoyage/myEditoVoyageCreate.php', $data);
        endif;

    }
}
    protected function modifyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ed = new EditoManager();
            $id= $_POST['valeurEdi_id1'];
            $edito_edit = $ed->getEditoById($id);
            if (($edito_edit->getType() === 'post') && ($edito_edit->getStatut() === 'region') && ($edito_edit->getId() !== '0')) :    // enveler
                if($edito_edit->getCode() ==='region-5'):
                    $json = file_get_contents("../Web/json/regions/alpes_haute_provence.json");
                    //$article = json_decode($json);
                endif;
                if($edito_edit->getCode() ==='region-6'):
                    $json = file_get_contents("../Web/json/regions/alpes_martimes.json");
                endif;
                $article = json_decode($json);
                $edito_edit->setCode($article->{'code'});
                $edito_edit->setUrl($article->{'url'});
                $edito_edit->setType($article->{'type'});
                $edito_edit->setStatut($article->{'statut'});
                $edito_edit->setTitre($article->{'titre'});
                $edito_edit->setContenu($article->{'contenu'});

                $data = ["edito_edit" => $edito_edit,];
                $this->render('EditoBEregion/myEditoRegionModify.php', $data);
            endif;

            if (($edito_edit->getType() === 'post') && ($edito_edit->getStatut() === 'voyage') && ($edito_edit->getId() !== '0')) :    // enveler
                if($edito_edit->getCode() ==='4572'):
                $json = file_get_contents("../Web/json/voyages/valtorens.json");
                endif;
                if($edito_edit->getCode() ==='4672'):
                    $json = file_get_contents("../Web/json/voyages/valtorens_ski.json");
                endif;
                if($edito_edit->getCode() ==='3655'):
                    $json = file_get_contents("../Web/json/voyages/gastro_bordeaux.json");
                endif;
                $article = json_decode($json);

                $edito_edit->setCode($article->{'code'});
                $edito_edit->setUrl($article->{'url'});
                $edito_edit->setType($article->{'type'});
                $edito_edit->setStatut($article->{'statut'});
                $edito_edit->setTitre($article->{'titre'});
                $edito_edit->setContenu($article->{'contenu'});
                $edito_edit->setInclude($article->{'include'});
                $edito_edit->setExclude($article->{'exclude'});
                $edito_edit->setAccommodations($article->{'accommodations'});
                $edito_edit->setNiveau($article->{'prix'});

                $days =[];
                //$days = $edito_edit->setDays($article->{'days'});
                //var_dump($edito_edit->getDays($days));
                //$edito_edit->getDays($days);
                //$_SESSION['days'] = $days;

                $days = $article->{'days'};

                $data = ["edito_edit" => $edito_edit, "days" => $days];
                //$data = ["edito_edit" => $edito_edit];
                $this->render('EditoBEvoyage/myEditoVoyageModify.php', $data);
            endif;
    }
    }

    protected function deleteAction()
    {
        $id = $_POST['valeurEdi_id1'];
        $edito_edit = new Edito();
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
}