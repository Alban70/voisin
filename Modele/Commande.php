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

class commande extends Entite
{
    use Date_Locale;


    /**
     * @var string
     */
    protected $libelle, $type, $statut, $actif;

    /**
     * @var number
     */
    protected $totalHt, $soc_id, $com_id;

    /**
     * @var \DateTime
     */
    protected $dateCom;

    protected $membre;

    public function __construct(array $data = [])
    {
        $this->date = new \DateTime();
        $this->membre = new Membre();
        parent::__construct($data);
    }



    /**
     * @return number
     */
    public function getComId()
    {
        return $this->com_id;
    }

    /**
     * @param number $com_id
     * @return commande
     */
    public function setComId($com_id)
    {
        $this->com_id = $com_id;
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
     * @return commande
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
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
     * @return commande
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
     * @return commande
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
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
     * @return commande
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
        return $this;
    }



    /**
     * @return number
     */
    public function getTotalHt()
    {
        return $this->totalHt;
    }

    /**
     * @param number $totalHt
     * @return commande
     */
    public function setTotalHt($totalHt)
    {
        $this->totalHt = $totalHt;
        return $this;
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
     * @return commande
     */
    public function setSocId($soc_id)
    {
        $this->soc_id = $soc_id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCom()
    {
        return $this->dateCom;
    }

    /**
     * @param \DateTime $dateCom
     * @return commande
     */
    public function setDateCom(\DateTime $dateCom)
    {
        $this->dateCom = $dateCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * @param mixed $membre
     * @return commande
     */
    public function setMembre(Membre $membre)
    {
        $this->membre = $membre;
        return $this;
    }


}