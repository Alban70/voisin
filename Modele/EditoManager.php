<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 28/03/2018
 * Time: 18:56
 */

namespace Modele;

use Lib\EntiteManager;
use \PDO;
use Modele\Editoslug;
use Modele\EditoslugManager;

class EditoManager extends EntiteManager
{

    public function getAllEdito()
    {
        $sql = 'SELECT * FROM edito GROUP BY id';

        $result = $this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
        return $result->fetchAll();
    }
    public function getEditoByCode($id)
    {
        $sql = 'SELECT  * FROM edito
            WHERE code = ?';
        $result =  $this->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
        $edito_edit = $result->fetch();
        return $edito_edit;
    }
    public function filtreMix(Edito $all_editos)
    {
        $titre = $all_editos->getTitre();
        $type = $all_editos->getType();
        $statut = $all_editos->getStatut();
        $sql = 'SELECT  * FROM edito
        WHERE titre LIKE :titre AND type LIKE :type AND statut LIKE :statut';
        $result =  $this->prepare($sql);
        $result->execute([':titre'=>$titre, ':type'=>$type, ':statut'=>$statut]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
        $all_editos = $result->fetchAll();
        return $all_editos;
    }


    public function filtreEdito(Edito $edito)
    {
        $titre = $edito->getTitre();
        $statut = $edito->getType();
        $sql = 'SELECT  * FROM edito
            WHERE titre LIKE :titre AND statut LIKE :statut';
        $result =  $this->prepare($sql);
        $result->execute([':titre'=>$titre, ':statut'=>$statut]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
        $all_editos = $result->fetchAll();
        return $all_editos;
    }
    public function getEditoById($id)
{
    $sql = 'SELECT  * FROM edito
            WHERE id = ?';
    $result =  $this->prepare($sql);
    $result->execute([$id]);
    $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
    $edito = $result->fetch();
    return $edito;
}

    public function getEditoByPaca()
    {
        $sql = 'SELECT  * FROM edito
            WHERE actif = "paca"';
        $result = $this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
        $editoPaca = $result->fetch();
        return $editoPaca;
    }
    public function getAllEditoById($all_editos1)
    {
        $id = $all_editos1->getId();
        $sql = 'SELECT  * FROM edito
            WHERE id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
        $all_editos1 = $result->fetch();
        return $all_editos1;
    }
    public function filtreHome($all_editos){

        $pays = $all_editos->getPays();
        $regions = $all_editos->getRegion();

        //$sql = 'SELECT FA.editoLib FROM edito_slug FA INNER JOIN edito_slug FB ON FA.edito_id = FB.edito_id WHERE FA.type2 = "?" AND FB.type2 = "?"';
        $sql = 'SELECT FA.editoLib FROM edito_slug FA INNER JOIN edito_slug FB ON FA.edito_id = FB.edito_id WHERE FA.type2 like "?" AND FB.type2 like "?"';
        $result = $this->prepare($sql);
        $result->bindValue(1, $pays);
        $result->bindValue(2, $regions);
        $result->execute();
        //$result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Editoslug::class);
        $all_editos_slugs = $result->fetchAll();
var_dump($all_editos_slugs);

        $edito_lib= $all_editos_slugs['editoLib'];

        $sql = 'SELECT * FROM edito WHERE titre like "?"';
        $result = $this->prepare($sql);
        $result->bindValue(1, $edito_lib);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
        $all_editos = $result->fetchAll();

        return $all_editos;
}
    public function insertEdito(Edito $edito){
        $sql = 'INSERT INTO edito(titre, contenu, image, dateCreation, publier, slug, contact_id, user_id, type, statut, actif, fam_id, niveau, data, thumbnail, url, code) VALUES(? , NULL, NULL, NOW(),? , NULL, NULL , NULL, ?, ?, NULL, Null, "0", ?, NULL, ?, ?)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $edito->getTitre());
        $result->bindValue(2, $edito->getPublier());
        $result->bindValue(3, $edito->getType());
        $result->bindValue(4, $edito->getStatut());
        //$result->bindValue(5, $edito->getFamId());
        $result->bindValue(5, $edito->getData());
        $result->bindValue(6, $edito->getUrl());
        $result->bindValue(7, $edito->getCode());
        //$result->bindValue(1, $edito->getImage()->getFilename());
        //$result->bindValue(5, $edito->getThumbnail()->getNom());
        $result->execute();
}
    public function updateEdito(Edito $edito){

    $sql = 'UPDATE edito SET titre = ?, contenu = ?, type = ?, statut = ?, data = ?, url = ?, code = ? WHERE id = ?';
    $result = $this->prepare($sql);
    $result->execute([$edito->getTitre(), $edito->getContenu(), $edito->getType(), $edito->getStatut(), $edito->getData(), $edito->getUrl(), $edito->getId()]);
}
    /*public function updateEdito(Edito $edito){

    $sql = 'UPDATE edito SET titre = ?, contenu = ?, image = ?, thumbnail = ? WHERE id = ?';
    $result = $this->prepare($sql);
    $result->execute([$edito->getTitre(), $edito->getContenu(),$edito->getImage()->getFilename(), $edito->getThumbnail()->getFilename(), $edito->getId()]);
}*/
    /*public function updateEdito(Edito $edito){
$sql = 'UPDATE edito SET data = ? WHERE id = ?';
$result = $this->prepare($sql);
$result->execute([$edito->getData(), $edito->getId()]);
}*/
    /*public function updateEdito(Edito $edito, $editos_results){
$sql = 'UPDATE edito SET data = ? WHERE id = ?';
        $result = $this->prepare($sql);
        //$result->bindValue(1, $edito->getTitre());
        $result->bindValue(1, $edito->getId());
        $result->bindValue(2, $editos_results);
        $result->execute();
}*/
    public function deleteEdito(Edito $edito){

        $sql = 'DELETE FROM edito WHERE id = ?';
        $result = $this->prepare($sql);
        $result->execute([$edito->getId()]);
    }

}