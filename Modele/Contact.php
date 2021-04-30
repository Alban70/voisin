<?php
namespace Modele;

use Lib\Entite;
use Tools\Date_Locale;

class Contact extends Entite
{
    use Date_Locale;

    /**
     * @var string
     */
    protected $nom, $prenom, $genre;

    /**
     * @var \DateTime
     */
    protected $dateCtreation;

    /**
     * @var number
     */
    protected $soc_id;

    /**
     * @var Membre
     */
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
    public function getSocId()
    {
        return $this->soc_id;
    }

    /**
     * @param number $soc_id
     * @return Contact
     */
    public function setSocId($soc_id)
    {
        $this->soc_id = $soc_id;
        return $this;
    }






    /**
     * @return Membre
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * @param Membre $membre
     * @return Contact
     */
    public function setMembre(Membre $membre)
    {
        $this->membre = $membre;
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
     * @return Contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return Contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     * @return Contact
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCtreation()
    {
        return $this->dateCtreation;
    }

    /**
     * @param mixed $dateCtreation
     * @return Contact
     */
    public function setDateCtreation(\DateTime $dateCtreation)
    {
        $this->dateCtreation = $dateCtreation;
        return $this;
    }


}
