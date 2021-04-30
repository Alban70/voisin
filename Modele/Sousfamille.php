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

class Sousfamille extends \Lib\Entite
{
    use Date_Locale;
    //use Extrait;


    /**
     * @var string
     */
    protected $libelle, $actif, $date, $type, $statut, $descritif, $filtre;

    /**
     * @var number
     */
    protected $sFam_id, $valeur_id;


public function __construct(array $data = [])
{
    $this->date = new \DateTime();
    parent::__construct($data);
}

    /**
     * @return number
     */
    public function getSFamId()
    {
        return $this->sFam_id;
    }

    /**
     * @param number $sFam_id
     * @return Sousfamille
     */
    public function setSFamId($sFam_id)
    {
        $this->sFam_id = $sFam_id;
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
     * @return Sousfamille
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
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
     * @return Sousfamille
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Sousfamille
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * @return Sousfamille
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
     * @return Sousfamille
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return string
     */
    public function getFiltre()
    {
        return $this->filtre;
    }

    /**
     * @param string $filtre
     * @return Sousfamille
     */
    public function setFiltre($filtre)
    {
        $this->filtre = $filtre;
        return $this;
    }


    /**
     * @return string
     */
    public function getDescritif()
    {
        return $this->descritif;
    }

    /**
     * @param string $descritif
     * @return Sousfamille
     */
    public function setDescritif($descritif)
    {
        $this->descritif = $descritif;
        return $this;
    }

    /**
     * @return number
     */
    public function getValeurId()
    {
        return $this->valeur_id;
    }

    /**
     * @param number $valeur_id
     * @return Sousfamille
     */
    public function setValeurId($valeur_id)
    {
        $this->valeur_id = $valeur_id;
        return $this;
    }


}