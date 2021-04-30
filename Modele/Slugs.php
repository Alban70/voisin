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

class Slugs extends \Lib\Entite
{
    use Date_Locale;
    //use Extrait;


    /**
     * @var string
     */
    protected $libelle1, $libelle2, $type1, $type2, $navigation, $statut, $parent;

    /**
     * @var number
     */
    protected $cat_id, $cat_id2, $niveau;


    /**
     * @var \DateTime
     */
    protected $dateCreation;

    /**
     * @var Categorie
     */
    protected $categorie;



public function __construct(array $data = [])
{
    $this->date = new \DateTime();
    $this->categorie = new Categorie();
    parent::__construct($data);
}

    /**
     * @return string
     */
    public function getNavigation()
    {
        return $this->navigation;
    }

    /**
     * @param string $navigation
     * @return Slugs
     */
    public function setNavigation($navigation)
    {
        $this->navigation = $navigation;
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
     * @return Slugs
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param string $parent
     * @return Slugs
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return number
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param number $niveau
     * @return Slugs
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
        return $this;
    }

    /**
     * @return Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param Categorie $categorie
     * @return Slugs
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }


    /**
     * @return string
     */
    public function getLibelle1()
    {
        return $this->libelle1;
    }

    /**
     * @param string $libelle1
     * @return Slugs
     */
    public function setLibelle1($libelle1)
    {
        $this->libelle1 = $libelle1;
        return $this;
    }

    /**
     * @return string
     */
    public function getLibelle2()
    {
        return $this->libelle2;
    }

    /**
     * @param string $libelle2
     * @return Slugs
     */
    public function setLibelle2($libelle2)
    {
        $this->libelle2 = $libelle2;
        return $this;
    }

    /**
     * @return string
     */
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * @param string $type1
     * @return Slugs
     */
    public function setType1($type1)
    {
        $this->type1 = $type1;
        return $this;
    }

    /**
     * @return string
     */
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * @param string $type2
     * @return Slugs
     */
    public function setType2($type2)
    {
        $this->type2 = $type2;
        return $this;
    }



    /**
     * @return number
     */
    public function getCatId()
    {
        return $this->cat_id;
    }

    /**
     * @param number $cat_id
     * @return Slugs
     */
    public function setCatId($cat_id)
    {
        $this->cat_id = $cat_id;
        return $this;
    }

    /**
     * @return number
     */
    public function getCatId2()
    {
        return $this->cat_id2;
    }

    /**
     * @param number $cat_id2
     * @return Slugs
     */
    public function setCatId2($cat_id2)
    {
        $this->cat_id2 = $cat_id2;
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
     * @return Slugs
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }



}