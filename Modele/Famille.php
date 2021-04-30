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

class Famille extends \Lib\Entite
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
    protected $fam_id, $valeur_id;


public function __construct(array $data = [])
{
    $this->date = new \DateTime();
    parent::__construct($data);
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
     * @return Famille
     */
    public function setFamId($fam_id)
    {
        $this->fam_id = $fam_id;
        return $this;
    }

/**
 * @return mixed
 */
public function getLibelle()
{
    return $this->libelle;
}/**
 * @param mixed $libelle
 * @return Famille
 */
public function setLibelle($libelle)
{
    if (strlen($libelle) <= 2)
        $this->erreur[] = 'Titre non rempli';
    else
        $this->libelle = $libelle;
    return $this;
}/**
 * @return mixed
 */
public function getActif()
{
    return $this->actif;
}/**
 * @param mixed $actif
 * @return Famille
 */
public function setActif($actif)
{
    $this->actif = $actif;
    return $this;
}


public function getDate()
{
    return $this->date;
}/**
 * @param \DateTime $date
 * @return Famille
 */
public function setDate(\DateTime $date)
{
    $this->date = $date;
    return $this;
}/**
 * @return mixed
 */
public function getType()
{
    return $this->type;
}/**
 * @param mixed $type
 * @return Famille
 */
public function setType($type)
{
    $this->type = $type;
    return $this;
}/**
 * @return mixed
 */
public function getStatut()
{
    return $this->statut;
}/**
 * @param mixed $statut
 * @return Famille
 */
public function setStatut($statut)
{
    $this->statut = $statut;
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
     * @return Famille
     */
    public function setDescritif($descritif)
    {
        $this->descritif = $descritif;
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
     * @return Famille
     */
    public function setFiltre($filtre)
    {
        $this->filtre = $filtre;
        return $this;
    }

}