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

class CategorieManager extends EntiteManager
{
    public function getAllCategorie()
    {
        $sql = 'SELECT * FROM categorie GROUP BY id';

        $result = $this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
        return $result->fetchAll();

    }
    public function getAllCategoriesByEtiquette()
{
    $sql = 'SELECT * FROM Categorie WHERE type = "etiquette"';
    $result = $this->query($sql);
    $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
    $all_categories = $result->fetchAll();
    return $all_categories;
}
    /*public function getAllCategoriesByEtiquette(Categorie $all_categories2, Famille $famille)
    {
        $sql = 'SELECT * FROM Categorie WHERE fam_id =?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $famille->getFamId());
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
        $all_etiquettes = $result->fetchAll();
        return $all_etiquettes;
    }*/
    /*public function getCategoriesByEtiquette()
    {
        $sql = 'SELECT * FROM Categorie WHERE fam_id =12';
        $result = $this->prepare($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
        $all_etiquettes = $result->fetch();
        return $all_etiquettes;
    }*/
    /*public function filtreMix(Categorie $all_categories1)
    {
        $libelle = $all_categories1->getLibelle();
        $fam_id = $all_categories1->getFamId();
        $sql = 'SELECT  * FROM categorie
            WHERE libelle LIKE :libelle AND fam_id = :fam_id';
        $result =  $this->prepare($sql);
        $result->execute([':libelle'=>$libelle, ':fam_id'=>$fam_id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
        $all_categories1 = $result->fetchAll();
        return $all_categories1;
    }*/
    /*public function filtreMix(Categorie $all_categories, Famille $famille)
{
    if(($all_categories->getLibelle() !== NULL) OR ($famille->getFamId() !== '0')) :

    $libelle = $all_categories->getLibelle();
        $fam_id = $famille->getFamId();
        $sql = 'SELECT  * FROM categorie
        WHERE libelle LIKE :libelle AND fam_id = :fam_id';
        $result =  $this->prepare($sql);
        $result->execute([':libelle'=>$libelle, ':fam_id'=>$fam_id]);

        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
        $all_categories1 = $result->fetchAll();
        return $all_categories1;
        else:

            $sql = 'SELECT * FROM categorie GROUP BY id';
            $result = $this->query($sql);
            $all_categories = $result->fetchAll();
            return $all_categories;
    endif;

}*/
    public function filtreMix(Categorie $all_categories)
    {
        //var_dump('hello');
        //var_dump('hello');
        //var_dump($all_categories);

        //if(($all_categories->getLibelle() !== NULL) OR ($all_categories->getFamId() !== '0')) :
            $libelle = $all_categories->getLibelle();
            $type = $all_categories->getType();
            $sql = 'SELECT  * FROM categorie
        WHERE libelle LIKE :libelle AND type LIKE :type';
            $result =  $this->prepare($sql);
            $result->execute([':libelle'=>$libelle, ':type'=>$type]);

            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
            $all_categories = $result->fetchAll();
            return $all_categories;

        //endif;

    }
    //public function filtreMix2(Categorie $all_categories1, Categorie $all_categories2, Famille $all_FamilleSlugs)
            public function filtreMix2(Categorie $all_categories1, Categorie $all_categories2)
    {

        //if(($all_categories1->getLibelle() !== NULL) && ($familleC->getFamId() !== '0')) :

            $libelle = $all_categories1->getLibelle();
            $fam_id = $all_categories1->getFamId();
            $sql = 'SELECT  * FROM categorie
        WHERE libelle LIKE :libelle AND fam_id = :fam_id';
            $result =  $this->prepare($sql);
            $result->execute([':libelle'=>$libelle, ':fam_id'=>$fam_id]);

            $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
            $all_categories1 = $result->fetchAll();
        //endif;
            //if(($all_categories2->getLibelle() !== NULL) && ($familleE->getFamId() !== '0')) :

                $libelle = $all_categories2->getLibelle();
                $fam_id = $all_categories2->getFamId();
                $sql = 'SELECT  * FROM categorie
        WHERE libelle LIKE :libelle AND fam_id = :fam_id';
                $result =  $this->prepare($sql);
                $result->execute([':libelle'=>$libelle, ':fam_id'=>$fam_id]);

                $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
                $all_categories2 = $result->fetchAll();
            //endif;

        //$fm = new FamilleManager();
        //$all_FamilleSlugs->$fm->getAllFamillesBySlug();

            //return ['all_categories1' => $all_categories1, 'all_categories2' => $all_categories2, 'all_FamilleSlugs' => $all_FamilleSlugs];
        return ['all_categories1' => $all_categories1, 'all_categories2' => $all_categories2];
    }
    function insertCategorie(Categorie $categorie){

        $sql = 'INSERT INTO categorie(libelle, descriptif, type, actif, statut, dateCreation, fam_id, niveau, etiquette) VALUES(?, NULL, ?, NULL, NULL, NOW(), 0, NULL, NULL )';
        $result = $this->prepare($sql);
        $result->bindValue(1, $categorie->getLibelle());
        //$result->bindValue(2, $categorie->getFamId());
        $result->bindValue(2, $categorie->getType());
        //$result->bindValue(3, $categorie->getStatut());
        //$result->bindValue(4, $categorie->getNiveau());
        //$result->bindValue(5, $categorie->getEtiquette());
        //$result->bindValue(3, $categorie->getFamId());
        $result->execute();
    }
    public function updateCategorie(Categorie $categorie){

        $sql = 'UPDATE categorie SET libelle = ?, type = ?, statut = ?,niveau = ?, etiquette = ?  WHERE id = ?';
        $result = $this->prepare($sql);
        $result->execute([$categorie->getLibelle(), $categorie->getType(), $categorie->getStatut(), $categorie->getNiveau(), $categorie->getEtiquette(),  $categorie->getId()]);
    }
    public function deleteCategorie(Categorie $categorie){

        $sql = 'DELETE FROM categorie WHERE id = ?';
        $result = $this->prepare($sql);
        $result->execute([$categorie->getId()]);

    }
    public function getCategorieById($id)
   {
       $sql = 'SELECT  * FROM categorie
           WHERE id = ?';
       $result =  $this->prepare($sql);
       $result->execute([$id]);
       $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Categorie::class);
       $categorie = $result->fetch();
       return $categorie;
   }

/*public function filtreBothEdito(Edito $edito1)
{
   $titre = $edito1->getTitre();
   $type = $edito1->getType();

   $sql = 'SELECT  * FROM edito
           WHERE titre LIKE :titre AND type LIKE :type';
   $result =  $this->prepare($sql);
   $result->execute([':titre'=>$titre, ':type'=>$type]);
   $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
   $all_editos1 = $result->fetchAll();

   return $all_editos1;

}*/

}