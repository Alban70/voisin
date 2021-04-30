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

class Famillesfam extends \Lib\Entite
{
    use Date_Locale;
    //use Extrait;


    /**
     * @var string
     */
    protected $actif, $type, $statut, $libelle,$familleLib, $sfamilleLib;

    /**
     * @var Famille
     */
    protected $famille;

    /**
     * @var Sousfamille
     */
    protected $sousfamille;

    /**
     * @var number
     */
    protected $fam_id;
    /**
     * @var number
     */
    protected  $sfam_id;

    /**
     * @var \DateTime
     */
    protected $dateCreation;


public function __construct(array $data = [])
{
    $this->date = new \DateTime();
    $this->famille = new Famille();
    $this->sousfamille = new Sousfamille();
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
     * @return Famillesfam
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;
        return $this;
    }

    /**
     * @return Sousfamille
     */
    public function getSousfamille()
    {
        return $this->sousfamille;
    }

    /**
     * @param Sousfamille $sousfamille
     * @return Famillesfam
     */
    public function setSousfamille($sousfamille)
    {
        $this->sousfamille = $sousfamille;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCtreation()
    {
        return $this->dateCtreation;
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
     * @return Famillesfam
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
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
     * @return Famillesfam
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
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
     * @return Famillesfam
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
     * @return Famillesfam
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
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
     * @return Famillesfam
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * @return string
     */
    public function getFamilleLib()
    {
        return $this->familleLib;
    }

    /**
     * @param string $familleLib
     * @return Famillesfam
     */
    public function setFamilleLib($familleLib)
    {
        $this->familleLib = $familleLib;
        return $this;
    }

    /**
     * @return string
     */
    public function getSfamilleLib()
    {
        return $this->sfamilleLib;
    }

    /**
     * @param string $sfamilleLib
     * @return Famillesfam
     */
    public function setSfamilleLib($sfamilleLib)
    {
        $this->sfamilleLib = $sfamilleLib;
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
     * @return Famillesfam
     */
    public function setFamId($fam_id)
    {
        $this->fam_id = $fam_id;
        return $this;
    }

    /**
     * @return number
     */
    public function getSfamId()
    {
        return $this->sfam_id;
    }

    /**
     * @param number $sfam_id
     * @return Famillesfam
     */
    public function setSfamId($sfam_id)
    {
        $this->sfam_id = $sfam_id;
        return $this;
    }






}