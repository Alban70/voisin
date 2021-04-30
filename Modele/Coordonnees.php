<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 30/03/2018
 * Time: 19:28
 */

namespace Modele;

use Lib\Entite;
use Tools\Date_Locale;

class Coordonnees extends Entite
{
    use Date_Locale;

    /**
     * @var string
     */
protected $email, $tel;

    /**
     * @var \DateTime
     */
protected  $dateCreation;

    /**
     * @var number
     */
    protected $contact_id, $membre_id, $coord_id;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Membre
     */
    protected $membre;

    public function __construct(array $data = [])
    {
        $this->date = new \DateTime();
        $this->contact = new Contact();
        $this->membre = new Membre();
        parent::__construct($data);
    }

    /**
     * @return number
     */
    public function getCoordId()
    {
        return $this->coord_id;
    }

    /**
     * @param number $coord_id
     * @return Coordonnees
     */
    public function setCoordId($coord_id)
    {
        $this->coord_id = $coord_id;
        return $this;
    }



    /**
     * @return number
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * @param number $contact_id
     * @return Coordonnees
     */
    public function setContactId($contact_id)
    {
        $this->contact_id = $contact_id;
        return $this;
    }

    /**
     * @return number
     */
    public function getMembreId()
    {
        return $this->membre_id;
    }

    /**
     * @param number $membre_id
     * @return Coordonnees
     */
    public function setMembreId($membre_id)
    {
        $this->membre_id = $membre_id;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Coordonnees
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
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
     * @return Coordonnees
     */
    public function setMembre($membre)
    {
        $this->membre = $membre;
        return $this;
    }





    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Coordonnees
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     * @return Coordonnees
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
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
     * @return Coordonnees
     */
    public function setDateCreation(\DateTime $dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }




}