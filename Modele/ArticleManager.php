<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 08/04/2018
 * Time: 09:44
 */

namespace Modele;

use Lib\EntiteManager;
use \PDO;

class ArticleManager extends EntiteManager
{
    public function getAllArticleByFamId(Famille $famille)
    {
    $sql = 'SELECT * FROM article WHERE fam_id = ?';
    $result =  $this->prepare($sql);
    $result->execute([$contact->getSocId()]);
    $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
    return $result->fetchAll();

    }

    public function getAllArticle()
    {
        $sql = 'SELECT * FROM article GROUP BY article_id';
        $result=$this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetchAll();

    }
    public function addArticle(Article $article)
    {
        $sql = 'INSERT INTO article(libelle, designation, prixHT, tva, prixTTC, actif, dateCreation, fam_id, sFam_id, type, statut) VALUES(?,?,?,NULL ,NULL ,NULL ,?, NULL,null,?, ?)';

        $result = $this->prepare($sql);
        $result->execute([$article->getLibelle(), $article->getDesignation(), $article->getPrixHT(), $article->getDate()->format('Y-m-d H:i:s'), $article->getType(), $article->getStatut()]);
        //$article->setSlug($article->getTitre(),$this->getBdd()->lastInsertId());

    }
    public function updateArticle(Article $article){

        $sql = 'UPDATE article SET libelle = ?, designation = ?, prixHT = ? WHERE article_id = ?';
        $result = $this->prepare($sql);
        $result->execute([$article->getLibelle(), $article->getDesignation(), $article->getPrixHT(), $article->getArticleId()]);
    }
    public function getArticleById($id)
    {
        $sql = 'SELECT  * FROM article
           WHERE id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        $article = $result->fetch();
        return $article;
    }
    public function getArticleByTypeCM(Article $articleCm){
        $sql = 'SELECT * FROM article WHERE type = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleCm->getType());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
    public function getArticleByCM_id(Article $articleCm){
        $sql = 'SELECT * FROM article WHERE article_id = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleCm->getArticleId());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
    public function getArticleByTypeVente(Article $articleV){
        $sql = 'SELECT * FROM article WHERE type = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleV->getType());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
    public function getArticleByVente_id(Article $articleV){
        $sql = 'SELECT * FROM article WHERE article_id = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleV->getArticleId());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
    public function getArticleByTypeMarketing(Article $articleM){
        $sql = 'SELECT * FROM article WHERE type = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleM->getType());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
    public function getArticleByMarketing_id(Article $articleM){
        $sql = 'SELECT * FROM article WHERE article_id = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleM->getArticleId());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
    public function getArticleByTypeServiceClient(Article $articleSc){
        $sql = 'SELECT * FROM article WHERE type = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleSc->getType());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
    public function getArticleBySc_id(Article $articleSc){
        $sql = 'SELECT * FROM article WHERE article_id = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleSc->getArticleId());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
    public function getArticleByTypeGestion(Article $articleG){
        $sql = 'SELECT * FROM article WHERE type = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleG->getType());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
    public function getArticleByGestion_id(Article $articleG){
        $sql = 'SELECT * FROM article WHERE article_id = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $articleG->getArticleId());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Article::class);
        return $result->fetch();
    }
}