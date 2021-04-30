<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 28/03/2018
 * Time: 18:54
 */



namespace Controleur\Backend;
//use Modele\Editocat;
//use Modele\EditocatManager;
use Modele\Article;
use Modele\ArticleManager;
use Modele\Categorie;
//use Modele\Categorielien;
use Modele\CategorieManager;
//use Modele\CategorielienManager;
use Modele\Edito;
use Modele\Famille;
use Modele\Sousfamille;
use Modele\Tarif;
use Modele\TarifManager;
//use Lib\Application;
//use Modele\SousfamilleManager;
use \Modele\EditoManager;
use Modele\FamilleManager;
use Modele\Nomenclature;
use Modele\NomenclatureManager;


use Modele\Image;
use Modele\Thumbnail;
use Tools\Token_Form;
use Tools\Upload_Image;

class AdminControleur extends \Lib\Controleur
{
    use Upload_Image;
    use Token_Form;
    protected function indexAction()
    {
    }
    protected function addnoAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nomenclature = new Nomenclature();
            $nm = new NomenclatureManager();

            if ($nomenclature->getErreur() == []) {
                $nomenclature->setEditoId($_POST['artNo_Id1']);
                $nomenclature->setLibelle1($_POST['artLib1']);
                $nomenclature->setType1($_POST['artType1']);
                $nomenclature->setEditoId2($_POST['artNo_Id2']);
                $nomenclature->setLibelle2($_POST['artLib2']);
                $nomenclature->setType2($_POST['artType2']);
                $nomenclature->setStatut($_POST['statutNo']);
                $nomenclature->setNiveau($_POST['nivNo']);
                $nomenclature->setNavigation($_POST['nomNo']);
                $nomenclature->setParent($_POST['parentNo']);
                $nomenclature->setTitre($_POST['titreNo']);

                $nm->insertNomenclature($nomenclature);
                header('Location: ' . \Lib\Application::$racine . 'nomenclature');
                exit();
            }
        }

    }
    /*protected function addeditoAction()
    {
        $days =[];
        //$titre=[];
        //$contenu=[];
        //$articleJ=[];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edito = new Edito();
            $ed = new EditoManager();
            $edito->setPublier(1);
            $edito->setId($_POST['id']);
            $edito->setCode($_POST['code']);
            $edito->setUrl($_POST['url']);
            $edito->setType($_POST['type']);
            $edito->setStatut($_POST['statut']);
            $edito->setTitre($_POST['titre']);
            $edito->setContenu($_POST['contenu']);
            $edito->setNiveau($_POST['prix']);
            $edito->setInclude($_POST['include']);
            $edito->setExclude($_POST['exclude']);
            $edito->setAccommodations($_POST['accommodations']);

            $edito->setEdito($edito);

            $days = $_SESSION['days'];
            //$articleJ = $edito->getEdito();
            //$edito->setData($article);

            $id = $edito->getId();
            $code = $edito->getCode();
            $url = $edito->getUrl();
            $type = $edito->getType();
            $statut = $edito->getStatut();
            $titre = $edito->getTitre();
            $contenu = $edito->getContenu();
            $prix = $edito->getNiveau();
            $include = $edito->getInclude();
            $exclude = $edito->getExclude();
            $accommodations = $edito->getAccommodations();


            $editos_results = array_merge(['id' => $id, 'code' => $code, 'url' => $url, 'type' => $type, 'statut' => $statut, 'titre' => $titre, 'contenu' => $contenu, 'days' => $days, 'prix' => $prix, 'include' => $include, 'exclude' => $exclude, 'accommodations' => $accommodations]);
            $article = json_encode($editos_results);

            if($edito->getCode() ==='region-5'):
            file_put_contents('../Web/json/alpes_haute_provence.json', $article);
            endif;
            if($edito->getCode() ==='4572'):
                file_put_contents('../Web/json/valtorens.json', $article);
            endif;

            if ($edito->getErreur() == []) {
                $ed->insertEdito($edito);
                header('Location: ' . \Lib\Application::$racine . 'edito');
                exit();
            }
        }
    }*/
    protected function addeditoAction()
{
    $days =[];
    //$titre=[];
    //$contenu=[];
    //$articleJ=[];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $edito = new Edito();
        $ed = new EditoManager();

        if(($_POST['id'] !=='0')&&($_POST['statut'] ==='region')):
            $edito->setPublier(1);
            $edito->setCode($_POST['code']);
            $edito->setUrl($_POST['url']);
            $edito->setType($_POST['type']);
            $edito->setStatut($_POST['statut']);
            $edito->setTitre($_POST['titre']);
            $edito->setContenu($_POST['contenu']);

            $edito->setEdito($edito);

            $code = $edito->getCode();
            $url = $edito->getUrl();
            $type = $edito->getType();
            $statut = $edito->getStatut();
            $titre = $edito->getTitre();
            $contenu = $edito->getContenu();

            $editos_results = array_merge(['code' => $code, 'url' => $url, 'type' => $type, 'statut' => $statut, 'titre' => $titre, 'contenu' => $contenu]);
            $article = json_encode($editos_results);

            // mettre dans le getErreur
            if($edito->getCode() ==='region-5'):
                file_put_contents('../Web/json/regions/alpes_haute_provence.json', $article);
            endif;
            if($edito->getCode() ==='region-6'):
                file_put_contents('../Web/json/regions/alpes_martimes.json', $article);
            endif;
            // fin

        endif;

        if(($_POST['id'] !=='0')&&($_POST['statut'] ==='voyage')):
            $edito->setPublier(1);
            //$edito->setId($_POST['id']);
            $edito->setCode($_POST['code']);
            $edito->setUrl($_POST['url']);
            $edito->setType($_POST['type']);
            $edito->setStatut($_POST['statut']);
            $edito->setTitre($_POST['titre']);
            $edito->setContenu($_POST['contenu']);
            $edito->setNiveau($_POST['prix']);
            $edito->setInclude($_POST['include']);
            $edito->setExclude($_POST['exclude']);
            $edito->setAccommodations($_POST['accommodations']);



            $days = $_SESSION['days'];


            $code = $edito->getCode();
            $url = $edito->getUrl();
            $type = $edito->getType();
            $statut = $edito->getStatut();
            $titre = $edito->getTitre();
            $contenu = $edito->getContenu();
            $prix = $edito->getNiveau();
            $include = $edito->getInclude();
            $exclude = $edito->getExclude();
            $accommodations = $edito->getAccommodations();
            $edito->setEdito($edito);

            $editos_results = array_merge(['code' => $code, 'url' => $url, 'type' => $type, 'statut' => $statut, 'titre' => $titre, 'contenu' => $contenu, 'days' => $days, 'prix' => $prix, 'include' => $include, 'exclude' => $exclude, 'accommodations' => $accommodations]);
            $article = json_encode($editos_results);
            $edito->setData($article);

            // mettre dans le getErreur
            if($edito->getCode() ==='4572'):
                file_put_contents('../Web/json/voyages/valtorens.json', $article);
            endif;
            if($edito->getCode() ==='4672'):
            file_put_contents('../Web/json/voyages/valtorens_ski.json', $article);
        endif;
            if($edito->getCode() ==='3655'):
                file_put_contents('../Web/json/voyages/gastro_bordeaux.json', $article);
            endif;
            // fin

        endif;
        if ($edito->getErreur() == []) {
            $ed->insertEdito($edito);
            header('Location: ' . \Lib\Application::$racine . 'edito');
            exit();
        }
    }
}
    protected function modifyeditoAction()
    {
        $days =[];
        $titre=[];
        $contenu=[];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edito = new Edito();
            $ed = new EditoManager();

            if(($_POST['id'] !=='0')&&($_POST['statut'] ==='region')):

            $edito->setId($_POST['id']);
            $edito->setCode($_POST['code']);
            $edito->setUrl($_POST['url']);
            $edito->setType($_POST['type']);
            $edito->setStatut($_POST['statut']);
            $edito->setTitre($_POST['titre']);
            $edito->setContenu($_POST['contenu']);


            $id = $edito->getId();
            $code = $edito->getCode();
            $url = $edito->getUrl();
            $type = $edito->getType();
            $statut = $edito->getStatut();
            $titre = $edito->getTitre();
            $contenu = $edito->getContenu();

                $editos_results = array_merge(['code' => $code, 'url' => $url, 'type' => $type, 'statut' => $statut, 'titre' => $titre, 'contenu' => $contenu]);
                $article = json_encode($editos_results);

                // mettre dans le getErreur
                if($edito->getCode() ==='region-5'):
                    file_put_contents('../Web/json/regions/alpes_haute_provence.json', $article);
                endif;
                if($edito->getCode() ==='region-6'):
                    file_put_contents('../Web/json/regions/alpes_martimes.json', $article);
                endif;
                // fin

            endif;
            if(($_POST['id'] !=='0')&&($_POST['statut'] ==='voyage')):
                $edito->setId($_POST['id']);
                $edito->setCode($_POST['code']);
                $edito->setUrl($_POST['url']);
                $edito->setType($_POST['type']);
                $edito->setStatut($_POST['statut']);
                $edito->setTitre($_POST['titre']);
                $edito->setContenu($_POST['contenu']);
                $edito->setNiveau($_POST['prix']);
                $edito->setInclude($_POST['include']);
                $edito->setExclude($_POST['exclude']);
                $edito->setAccommodations($_POST['accommodations']);

                //$days = $_SESSION['days'];

                $id = $edito->getId();
                $code = $edito->getCode();
                $url = $edito->getUrl();
                $type = $edito->getType();
                $statut = $edito->getStatut();
                $titre = $edito->getTitre();
                $contenu = $edito->getContenu();
                $prix = $edito->getNiveau();
                $include = $edito->getInclude();
                $exclude = $edito->getExclude();
                $accommodations = $edito->getAccommodations();

                $editos_results = array_merge(['id' => $id, 'code' => $code, 'url' => $url, 'type' => $type, 'statut' => $statut, 'titre' => $titre, 'contenu' => $contenu, 'days' => $days, 'prix' => $prix, 'include' => $include, 'exclude' => $exclude, 'accommodations' => $accommodations]);
                $article = json_encode($editos_results);

                if($edito->getCode() ==='4572'):
                    file_put_contents('../Web/json/voyages/valtorens.json', $article);
                endif;
                if($edito->getCode() ==='4672'):
                    file_put_contents('../Web/json/voyages/valtorens_ski.json', $article);
                endif;
                if($edito->getCode() ==='3655'):
                    $json = file_get_contents("../Web/json/voyages/gastro_bordeaux.json");
                    $article = json_decode($json);
                    $days =[];
                    $days = $article->{'days'};

                    $editos_results = array_merge(['id' => $id, 'code' => $code, 'url' => $url, 'type' => $type, 'statut' => $statut, 'titre' => $titre, 'contenu' => $contenu, 'days' => $days, 'prix' => $prix, 'include' => $include, 'exclude' => $exclude, 'accommodations' => $accommodations]);
                    $article = json_encode($editos_results);

                    file_put_contents('../Web/json/voyages/gastro_bordeaux.json', $article);
                endif;
            endif;


            if ($edito->getErreur() == []) {
                //$edito->setData($article);
                //$ed->updateEdito($edito);
                header('Location: ' . \Lib\Application::$racine . 'edito');
                exit();
            }
        }
    }
    /*protected function modifyeditoAction()
    {
        $edito = new Edito();
        $ed = new EditoManager();
        $id = $_POST['id'];
        $edito_edit = $ed->getEditoById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $edito->setId($_POST['id']);
                    $edito->setTitre($_POST['titre']);
                    $edito->setContenu($_POST['contenu']);
                    $edito->setPublier(1);
                    if ($_FILES['fichier_image']['name'] !== '') {
                        $image = new \Modele\Image();
                        $image->setFile($_FILES['fichier_image']);
                        $image->setNom($_FILES['fichier_image']['name']);
                        $image->setMime($_FILES['fichier_image']['type']);
                        $image->setExt($_FILES['fichier_image']['name']);
                        $image->setFilename($image->encodeFilename());
                        $edito->setImage($image);
                    } else {
                        $edito->getImage()->setFilename($edito_edit->getImage()->getFilename());
                        $edito->getThumbnail()->setFilename($edito_edit->getThumbnail()->getFilename());
                    }
                    if (isset($_POST['publier'])) {
                        $edito->setPublier(1);
                    } else {
                        $edito->setPublier(0);
                    }
                    if ($edito->getImage()->getFilename() != $edito_edit->getImage()->getFilename()) {
                        if (!is_dir(\Modele\Image::IMAGES)) {
                            mkdir(\Modele\Image::IMAGES);
                        }
                        $upload = $edito->getImage()->uploadImage();

                        if ($upload === true)
                            if (!is_dir(Thumbnail::THUMB)) {
                                mkdir(Thumbnail::THUMB);
                            }
                        $thumbnail = $edito->getThumbnail()->thumbnail(Image::IMAGES . $edito->getImage()->getFilename());
                        if ($edito->getImage()->getErreur() != [] OR $edito->getThumbnail()->getErreur() != []) {
                            $erreur_img = $edito->getImage()->getErreur();
                            $erreur_thumb = $edito->getImage()->getErreur();
                            $erreurs = array_merge($erreur_img, $erreur_thumb);
                            $edito->setErreur($erreurs);
                        }
                    }

                    if ($edito->getErreur() == []) {
                        //$edito->setAuteur($_SESSION['auteur']);
                        //$edito->setDate(new \DateTime('now'));
                        if ($edito->getImage()->getFilename() != $edito_edit->getImage()->getFilename())
                            $edito->getThumbnail()->setNom($thumbnail);
                        //$ed->updateArticle($edito);
                        $ed->updateEdito($edito);
                        header('Location: ' . Application::$racine . 'edito');
                        exit();
                    }
            }
    }*/
    protected function addartAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $article = new Article();
            $am = new ArticleManager();
            $article->setLibelle($_POST['libelle']);
            $article->setDesignation($_POST['designation']);
            $article->setPrixHT($_POST['prixHT']);

            if ($article->getErreur() == []) {
                $am->addArticle($article);
                //header('Location: ' . \Lib\Application::$racine . 'connexion');
                header('Location: ' . \Lib\Application::$racine . 'article');
                exit();
            }
        }
    }
    protected function modifyartAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $article = new Article();
            $am = new ArticleManager();
            $article->setArticleId($_POST['article_id']);
            $article->setLibelle($_POST['libelle']);
            $article->setDesignation($_POST['designation']);
            $article->setPrixHT($_POST['prixHT']);

            if ($article->getErreur() == []) {
                $am->updateArticle($article);
                //header('Location: ' . \Lib\Application::$racine . 'connexion');
                header('Location: ' . \Lib\Application::$racine . 'article');
                exit();
            }
        }
    }
    protected function addtarifAction()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tarif = new Tarif();
    $tm = new TarifManager();
    if ($tarif->getErreur() == []) {
        $tarif->setArticleId($_POST['article_id']);
        $tarif->setEditoId($_POST['edito_id']);
        $tarif->setLibelle($_POST['libelle']);
        $tarif->setQte1($_POST['qte1']);
        $tarif->setQte2($_POST['qte2']);
        $tarif->setPrixht($_POST['prixHT']);

        $tm->inserttarif($tarif);
        header('Location: ' . \Lib\Application::$racine . 'article');
        exit();
    }
    }
}

    protected function modifytarifAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tarif = new Tarif();
            $tm = new TarifManager();
            $tarif->setArticleId($_POST['article_id']);
            $tarif->setEditoId($_POST['edito_id']);
            $tarif->setLibelle($_POST['libelle']);
            $tarif->setQte1($_POST['qte1']);
            $tarif->setQte2($_POST['qte2']);
            $tarif->setPrixht($_POST['prixHT']);
            if ($tarif->getErreur() == []) {
                $tm->updateTarif($tarif);
                header('Location: ' . \Lib\Application::$racine . 'article');
                exit();
            }
        }
    }
    protected function addcatAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categorie = new Categorie();
            $cm = new CategorieManager();
            $categorie->setLibelle($_POST['libelleCat']);
            $categorie->setType($_POST['typeCat']);
            //$categorie->setFamId($_POST['fam_id']);
            if ($categorie->getErreur() == []) {
                $cm->insertCategorie($categorie);
                if($_SERVER['REQUEST_URI']=='http://localhost/frenchsidetravel/Web/edito/add'){
                header('Location: ' . \Lib\Application::$racine . 'edito');
                exit();
                }
                else{
                    header('Location: ' . \Lib\Application::$racine . 'slugs');
                    exit();
                }
            }
        }
    }
    protected function modifycatAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categorie = new Categorie();
            $cm = new CategorieManager();
            $categorie->setId($_POST['valeurCat_id1']);
            $categorie->setLibelle($_POST['libelleCat']);
            $categorie->setType($_POST['typeCat']);
            $categorie->setStatut($_POST['statutCat']);
            $categorie->setEtiquette($_POST['parentCat']);
            $categorie->setNiveau($_POST['niveauCat']);
            if ($categorie->getErreur() == []) {
                $cm->updateCategorie($categorie);
                if($_SERVER['REQUEST_URI']=='http://localhost/frenchsidetravel/Web/edito/add'){
                    header('Location: ' . \Lib\Application::$racine . 'edito');
                    exit();
                }
                else{
                    header('Location: ' . \Lib\Application::$racine . 'slugs');
                    exit();
                }
            }
        }
    }
    protected function addfamilleAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $famille = new Famille();
            $fam = new FamilleManager();
            $famille->setLibelle($_POST['libelleFamille']);
            $famille->setType($_POST['typeFamille']);
            if ($famille->getErreur() == []) {
                $fam->insertFamille($famille);
                header('Location: ' . \Lib\Application::$racine . 'famille');
                exit();
            }
        }

    }
    protected function modifyfamilleAction()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $famille = new Famille();
        $fam = new FamilleManager();
        $famille->setFamId($_POST['id']);
        $famille->setLibelle($_POST['libelleFamille']);
        $famille->setType($_POST['typeFamille']);
        if ($famille->getErreur() == []) {
            $fam->updateFamille($famille);
            header('Location: ' . \Lib\Application::$racine . 'famille');
            exit();
        }
    }
}
}