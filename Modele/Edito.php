<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 29/03/2018
 * Time: 09:54
 */

namespace Modele;


use Lib\Entite;

class Edito extends Entite
{
    /**
     * @var string
     */
    protected $titre, $contenu, $type, $statut, $actif, $famille, $publier, $pays, $region, $activite, $url, $data, $include, $exclude, $accommodations, $code, $day;
    /**
     * @var number
     */
    protected $contact_id, $user_id, $fam_id, $valeur_id, $niveau;

    protected $file=[];
    protected $days=[];

    /**
     * @var \DateTime
     */
    protected $dateCreation;

    /**
     * @var Edito
     */
    protected $edito;

    /**
     * @var \Modele\Image
     */
    private $image = null;

    /**
     * @var \Modele\Thumbnail
     */
    private $thumbnail = null;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->date = new \DateTime();
        $this->famille = new Famille();
        $this->contact = new Contact();
        $this->user = new auteur();
        $this->image = new Image();
        $this->thumbnail = new Thumbnail();
    }

    /**
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param string $day
     * @return Edito
     */
    public function setDay($day)
    {
        $this->day = $day;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Edito
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return array
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param array $days
     * @return Edito
     */
    public function setDays(Array $days)
    {
        $this->days = $days;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccommodations()
    {
        return $this->accommodations;
    }

    /**
     * @param string $accommodations
     * @return Edito
     */
    public function setAccommodations($accommodations)
    {
        $this->accommodations = $accommodations;
        return $this;
    }

    /**
     * @return string
     */
    public function getInclude()
    {
        return $this->include;
    }

    /**
     * @param string $include
     * @return Edito
     */
    public function setInclude($include)
    {
        $this->include = $include;
        return $this;
    }

    /**
     * @return string
     */
    public function getExclude()
    {
        return $this->exclude;
    }

    /**
     * @param string $exclude
     * @return Edito
     */
    public function setExclude($exclude)
    {
        $this->exclude = $exclude;
        return $this;
    }

    /**
     * @return array
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param array $file
     * @return Edito
     */
    public function setFile(Array $file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return Edito
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Edito
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }



    /**
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(Image $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Thumbnail
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }


    /**
     * @param Thumbnail $thumbnail
     * @return Edito
     */
    public function setThumbnail(Thumbnail $thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }



    /**
     * @return string
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * @param string $activite
     * @return Edito
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;
        return $this;
    }

    /**
     * @return Edito
     */
    public function getEdito()
    {
        return $this->edito;
    }

    /**
     * @param Edito $edito
     * @return Edito
     */
    public function setEdito($edito)
    {
        $this->edito = $edito;
        return $this;
    }



    /**
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     * @return Edito
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return Edito
     */
    public function setRegion($region)
    {
        $this->region = $region;
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
     * @return Edito
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return Edito
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     * @return Edito
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
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
     * @return Edito
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
     * @return Edito
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
     * @return Edito
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
        return $this;
    }

    /**
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * @param string $famille
     * @return Edito
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublier()
    {
        return $this->publier;
    }

    /**
     * @param string $publier
     * @return Edito
     */
    public function setPublier($publier)
    {
        $this->publier = $publier;
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
     * @return Edito
     */
    public function setContactId($contact_id)
    {
        $this->contact_id = $contact_id;
        return $this;
    }

    /**
     * @return number
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param number $user_id
     * @return Edito
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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
     * @return Edito
     */
    public function setFamId($fam_id)
    {
        $this->fam_id = $fam_id;
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
     * @return Edito
     */
    public function setValeurId($valeur_id)
    {
        $this->valeur_id = $valeur_id;
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
     * @return Edito
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

}