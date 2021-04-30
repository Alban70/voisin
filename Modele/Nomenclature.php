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

class Nomenclature extends \Lib\Entite
{
    use Date_Locale;
    //use Extrait;


    /**
     * @var string
     */
    protected $libelle1, $libelle2, $type1, $type2, $navigation, $statut, $parent, $actif, $titre;

    /**
     * @var number
     */
    protected $edito_id, $edito_id2, $niveau;


    /**
     * @var \DateTime
     */
    protected $dateCreation;

    /**
     * @var Edito
     */
    protected $edito;



public function __construct(array $data = [])
{
    $this->date = new \DateTime();
    $this->edito = new edito();
    parent::__construct($data);
}

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return Nomenclature
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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
     * @return Nomenclature
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
     * @return Nomenclature
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
     * @return Nomenclature
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
     * @return Nomenclature
     */
    public function setType2($type2)
    {
        $this->type2 = $type2;
        return $this;
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
     * @return Nomenclature
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
     * @return Nomenclature
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
     * @return Nomenclature
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
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
     * @return Nomenclature
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
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
     * @return Nomenclature
     */
    public function setEditoId($edito_id)
    {
        $this->edito_id = $edito_id;
        return $this;
    }

    /**
     * @return number
     */
    public function getEditoId2()
    {
        return $this->edito_id2;
    }

    /**
     * @param number $edito_id2
     * @return Nomenclature
     */
    public function setEditoId2($edito_id2)
    {
        $this->edito_id2 = $edito_id2;
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
     * @return Nomenclature
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
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
     * @return Nomenclature
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
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
     * @return Nomenclature
     */
    public function setEdito($edito)
    {
        $this->edito = $edito;
        return $this;
    }


}