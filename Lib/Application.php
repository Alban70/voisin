<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 17/02/2018
 * Time: 14:52
 */
namespace Lib;
use Modele\Auteur;

abstract class Application
{
    protected $name, $layout;
    protected $auteur;


    STATIC public $racine = '/consultantseo/Web/';
    STATIC public $template = '/consultantseo/Vue/';
    STATIC public $images = '/consultantseo/Web/images/';

    const RACINE_PO = '/consultantseo/Web/';
    const TEMPLATE = '/consultantseo/Vue/';

    const TIME_STORE_TOKEN = 5 * 60; // 5min -> temps de saisie des formulaires
    const TIME_STORE_CACHE = 24 * 3600; // 24h -> temps avant check si cache a été modifié
    const TIME_STORE_COOKIE = 12 * 3600; // 12h -> temps avant que le cookies ne soit plus valable


    public function __construct(){
    $dir = str_replace('\\', '/', realpath(__DIR__ . '/../'));
        $dir = str_replace($_SERVER["DOCUMENT_ROOT"], '', $dir);
        $dir .= '/Web/';
        self::$racine = $dir;

    setlocale(LC_ALL, '');
    //session_start();


    if (isset($_SESSION['auteur']))
        $this->auteur = $_SESSION['auteur'];
    else
        $this->auteur = new \Modele\Auteur();
}


    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Application
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param mixed $layout
     * @return Application
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }


    public abstract function run();


    protected function getControleur($module)
    {
        $nomControleur = '\Controleur\\' . $this->name . '\\' . ucfirst($module) . 'Controleur';
        if (!class_exists($nomControleur))
            throw new HttpErrorException("Module non trouvé", 404);
        return new $nomControleur($this);
    }

    /**
     * @return Auteur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param Auteur $auteur
     * @return Application
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }


}