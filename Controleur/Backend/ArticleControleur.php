<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 09/04/2018
 * Time: 09:24
 */

namespace Controleur\Backend;

use Modele\ArticleManager;
use Modele\Article;
use Modele\Edito;
use Modele\EditoManager;
use Modele\Tarif;
use Modele\TarifManager;


class ArticleControleur extends \Lib\Controleur
{
    protected function indexAction()
    {
        $article = new Article();


        $am = new ArticleManager();
        $all_articles = $am->getAllArticle();

        $em = new EditoManager();
        $all_editos = $em->getAllEdito();

        $ecm = new TarifManager();
        $all_tarifs = $ecm->getAlltarifs();


        $data = ['all_articles' => $all_articles, 'all_editos' => $all_editos, 'all_tarifs' => $all_tarifs];
        $this->render('article/myArticleHome.php', $data);
    }


protected function addAction()
{
    $this->render('article/createArticle.html.php');

}
    protected function modifyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['article_id'];
            $am = new ArticleManager();
            $article_edit = $am->getArticleById($id);
            //$ed->updateEdito($edito);
            //header('Location: ' . \Lib\Application::$racine . 'edito/index');
            //exit();*/
        }
        $data = ["article_edit" => $article_edit];
        $this->render('article/modifierArticle.html.php', $data);
    }
}