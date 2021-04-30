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

class EditoslugManager extends EntiteManager
{
    public function getAlleditoSlug()
    {
        $sql = 'SELECT * FROM edito_slug GROUP BY edito_id ';
        $result=$this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Editoslug::class);
        return $result->fetchAll();
    }
    public function getAllEditoSlugsByEdito(Editoslug $all_editoslugs, Edito $edito)
{
    $id = $edito->getId();

    $sql = 'SELECT * FROM edito_slug WHERE edito_id = ? ';
    $result = $this->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Editoslug::class);
    $all_editoslugs = $result->fetchAll();
    return $all_editoslugs;
}

    public function insertEditoSlugs(Edito $edito, Slugs $slugs, Categorie $categorie1, Categorie $categorie2)
    {
        $id = $edito->getId();
        $id1 = $slugs->getId();
        $id2 = $categorie1->getId();
        $id3 = $categorie2->getId();
        $titre = $edito->getTitre();

        $sql = 'INSERT INTO edito_slug(edito_id, slug_id, cat_id1, cat_id2, editoLib, libelle1, libelle2, type1, type2, statut, dateCreation) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, "copie", NOW())';
        $result = $this->prepare($sql);
        $result->bindValue(1, $id);
        $result->bindValue(2, $id1);
        $result->bindValue(3, $id2);
        $result->bindValue(4, $id3);
        $result->bindValue(5, $titre);
        $result->bindValue(6, $categorie1->getLibelle());
        $result->bindValue(7, $categorie2->getLibelle());
        $result->bindValue(8, $categorie1->getType());
        $result->bindValue(9, $categorie2->getType());
        $result->execute();
    }
}