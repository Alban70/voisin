<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 07/02/2018
 * Time: 10:59
 */

namespace Modele;


use Lib\EntiteManager;
use \PDO;

class AuteurManager extends EntiteManager
{
    public function getAuteurById($id){
        
        $sql = 'SELECT  id, statut, login, pwd as pass, contact_id FROM user
            WHERE id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$id]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Auteur::class);
        return $result->fetch();
    }

    public function getAuteurByLogin(Auteur $auteur){
        $sql = 'SELECT id, login, pwd as pass, statut, contact_id FROM user WHERE login = ?';
        $result = $this->prepare($sql);
        $result->execute([$auteur->getLogin()]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Auteur::class);
        return $result->fetch();
    }
    public function insertAuteur(Auteur $auteur, Membre $membre, Contact $contact, Coordonnees $coordonnees){

    $sql = 'INSERT INTO societe(nom, adresse1, adresse2, adresse3, adresse4, adresse5, cp, ville, pays, actif, type, dateCreation) VALUES(?, NULL, NULL, NULL, NULL , NULL , NULL, NULL, NULL, NULL, NULL, NOW())';
    $result = $this->prepare($sql);
    $result->bindValue(1, $membre->getNom());
    $result->execute();
    $soc_id = $this->getBdd()->lastInsertId();


    $sql = 'INSERT INTO contact(nom, prenom, genre, dateCreation, soc_id) VALUES(?, ?, NULL, NOW(), ?)';
    $result = $this->prepare($sql);
    $result->bindValue(1, $contact->getNom());
    $result->bindValue(2, $contact->getPrenom());
    $result->bindValue(3, $soc_id);
    //$result->bindValue(3, $membre->getId(),$this->getBdd()->lastInsertId());
    $result->execute();
    $contact_id = $this->getBdd()->lastInsertId();

    $sql = 'INSERT INTO coordonnees(email, tel, fax, type, actif, statut, dateCreation, banq_id, contact_id, soc_id) VALUES(?, ?, NULL, NULL, NULL, NULL, NOW(),NULL ,?, ?)';
    $result = $this->prepare($sql);
    $result->bindValue(1, $coordonnees->getEmail());
    $result->bindValue(2, $coordonnees->getTel());
    $result->bindValue(3, $contact_id);
    $result->bindValue(4, $soc_id);
    $result->execute();

    $sql = 'INSERT INTO user(dateCreation, login, pwd, actif, statut, type, contact_id) VALUES(NOW(),?,?, null, null, null, ?)';
    $result = $this->prepare($sql);
    $result->bindValue(1, $auteur->getNom());
    $result->bindValue(2, $auteur->getPassHash());
    $result->bindValue(3, $contact_id);
    $result->execute();
}
    public function insertAuteurCommandeTest(Auteur $auteur, Membre $membre, Contact $contact, Coordonnees $coordonnees, Commande $commande){

        $sql = 'INSERT INTO societe(nom, adresse1, adresse2, adresse3, adresse4, adresse5, cp, ville, pays, actif, type, dateCreation) VALUES(?, NULL, NULL, NULL, NULL , NULL , NULL, NULL, NULL, NULL, NULL, NOW())';
        $result = $this->prepare($sql);
        $result->bindValue(1, $membre->getNom());
        $result->execute();
        $soc_id = $this->getBdd()->lastInsertId();

        $sql = 'INSERT INTO commande(libelle, dateCom, dateLivrSouh, dateLivrPrevu, type, statut, totalHt, totalTTC, totalTVA, tva, actif, dateCreation, soc_id) VALUES(?, NOW(), NOW(), NOW(), NULL, NULL, NULL, NULL, NULL, NULL, NULL, NOW(), ?)';
        $result = $this->prepare($sql);
        //$result->bindValue(2, $commande->getDateCom()->format('Y-m-d H:i:s'));
        $result->bindValue(1, $commande->getLibelle());
        $result->bindValue(2, $soc_id);
        //$result->bindValue(3, $membre->getId(),$this->getBdd()->lastInsertId());
        $result->execute();
        //$com_id = $this->getBdd()->lastInsertId();


        $sql = 'INSERT INTO contact(nom, prenom, genre, dateCreation, soc_id) VALUES(?, ?, NULL, NOW(), ?)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $contact->getNom());
        $result->bindValue(2, $contact->getPrenom());
        $result->bindValue(3, $soc_id);
        //$result->bindValue(3, $membre->getId(),$this->getBdd()->lastInsertId());
        $result->execute();
        $contact_id = $this->getBdd()->lastInsertId();

        $sql = 'INSERT INTO coordonnees(email, tel, fax, type, actif, statut, dateCreation, banq_id, contact_id, soc_id) VALUES(?, ?, NULL, NULL, NULL, NULL, NOW(),NULL ,?, ?)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $coordonnees->getEmail());
        $result->bindValue(2, $coordonnees->getTel());
        $result->bindValue(3, $contact_id);
        $result->bindValue(4, $soc_id);
        $result->execute();

        $sql = 'INSERT INTO user(dateCreation, login, pwd, actif, statut, type, contact_id) VALUES(NOW(),?,?, null, null, null, ?)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $auteur->getNom());
        $result->bindValue(2, $auteur->getPassHash());
        $result->bindValue(3, $contact_id);
        $result->execute();
    }
    /*public function insertAuteurCommandeTarifs(Auteur $auteur, Membre $membre, Contact $contact, Coordonnees $coordonnees, Commande $commande){

        $sql = 'INSERT INTO societe(nom, adresse1, adresse2, adresse3, adresse4, adresse5, cp, ville, pays, actif, type, dateCreation) VALUES(?, NULL, NULL, NULL, NULL , NULL , NULL, NULL, NULL, NULL, NULL, NOW())';
        $result = $this->prepare($sql);
        $result->bindValue(1, $membre->getNom());
        $result->execute();
        $soc_id = $this->getBdd()->lastInsertId();

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




        $sql = 'INSERT INTO contact(nom, prenom, genre, dateCreation, soc_id) VALUES(?, ?, NULL, NOW(), ?)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $contact->getNom());
        $result->bindValue(2, $contact->getPrenom());
        $result->bindValue(3, $soc_id);
        //$result->bindValue(3, $membre->getId(),$this->getBdd()->lastInsertId());
        $result->execute();
        $contact_id = $this->getBdd()->lastInsertId();

        $sql = 'INSERT INTO coordonnees(email, tel, fax, type, actif, statut, dateCreation, banq_id, contact_id, soc_id) VALUES(?, ?, NULL, NULL, NULL, NULL, NOW(),NULL ,?, ?)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $coordonnees->getEmail());
        $result->bindValue(2, $coordonnees->getTel());
        $result->bindValue(3, $contact_id);
        $result->bindValue(4, $soc_id);
        $result->execute();

        $sql = 'INSERT INTO user(dateCreation, login, pwd, actif, statut, type, contact_id) VALUES(NOW(),?,?, null, null, null, ?)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $auteur->getNom());
        $result->bindValue(2, $auteur->getPassHash());
        $result->bindValue(3, $contact_id);
        $result->execute();
    }*/
    public function updateAuteur(Auteur $auteur_update){

        $sql = 'UPDATE user SET login = ? WHERE id = ?';
        $result = $this->prepare($sql);
        $result->execute([$auteur_update->getLogin(), $auteur_update->getId()]);
    }
    /*public function insertAuteur(Auteur $auteur){

        $sql = 'INSERT INTO user(dateCreation, login, pwd, actif, statut, type, contact_id) VALUES(NOW(),?,?, null, null, null, NULL)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $auteur->getNom());
        $result->bindValue(2, $auteur->getPassHash());
        $result->execute();
    }*/


}