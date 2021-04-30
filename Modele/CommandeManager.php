<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 04/04/2018
 * Time: 18:16
 */

namespace Modele;

use Lib\EntiteManager;
use PDO;

class CommandeManager extends EntiteManager
{
    public function getAllCommandesById(Contact $contact)
    {
        $sql = 'SELECT * FROM commande WHERE soc_id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$contact->getSocId()]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Commande::class);
        return $result->fetchAll();

    }
    public function getCommandeBySocieteId(Contact $contact)
    {
        $sql = 'SELECT * FROM commande WHERE soc_id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$contact->getSocId()]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Commande::class);
        return $result->fetch();
    }

    public function getAllCommmande()
    {
        $sql = 'SELECT * FROM commande';
        $result=$this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Commande::class);
        return $result->fetchAll();

    }

    public function addCommandTest(Auteur $auteur, Membre $membre, Contact $contact, Coordonnees $coordonnees, Commande $commande){

        $sql = 'INSERT INTO societe(nom, adresse1, adresse2, adresse3, adresse4, adresse5, cp, ville, pays, actif, type, dateCreation) VALUES(?, NULL, NULL, NULL, NULL , NULL , NULL, NULL, NULL, NULL, NULL, NOW())';
        $result = $this->prepare($sql);
        $result->bindValue(1, $membre->getNom());
        $result->execute();
        $soc_id = $this->getBdd()->lastInsertId();

        $libelle='Demande de test gratuit';
        $sql = 'INSERT INTO commande(libelle, dateCom, dateLivrSouh, dateLivrPrevu, type, statut, totalHt, totalTTC, totalTVA, tva, actif, dateCreation, soc_id) VALUES(?, NOW(), NOW(), NOW(), NULL, NULL, NULL, NULL, NULL, NULL, NULL, NOW(), ?)';
        $result = $this->prepare($sql);
        //$result->bindValue(2, $commande->getDateCom()->format('Y-m-d H:i:s'));
        $result->bindValue(1, $libelle);
        $result->bindValue(2, $soc_id);
        //$result->bindValue(3, $membre->getId(),$this->getBdd()->lastInsertId());
        $result->execute();
        $soc_id = $this->getBdd()->lastInsertId();



        //$result->execute([$commande->getLibelle(), $commande->getDateCom()->format('Y-m-d H:i:s'),$contact->getSocId()]);
        //$article->setSlug($article->getTitre(),$this->getBdd()->lastInsertId());


    }
    public function addCommandTarifs(Commande $commande, Article $articles, Comligne $comligne){
        $soc_id='0';
        $sql = 'INSERT INTO commande(libelle, dateCom, dateLivrSouh, dateLivrPrevu, type, statut, totalHt, totalTTC, totalTVA, tva, actif, dateCreation, soc_id) VALUES(?, NOW(), NOW(), NOW(), ?, ?, NULL, NULL, NULL, NULL, NULL, NOW(), ?)';
        $result = $this->prepare($sql);
        //$result->bindValue(2, $commande->getDateCom()->format('Y-m-d H:i:s'));
        $result->bindValue(1, $commande->getLibelle());
        $result->bindValue(2, $commande->getType());
        $result->bindValue(3, $commande->getStatut());
        $result->bindValue(4, $soc_id);
        //$result->bindValue(3, $membre->getId(),$this->getBdd()->lastInsertId());
        $result->execute();
        $com_id = $this->getBdd()->lastInsertId();
        $com_id = $_SESSION['com_id'];
        //$result->execute([$commande->getLibelle(), $commande->getDateCom()->format('Y-m-d H:i:s'),$contact->getSocId()]);
        //$article->setSlug($article->getTitre(),$this->getBdd()->lastInsertId());

        foreach ($articles as $key => $article) {
            //$category_product->setDate(new \DateTime($category_product->getDate()));
            //$cm = new CategoryManager();
            //$category_product->setCategory($cm->getCategoryById($category_product->getCategory()));
            if($article > 0) {

                //$sql = 'SELECT * FROM article WHERE article_id = ?';
                //$result = $this->prepare($sql);
                //$result->bindValue(1, $article->getArticleId());
                //$result->execute();
                //$article = $result;
                //$total = $value*$article['prixHT'];

                //$result = $pdo->prepare($sql);
                //$result->bindValue(1, $key);
                //$result->execute();
                //$article = $result->fetch();
                //$total = $value*$article['prixHT'];

                $sql = 'INSERT INTO commandeLigne(qte, libelle, designation, remise, typeRemise, prix, typePrix, sTotalLigne, statut, dateCreation, com_id, article_id) VALUES(?, ?, NULL, NULL, NULL, ?, NULL, ?, NULL, NOW(), ?, ?)';
                $result = $pdo->prepare($sql);
                $result->bindValue(1, $value);
                $result->bindValue(2, $article['libelle']);
                $result->bindValue(3, $article['prixHT']);
                //$result->bindValue(4, $total);
                $result->bindValue(5, $com_id);
                $result->bindValue(5, $article->getArticleId());
                $result->execute();

            $sql = 'INSERT INTO commandeligne(qte, libelle, designation, remise, typeRemise, prix, typePrix, sTotalLigne, statut, dateCreation, com_id, article_id) VALUES(?, ?, NULL, NULL, NULL, ?, NULL, ?, NULL, NOW(), ?, ?)';
            $result = $this->prepare($sql);
            //$result->bindValue(2, $commande->getDateCom()->format('Y-m-d H:i:s'));
            $result->bindValue(1, $commande->getLibelle());
            $result->bindValue(2, $commande->getType());
            $result->bindValue(3, $commande->getStatut());
            $result->bindValue(4, $soc_id);
            //$result->bindValue(3, $membre->getId(),$this->getBdd()->lastInsertId());
            $result->execute();
            }

        }







        //$result = $this->prepare($sql);
        //$result->execute([$commande->getLibelle(), $commande->getDateCom()->format('Y-m-d H:i:s'),$contact->getSocId()]);
        //$article->setSlug($article->getTitre(),$this->getBdd()->lastInsertId());


    }

    public function addCommande(Commande $commande, Contact $contact)
    {
        /*$libelle='commande';
        $type='commande';
        $statut='Encours';*/
        $sql = 'INSERT INTO commande(libelle, dateCom, dateLivrSouh, dateLivrPrevu, type, statut, totalHt, totalTTC, totalTVA, tva, actif, dateCreation, soc_id) VALUES(?, ?, NOW(), NOW(), NULL, NULL, NULL, NULL, NULL, NULL, NULL, NOW(), ?)';

        $result = $this->prepare($sql);
        $result->execute([$commande->getLibelle(), $commande->getDateCom()->format('Y-m-d H:i:s'),$contact->getSocId()]);
        //$article->setSlug($article->getTitre(),$this->getBdd()->lastInsertId());

    }
    public function getCommandeByLastId(Commande $commande)
    {
        $sql = 'SELECT * FROM commande WHERE soc_id = ?';
        $result =  $this->prepare($sql);
        $result->execute($commande->getComId());
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Commande::class);
        return $result->fetch();
    }
}