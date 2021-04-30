<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 29/03/2018
 * Time: 09:54
 */

namespace Modele;


use Lib\Entite;

class Categorie extends Entite
{
    /**
     * @var string
     */
    protected $libelle, $descriptif, $type, $actif, $statut, $etiquette;
    /**
     * @var number
     */
    protected $fam_id, $niveau;


    /**
     * @var \DateTime
     */
    protected $dateCreation;

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
     * @return Famille
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * @param Famille $famille
     * @return Categorie
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;
        return $this;
    }

    /**
     * @return string
     */
    public function getEtiquette()
    {
        return $this->etiquette;
    }

    /**
     * @param string $etiquette
     * @return Categorie
     */
    public function setEtiquette($etiquette)
    {
        $this->etiquette = $etiquette;
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
     * @return Categorie
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
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
     * @return Categorie
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
     * @return Categorie
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
     * @return Categorie
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
     * @return Categorie
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
     * @return Categorie
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
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
     * @return Categorie
     */
    public function setFamId($fam_id)
    {
        $this->fam_id = $fam_id;
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
     * @return Categorie
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }


}