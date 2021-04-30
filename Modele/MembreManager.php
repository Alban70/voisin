<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 28/03/2018
 * Time: 18:56
 */

namespace Modele;

use Controleur\Frontend\SocieteControleur;
use Lib\EntiteManager;
use \PDO;

class MembreManager extends EntiteManager
{
    public function getAllMembres()
    {
        $sql = 'SELECT * FROM societe GROUP BY soc_id';
        $result=$this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Membre::class);
        return $result->fetchAll();
    }
    public function getMembreById(Contact $contact)
    {
        $sql = 'SELECT * FROM societe
            WHERE soc_id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$contact->getSocId()]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Membre::class);
        return $result->fetch();
    }
    public function updateMembre(Membre $membre_update){

        $sql = 'UPDATE societe SET nom = ?, adresse1 = ?, cp = ?, ville = ? WHERE soc_id = ?';
        $result = $this->prepare($sql);
        $result->execute([$membre_update->getNom(), $membre_update->getAdesse1(), $membre_update->getCp(), $membre_update->getVille(), $membre_update->getSocId()]);
    }
    public function getMembreByNom(Membre $membre){
        $sql = 'SELECT * FROM societe WHERE nom = ?';
        $result = $this->prepare($sql);
        $result->execute([$membre->getNom()]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Membre::class);
        return $result->fetch();
    }

}