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

class FamillesfamManager extends EntiteManager
{
    public function getAllFamilles_sousFamille()
    {

        $sql = 'SELECT * FROM famille_sousfamille GROUP BY fam_id ';
        $result=$this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Famillesfam::class);
        return $result->fetchAll();

    }

    public function getFiltreFamilleById($id){

        $sql = 'SELECT  * FROM famille_sousfamille
            WHERE fam_id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Famillesfam::class);
        $famille = $result->fetch();
        return $famille_sousfamille;
    }
    public function getFiltreSousFamilleById($id){

        $sql = 'SELECT  * FROM famille_sousfamille
            WHERE sfam_id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Famillesfam::class);
        $famille = $result->fetch();
        return $sousfamille_famille;
    }


    public function insertFamille_sousFamille(Famillesfam $famille_sousfamille, Famille $famille, Sousfamille $sousfamille){

        $sql = 'INSERT INTO famille_sousfamille(famille, sousfamille, libelle, dateCreation, actif, type, statut, fam_id, sfam_id) VALUES(NULL, NULL, NULL, NOW(), NULL, ?, NULL, ?, ?)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $famille_sousfamille->getType());
        $result->bindValue(2, $famille->getFamId());
        $result->bindValue(3, $sousfamille->getSFamId());
        $result->execute();
        //$soc_id = $this->getBdd()->lastInsertId();
    }

    public function updateFamille_sousFamille(Famillesousfamille $famille_sousfamille){
   $sql = 'UPDATE famille_sousfamille SET famille = ?, sousfamille = ?, libelle = ?, actif = ?, type = ?, statut = ? WHERE fam_id = ? AND sfam_id = ?';
   $result = $this->prepare($sql);
   $result->execute([$famille_sousfamille->getFamille(), $famille_sousfamille->getSousfamille(), $famille_sousfamille->getLibelle(), $famille_sousfamille->getActif(), $famille_sousfamille->getType(), $famille_sousfamille->getStatut(), $famille_sousfamille->getFamId(), $famille_sousfamille->getSFamId()]);
}
    public function filtreFamille_sousFamille(Famillesousfamille $famille_sousfamille)
    {
        $familleLib = $famille_sousfamille->getFamille();
        $sfamilleLib = $famille_sousfamille->getSousfamille();
        $sql = 'SELECT  * FROM famille_sousfamille
            WHERE famille LIKE :familleLib AND sousfamille LIKE :sfamilleLib';
        $result =  $this->prepare($sql);
        $result->execute([':familleLib'=>$familleLib, ':sfamilleLib'=>$familleLib]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Famillesfam::class);
        $sousfamille_famille = $result->fetchAll();
        return $sousfamille_famille;
    }
    public function deleteFamille_sousFamille(Famillesousfamille $famille_sousfamille){

        $sql = 'DELETE FROM famille_sousfamille WHERE fam_id = ? AND sfam_id = ?';
        $result = $this->prepare($sql);
        $result->execute([$famille_sousfamille->getFamId(), $famille_sousfamille->getSousfamille()]);
    }
}