<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 30/03/2018
 * Time: 20:15
 */

namespace Modele;

use Lib\Entite;
use Tools\Date_Locale;

class Membre extends Entite
{
    use Date_Locale;

    /**
     * @var string
     */
    protected $nom, $adresse1, $cp, $ville, $pays, $actif, $type;

    /**
     * @var \DateTime
     */
    protected $DateCreation;

    /**
     * @var number
     */
    protected $soc_id;


    public function __construct(array $data = [])
    {
        $this->date = new \DateTime();
        parent::__construct($data);
    }

    /**
     * @return number
     */
    public function getSocId()
    {
        return $this->soc_id;
    }

    /**
     * @param number $soc_id
     * @return Membre
     */
    public function setSocId($soc_id)
    {
        $this->soc_id = $soc_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return membre
     */
    public function setNom($nom)
    {
        if (strlen($nom) <= 3)
            $this->erreur[] = 'Nom non rempli';
        else
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse1()
    {
        return $this->adresse1;
    }

    /**
     * @param mixed $adresse1
     * @return membre
     */
    public function setAdresse1($adresse1)
    {
        $this->adresse1 = $adresse1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     * @return membre
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     * @return membre
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     * @return membre
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
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
     * @return membre
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
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
     * @return membre
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->DateCreation;
    }

    /**
     * @param mixed $DateCreation
     * @return membre
     */
    public function setDateCreation(\DateTime $DateCreation)
    {
        $this->DateCreation = $DateCreation;
        return $this;
    }


}