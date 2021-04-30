<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 08/04/2018
 * Time: 09:30
 */

namespace Modele;

use Tools\Date_Locale;
use Lib\Entite;

class Comligne extends Entite
{
    use Date_Locale;

    /**
     * @var string
     */
    protected $libelle;

    /**
     * @var number
     */
    protected $qte, $sTotalLigne, $com_id, $article_id;

    /**
     * @var \DateTime
     */
    protected $dateCreation;

    /**
     * @var Commande
     */
    protected $commande;

    /**
     * @var Article
     */
    protected $article;

    public function __construct(array $data = [])
    {
        $this->date = new \DateTime();
        $this->commande = new Commande();
        $this->article = new Article();
        parent::__construct($data);
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     * @return Comligne
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * @return number
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * @param number $qte
     * @return Comligne
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
        return $this;
    }

    /**
     * @return number
     */
    public function getSTotalLigne()
    {
        return $this->sTotalLigne;
    }

    /**
     * @param number $sTotalLigne
     * @return Comligne
     */
    public function setSTotalLigne($sTotalLigne)
    {
        $this->sTotalLigne = $sTotalLigne;
        return $this;
    }

    /**
     * @return number
     */
    public function getComId()
    {
        return $this->com_id;
    }

    /**
     * @param number $com_id
     * @return Comligne
     */
    public function setComId($com_id)
    {
        $this->com_id = $com_id;
        return $this;
    }

    /**
     * @return number
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * @param number $article_id
     * @return Comligne
     */
    public function setArticleId($article_id)
    {
        $this->article_id = $article_id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param \DateTime $dateCreation
     * @return Comligne
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    /**
     * @return Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param Commande $commande
     * @return Comligne
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
        return $this;
    }

    /**
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param Article $article
     * @return Comligne
     */
    public function setArticle($article)
    {
        $this->article = $article;
        return $this;
    }




}