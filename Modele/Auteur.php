<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 07/02/2018
 * Time: 10:58
 */

namespace Modele;

//Use Exception;
use Tools\Date_Locale;
use Lib\Entite;


class Auteur extends Entite
{
    use Date_Locale;

    /**
     * @var string
     */
    protected $nom, $pass, $titre, $login, $type, $statut, $actif;


    /**
     * @var number
     */
    protected $contact_id;

    /**
     * @var \DateTime
     */
    protected $dateCreation;

    /**
     * @var Contact
     */
    protected $contact;

    public function __construct(array $data = [])
    {
        $this->date = new \DateTime();
        $this->contact = new Contact();
        parent::__construct($data);
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
     * @return Auteur
     */
    public function setContactId($contact_id)
    {
        $this->contact_id = $contact_id;
        return $this;
    }

    /**
     * @param mixed $id
     * @return $this|Entite
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     * @return Auteur
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     * @return Auteur
     */
    public function setLogin($login)
    {
        $this->login = $login;
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
     * @return Auteur
     */
    public function setNom($nom)
    {
        if (strlen($nom) < 3)
            $this->erreur[] .= "Login non-rempli ou trop court<br>";
        else
            $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @return mixed
     */
    public function getPassHash()
    {
        return password_hash($this->pass, PASSWORD_DEFAULT);
        
    }

    /**
     * @param mixed $pass
     * @return Auteur
     */
    public function setPass($pass)
    {
        if (strlen($pass) < 3)
            $this->erreur[] .= "Votre mot de passe doit avoir au moins 3 caractères<br>";
        else
            $this->pass = $pass;
            return $this;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     * @return Auteur
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }


    public function getRole()
    {
        if ($this->getTitre() == 'admin')
            return 'admin';
        elseif ($this->getTitre() == 'membre')
            return 'membre';
        else
            return 'erreur';
    }
    

    public function __sleep() {
        return ['id','nom', 'titre'];
    }

    public function cryptPass($pass){
        return $this->pass = password_hash($pass, PASSWORD_DEFAULT);
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
     * @return Auteur
     */
    public function setDateCreation(\DateTime $dateCreation)
    {
        $this->dateCreation = $dateCreation;
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
     * @return Auteur
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
     * @return Auteur
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
     * @return Auteur
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
        return $this;
    }



}