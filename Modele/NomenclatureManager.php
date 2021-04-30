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

class NomenclatureManager extends EntiteManager
{
    public function getAllNomenclature()
    {
        $sql = 'SELECT * FROM edito_lien GROUP BY id ';
        $result = $this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Nomenclature::class);
        return $result->fetchAll();
    }
    public function filtreMix(Nomenclature $all_nomemclatures)
    {
        $type = $all_nomemclatures->getType1();

        $sql = 'SELECT  * FROM edito_lien
        WHERE type1 LIKE :type';
        $result = $this->prepare($sql);
        $result->execute([':type' => $type]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Nomenclature::class);
        $all_nomemclatures = $result->fetchAll();
        return $all_nomemclatures;
    }

    public function nav10()
    {
        $sql = 'SELECT  * FROM slug';
        $result = $this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Slugs::class);
        $all_slug = $result->fetchAll();
        //var_dump('hello');
//var_dump($all_slug);
        $pays = [];
        $pays1 = [];
        //$pays1 = '';
        $pays_france = [];
        //$regions = [];
        $niveau = [];
        //$pays = '';
        $pays_usa = [];
        //$regions_france = ['$pays1[]', '$regions1[]'];
        $regions_usa = [];
        $regions_france = [];
        $results = [];
        $navigation =[];
        $parent =[];

        $index = 1;
        $i = 0;
        $result = count($all_slug);
        while ($index <= $result):
            $niveau = $all_slug[$i]->getNiveau();
            $navigation = $all_slug[$i]->getNavigation();
            $parent = $all_slug[$i]->getParent();
//var_dump($niveau);
            switch ($all_slug) {
                case (($navigation === 'pays')&&($niveau === '1')):
                    $pays[$i] = $all_slug[$i]->getParent();
                    continue;
                case (($navigation === 'regions')&&($parent === 'france')&&($niveau === '2')):
                    //$pays1[$i] = $all_slug[$i]->getParent();
                    $pays_france = $all_slug[$i]->getParent();
                    //$pays_france = $pays1;
                    $regions_france[$i] = $all_slug[$i]->getType2();
                    continue;
                case (($navigation === 'regions')&&($parent === 'usa')&&($niveau === '2')):
                    $pays_usa = $all_slug[$i]->getParent();
                    $regions_usa[$i] = $all_slug[$i]->getType2();
                    continue;
            }
            $index++;
            $i++;
        endwhile;
        //$regions_france = array_merge(['pays1' => $pays1], ['regions1' => $regions1]);
        //$filtres_france = array_merge(['pays' => $pays_france], ['regions' => $regions_france]);
        //$filtres = array_merge(['pays' => $pays_usa], ['regions' => $regions_usa], ['pays' => $pays_france], ['regions' => $regions_france]);
        $results = array_merge(['pays' => $pays_usa], ['regions' => $regions_usa], ['pays' => $pays_france], ['regions' => $regions_france]);
        //$results = array_merge($filtres_france, $filtres_usa);

        //var_dump($pays);
        //var_dump($regions_france);
        //var_dump($regions_usa);

        //return ['regions_france' => $regions_france, 'regions_usa' => $regions_usa];
        //return [$regions_france, $regions_usa];
        return $results;
    }

    public function insertNomenclature(Nomenclature $nomenclature)
{
    $sql = 'INSERT INTO edito_lien(edito_id, edito_id2, libelle, libelle2, type, type2, statut, dateCreation, niveau, navigation, parent, titre) VALUES( ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?)';
    $result = $this->prepare($sql);
    $result->bindValue(1, $nomenclature->getEditoId());
    $result->bindValue(2, $nomenclature->getEditoId2());
    $result->bindValue(3, $nomenclature->getLibelle1());
    $result->bindValue(4, $nomenclature->getLibelle2());
    $result->bindValue(5, $nomenclature->getType1());
    $result->bindValue(6, $nomenclature->getType2());
    $result->bindValue(7, $nomenclature->getStatut());
    $result->bindValue(8, $nomenclature->getNiveau());
    $result->bindValue(9, $nomenclature->getNavigation());
    $result->bindValue(10, $nomenclature->getParent());
    $result->bindValue(11, $nomenclature->getTitre());
    $result->execute();
}
    public function getSlugById($id)
    {
        $sql = 'SELECT  * FROM slug
            WHERE id = ?';
        $result = $this->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Slugs::class);
        $slug = $result->fetch();
        return $slug;
    }
    public function insertCategorieLien(Categorielien $categorielien)
    {

        $sql = 'INSERT INTO categorie_lien(cat_id, cat_id2, libelle, libelle2, descriptif, type, type2, actif, statut, dateCreation) VALUES( ?, ?, NULL, NULL, ?, NULL, NULL, NULL, NULL, NOW())';
        $result = $this->prepare($sql);
        $result->bindValue(1, $categorielien->getCatId());
        $result->bindValue(2, $categorielien->getCatId2());
        $result->bindValue(3, $categorielien->getDescriptif());
        $result->execute();
        //$soc_id = $this->getBdd()->lastInsertId();
    }
    public function updateCategorieLien(Categorielien $categorielien)
    {

        $sql = 'UPDATE categorie_lien SET descriptif = ? WHERE cat_id = ? AND cat_id2=?';
        $result = $this->prepare($sql);
        $result->execute([$categorielien->getDescriptif(), $categorielien->getCatId(), $categorielien->getCatId2()]);
    }
    public function deleteSlug(Slugs $slug)
    {
        $sql = 'DELETE FROM slug WHERE cat_id = ? AND cat_id2 = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $slug->getCatId());
        $result->bindValue(2, $slug->getCatId2());
        $result->execute();
    }
    public function getAllNomenclaturesByEdito(Nomenclature $all_nomenclatures, Edito $article)
    {
        $id = $article->getId();

        $sql = 'SELECT * FROM edito_lien WHERE edito_id = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $id);
        //$result->bindValue(2, $parent);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Nomenclature::class);
        $all_nomenclatures = $result->fetchAll();
        return $all_nomenclatures;
    }
    public function getAllslugByCriteres(Slugs $all_slugs)
    {
        $parent = $all_slugs->getParent();

        $sql = 'SELECT  * FROM slug
    WHERE parent LIKE :parent GROUP BY id';
        $result = $this->prepare($sql);
        $result->execute([':parent' => $parent]);

        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Slugs::class);
        $all_slugs = $result->fetchAll();
        return $all_slugs;
    }

}