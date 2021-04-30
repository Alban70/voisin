<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 27/02/2018
 * Time: 15:23
 */

namespace Modele;

use Tools\Date_Locale;
//use Tools\Extrait;

class Tarif extends \Lib\Entite
{
    use Date_Locale;
    //use Extrait;


    /**
     * @var string
     */
    protected $libelle, $descriptif, $type, $actif, $statut;


    /**
     * @var Edito
     */
    protected $edito;

    /**
     * @var Article
     */
    protected $article;

    /**
     * @var number
     */
    protected $edito_id, $article_id, $nomenclature, $publier, $qte1, $qte2, $prixht, $tva, $prixttc;


    /**
     * @var \DateTime
     */
    protected $dateCreation;


public function __construct(array $data = [])
{
    $this->date = new \DateTime();
    $this->edito = new Edito();
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
     * @return Tarif
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * @param string $descriptif
     * @return Tarif
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Tarif
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * @param string $actif
     * @return Tarif
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param string $statut
     * @return Tarif
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return Edito
     */
    public function getEdito()
    {
        return $this->edito;
    }

    /**
     * @param Edito $edito
     * @return Tarif
     */
    public function setEdito($edito)
    {
        $this->edito = $edito;
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
     * @return Tarif
     */
    public function setArticle($article)
    {
        $this->article = $article;
        return $this;
    }

    /**
     * @return number
     */
    public function getEditoId()
    {
        return $this->edito_id;
    }

    /**
     * @param number $edito_id
     * @return Tarif
     */
    public function setEditoId($edito_id)
    {
        $this->edito_id = $edito_id;
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
     * @return Tarif
     */
    public function setArticleId($article_id)
    {
        $this->article_id = $article_id;
        return $this;
    }

    /**
     * @return number
     */
    public function getNomenclature()
    {
        return $this->nomenclature;
    }

    /**
     * @param number $nomenclature
     * @return Tarif
     */
    public function setNomenclature($nomenclature)
    {
        $this->nomenclature = $nomenclature;
        return $this;
    }

    /**
     * @return number
     */
    public function getPublier()
    {
        return $this->publier;
    }

    /**
     * @param number $publier
     * @return Tarif
     */
    public function setPublier($publier)
    {
        $this->publier = $publier;
        return $this;
    }

    /**
     * @return number
     */
    public function getQte1()
    {
        return $this->qte1;
    }

    /**
     * @param number $qte1
     * @return Tarif
     */
    public function setQte1($qte1)
    {
        $this->qte1 = $qte1;
        return $this;
    }

    /**
     * @return number
     */
    public function getQte2()
    {
        return $this->qte2;
    }

    /**
     * @param number $qte2
     * @return Tarif
     */
    public function setQte2($qte2)
    {
        $this->qte2 = $qte2;
        return $this;
    }

    /**
     * @return number
     */
    public function getPrixht()
    {
        return $this->prixht;
    }

    /**
     * @param number $prixht
     * @return Tarif
     */
    public function setPrixht($prixht)
    {
        $this->prixht = $prixht;
        return $this;
    }

    /**
     * @return number
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * @param number $tva
     * @return Tarif
     */
    public function setTva($tva)
    {
        $this->tva = $tva;
        return $this;
    }

    /**
     * @return number
     */
    public function getPrixttc()
    {
        return $this->prixttc;
    }

    /**
     * @param number $prixttc
     * @return Tarif
     */
    public function setPrixttc($prixttc)
    {
        $this->prixttc = $prixttc;
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
     * @return Tarif
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

}