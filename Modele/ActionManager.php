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

class ActionManager extends EntiteManager
{
    public function getAllEdito()
    {
        $sql = 'SELECT * FROM edito GROUP BY id';

        $result = $this->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Edito::class);
        return $result->fetchAll();

    }
    public function insertContactAction(Auteur $auteur, Membre $membre, Contact $contact, Coordonnees $coordonnees, Action $action){

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
        $coord_id = $this->getBdd()->lastInsertId();

        $sql = 'INSERT INTO user(dateCreation, login, pwd, actif, statut, type, contact_id) VALUES(NOW(),NULL,NULL, null, ?, null, ?)';
        $result = $this->prepare($sql);
        //$result->bindValue(1, $auteur->getNom());
        //$result->bindValue(2, $auteur->getPassHash());
        $result->bindValue(1, $auteur->getStatut());
        $result->bindValue(2, $contact_id);
        $result->execute();

        $sql = 'INSERT INTO action(libelle, designation, dateCreation, dateRelance, type, statut, actif, fait, soc_id, contact_id, coord_id) VALUES(?, ?, NOW(), NOW(), NULL, NULL, NULL, NULL, ?, ?, ?)';
        $result = $this->prepare($sql);
        //$result->bindValue(2, $commande->getDateCom()->format('Y-m-d H:i:s'));
        $result->bindValue(1, $action->getLibelle());
        $result->bindValue(2, $action->getDesignation());
        $result->bindValue(3, $soc_id);
        $result->bindValue(4, $contact_id);
        $result->bindValue(5, $coord_id);
        //$result->bindValue(3, $membre->getId(),$this->getBdd()->lastInsertId());
        $result->execute();
        //$com_id = $this->getBdd()->lastInsertId();
    }
    public function insertContactActionAudit(Auteur $auteur, Membre $membre, Contact $contact, Coordonnees $coordonnees, Action $action){

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
        $coord_id = $this->getBdd()->lastInsertId();

        $sql = 'INSERT INTO user(dateCreation, login, pwd, actif, statut, type, contact_id) VALUES(NOW(),NULL,NULL, null, ?, null, ?)';
        $result = $this->prepare($sql);
        //$result->bindValue(1, $auteur->getNom());
        //$result->bindValue(2, $auteur->getPassHash());
        $result->bindValue(1, $auteur->getStatut());
        $result->bindValue(2, $contact_id);
        $result->execute();

        $sql = 'INSERT INTO action(libelle, designation, dateCreation, dateRelance, type, statut, actif, fait, soc_id, contact_id, coord_id) VALUES(?, ?, NOW(), NOW(), NULL, NULL, NULL, NULL, ?, ?, ?)';
        $result = $this->prepare($sql);
        //$result->bindValue(2, $commande->getDateCom()->format('Y-m-d H:i:s'));
        $result->bindValue(1, $action->getLibelle());
        $result->bindValue(2, $action->getDesignation());
        $result->bindValue(3, $soc_id);
        $result->bindValue(4, $contact_id);
        $result->bindValue(5, $coord_id);
        //$result->bindValue(3, $membre->getId(),$this->getBdd()->lastInsertId());
        $result->execute();
        //$com_id = $this->getBdd()->lastInsertId();
    }
}