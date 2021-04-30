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

class TarifManager extends EntiteManager
{
    public function getAlltarifs()
    {
        $sql = 'SELECT * FROM tarif GROUP BY edito_id ';
        $result=$this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Tarif::class);
        return $result->fetchAll();
    }

    public function inserttarif(Tarif $tarif){

        $sql = 'INSERT INTO tarif(edito_id, article_id, libelle, descriptif, nomenclature, type, publier, statut, actif, dateCreation, qte1, qte2, prixht, tva, prixttc) VALUES( ?, ?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NOW(), ?, ?, ?, NULL, NULL)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $tarif->getEditoId());
        $result->bindValue(2, $tarif->getArticleId());
        $result->bindValue(3, $tarif->getLibelle());
        $result->bindValue(4, $tarif->getQte1());
        $result->bindValue(5, $tarif->getQte2());
        $result->bindValue(6, $tarif->getPrixht());
        $result->execute();
    }
    public function updateTarif(Tarif $tarif){

        $sql = 'UPDATE article SET libelle = ?, qte1 = ?, qte2 = ?, prixHT = ? WHERE article_id = ? AND edito_id=?';
        $result = $this->prepare($sql);
        $result->execute([$tarif->getLibelle(), $tarif->getQte1(), $tarif->getQte2(), $tarif->getPrixHT(), $tarif->getArticleId(), $tarif->getEditoId()]);
    }
    public function getTarifById($id, $id2)
    {
        $sql = 'SELECT  * FROM tarif
           WHERE article_id = ?, edito_id = ?';
        $result =  $this->prepare($sql);
        $result->bindValue(1, $id->getArticleId());
        $result->bindValue(2, $id2->getEditoId());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Tarif::class);
        $tarif = $result->fetch();
        return $tarif;
    }
}