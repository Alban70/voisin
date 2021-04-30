<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 22/09/2018
 * Time: 21:09
 */

namespace Modele;

use Tools\Date_Locale;
use Lib\Entite;

class Action extends Entite
{
    use Date_Locale;

    protected $libelle, $designation, $type, $statut, $actif, $fait;

    protected $dateCreation, $dateRelance;

    protected $soc_id, $contact_id, $coord_id;


    public function __construct(array $data = [])
    {
        $this->date = new \DateTime();
        $this->membre = new Membre();
        $this->contact = new Contact();
        $this->coordonnees = new Coordonnees();
        parent::__construct($data);
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     * @return Action
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     * @return Action
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Action
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     * @return Action
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * @param mixed $actif
     * @return Action
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFait()
    {
        return $this->fait;
    }

    /**
     * @param mixed $fait
     * @return Action
     */
    public function setFait($fait)
    {
        $this->fait = $fait;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     * @return Action
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateRelance()
    {
        return $this->dateRelance;
    }

    /**
     * @param mixed $dateRelance
     * @return Action
     */
    public function setDateRelance($dateRelance)
    {
        $this->dateRelance = $dateRelance;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSocId()
    {
        return $this->soc_id;
    }

    /**
     * @param mixed $soc_id
     * @return Action
     */
    public function setSocId($soc_id)
    {
        $this->soc_id = $soc_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * @param mixed $contact_id
     * @return Action
     */
    public function setContactId($contact_id)
    {
        $this->contact_id = $contact_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCoordId()
    {
        return $this->coord_id;
    }

    /**
     * @param mixed $coord_id
     * @return Action
     */
    public function setCoordId($coord_id)
    {
        $this->coord_id = $coord_id;
        return $this;
    }


}