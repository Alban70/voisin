<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 03/04/2018
 * Time: 16:23
 */

namespace Modele;

use Lib\EntiteManager;
use \PDO;

class CoordonneesManager extends EntiteManager
{
    public function getCoordonneesById(Contact $contact)
    {
        $sql = 'SELECT * FROM coordonnees 
        WHERE soc_id = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $contact->getSocId());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Coordonnees::class);
        return $result->fetch();
    }
    public function updateMembre(Coordonnees $coordonnees_update){

        $sql = 'UPDATE societe SET emeil = ?, tel = ? WHERE coord_id = ?';
        $result = $this->prepare($sql);
        $result->execute([$coordonnees_update->getEmail(), $coordonnees_update->getTel(), $coordonnees_update->getCoordId()]);
    }
}