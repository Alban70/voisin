<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 06/02/2018
 * Time: 13:42
 */

namespace Controleur\Backend;


use Modele\Auteur;
use Modele\AuteurManager;
use Modele\ContactManager;
use Modele\Contact;
use Modele\Membre;
use Modele\MembreManager;
use Modele\Commande;
use Modele\CommandeManager;
use Modele\Article;
use Modele\ArticleManager;
use Modele\Comligne;
use Modele\ComligneManager;


class CommandeControleur extends \Lib\Controleur
{


    public function indexAction()
    {

    }
    public function articleAction()
    {

        $auteur = $_SESSION['auteur'];

        $am = new AuteurManager();
        $auteur = $am->getAuteurById($auteur->getId());

        $cm = new ContactManager();
        $contact = $cm->getContactById($auteur);

        $mm = new MembreManager();
        $membre = $mm->getMembreById($contact);

        $commande = new Commande();
        $cmm = new CommandeManager();

        $commande->setDateCom(new \DateTime('now'));
        $commande->setLibelle('Commande');


        $cmm->addCommande($commande, $contact);

        $commande2 = new Commande();
        $cmm = new CommandeManager();
        $commande2->$cmm->getCommandeByLastId(lastInsertId($commande));
        var_dump($commande2);

        //$commande2 = new Commande($this->getBdd()->lastInsertId());
        //var_dump($commande2);

        $artm = new ArticleManager();
        $articles = $artm->getAllArticle();

        $data = ['articles' => $articles, 'commande' => $commande2];
        $this->render('article/selectorArticleMobile.html.php', $data);
    }
    public function addAction(){
        $Article = new Article($_POST);
        $artm = new ArticleManager();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $articles = $artm->getArticleById($article);

        $commandeLigne = new Comligne;
        $clm = new ComligneManager();


            $Article->setLibelle($_POST['libelle']);

            $cm = new CommandeManager();




            header('Location: ' . \Lib\Application::$racine . 'theme_adminPo/web/famille');
            exit();
        }
        $data = ['articles' => $articles];
        $this->render('commandeLigne/commandeLigne.html.php', $data);
    }
}