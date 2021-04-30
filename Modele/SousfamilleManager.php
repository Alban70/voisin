<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 27/02/2018
 * Time: 13:18
 */

namespace Modele;
use Lib\EntiteManager;
use \PDO;

class SousfamilleManager extends EntiteManager
{
    public function getAllsousFamilles()
    {

        $sql = 'SELECT * FROM sousfamille GROUP BY sFam_id ';
        $result=$this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Sousfamille::class);
        return $result->fetchAll();

    }

    public function getSousFamilleById($id){

        $sql = 'SELECT  * FROM sousfamille
            WHERE sFam_id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Sousfamille::class);
        $sousfamille = $result->fetch();
        return $sousfamille;
    }

    public function insertSousFamille(Sousfamille $sousfamille){

        $sql = 'INSERT INTO sousfamille(libelle, actif, dateCreation, type, statut, descriptif, filtre) VALUES(?, NULL, NOW(),?, NULL, NULL, NULL)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $sousfamille->getLibelle());
        $result->bindValue(2, $sousfamille->getType());
        $result->execute();
        //$soc_id = $this->getBdd()->lastInsertId();
    }


    public function updateSousFamille(Sousfamille $sousfamille){
   $sql = 'UPDATE sousfamille SET libelle = ?, actif = ?, type = ?, statut = ? WHERE sFam_id = ?';
   $result = $this->prepare($sql);
   $result->execute([$sousfamille->getLibelle(), $sousfamille->getActif(), $sousfamille->getType(), $sousfamille->getStatut(), $sousfamille->getSFamId()]);
}
    public function filtreSousFamille(Sousfamille $sousfamille)
    {
        $libelle = $sousfamille->getLibelle();
        $type = $sousfamille->getType();
        $sql = 'SELECT  * FROM sousfamille
            WHERE libelle LIKE :libelle AND type LIKE :type';
        $result =  $this->prepare($sql);
        $result->execute([':libelle'=>$libelle, ':type'=>$type]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Sousfamille::class);
        $all_sousfamilles = $result->fetchAll();
        return $all_sousfamilles;
    }
    public function deleteSousFamille(Sousfamille $sousfamille){

        $sql = 'DELETE FROM sousfamille WHERE sFam_id = ?';
        $result = $this->prepare($sql);
        $result->execute([$sousfamille->getSFamId()]);
    }
}