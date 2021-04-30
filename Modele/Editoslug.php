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

class Editoslug extends \Lib\Entite
{
    use Date_Locale;
    //use Extrait;


    /**
     * @var string
     */
    protected $libelle1, $libelle2, $type1, $type2, $statut, $editolib;


    /**
     * @var Edito
     */
    protected $edito;

    /**
     * @var Slugs
     */
    protected $slugs;

    /**
     * @var number
     */
    protected $edito_id, $slug_id, $cat_id1, $cat_id2;


    /**
     * @var \DateTime
     */
    protected $dateCreation;


public function __construct(array $data = [])
{
    parent::__construct($data);
    $this->date = new \DateTime();
    $this->edito = new Edito();
    $this->Slugs = new Slugs();
}

    /**
     * @return string
     */
    public function getEditolib()
    {
        return $this->editolib;
    }

    /**
     * @param string $editolib
     * @return Editoslug
     */
    public function setEditolib($editolib)
    {
        $this->editolib = $editolib;
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
     * @return Editoslug
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
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
     * @return Editoslug
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
     * @return Editoslug
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
     * @return Editoslug
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
     * @return Editoslug
     */
    public function setType2($type2)
    {
        $this->type2 = $type2;
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
     * @return Editoslug
     */
    public function setEdito($edito)
    {
        $this->edito = $edito;
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
     * @return Editoslug
     */
    public function setEditoId($edito_id)
    {
        $this->edito_id = $edito_id;
        return $this;
    }

    /**
     * @return number
     */
    public function getSlugId()
    {
        return $this->slug_id;
    }

    /**
     * @param number $slug_id
     * @return Editoslug
     */
    public function setSlugId($slug_id)
    {
        $this->slug_id = $slug_id;
        return $this;
    }

    /**
     * @return number
     */
    public function getCatId1()
    {
        return $this->cat_id1;
    }

    /**
     * @param number $cat_id1
     * @return Editoslug
     */
    public function setCatId1($cat_id1)
    {
        $this->cat_id1 = $cat_id1;
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
     * @return Editoslug
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
     * @return Editoslug
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }



}