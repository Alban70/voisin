<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 08/04/2018
 * Time: 09:11
 */

namespace Modele;

use Tools\Date_Locale;
use Lib\Entite;

class Article extends Entite
{
    use Date_Locale;

    /**
     * @var string
     */
    protected $libelle, $designation, $type, $statut;

    /**
     * @var number
     */
    protected $prixHT, $fam_id, $article_id;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var Famille
     */
    protected $famille;

    public function __construct(array $data = [])
    {
        $this->date = new \DateTime();
        $this->famille = new Famille();
        parent::__construct($data);
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
     * @return Article
     */
    public function setArticleId($article_id)
    {
        $this->article_id = $article_id;
        return $this;
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
     * @return Article
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     * @return Article
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
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
     * @return Article
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return Article
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return number
     */
    public function getPrixHT()
    {
        return $this->prixHT;
    }

    /**
     * @param number $prixHT
     * @return Article
     */
    public function setPrixHT($prixHT)
    {
        $this->prixHT = $prixHT;
        return $this;
    }

    /**
     * @return number
     */
    public function getFamId()
    {
        return $this->fam_id;
    }

    /**
     * @param number $fam_id
     * @return Article
     */
    public function setFamId($fam_id)
    {
        $this->fam_id = $fam_id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Article
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }




    /**
     * @return Famille
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * @param Famille $famille
     * @return Article
     */
    public function setFamille(Famille $famille)
    {
        $this->famille = $famille;
        return $this;
    }


}