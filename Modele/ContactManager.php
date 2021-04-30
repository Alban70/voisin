<?php
namespace Modele;

use Lib\EntiteManager;
use PDO;

class ContactManager extends EntiteManager
{


    public function createContact($contact)
    {
        $sql = 'INSERT INTO contact VALUES (null, ?, ?, ?, ?, NULL)';
        $result = $this->prepare($sql);
        $result->bindValue(1, $contact->getNom());
        $result->bindValue(2, $contact->getEmail());
        $result->bindValue(3, $contact->getVente());
        $result->bindValue(4, $contact->getType());
        //$result->bindValue(3, $contact->getDate()->format('Y-m-d'));
        $result->execute();
}
    public function controleEmail($contact)
    {
        $sql = 'SELECT * FROM contact WHERE email = ?';
        $result = $this->prepare($sql);
        $result->bindValue(1, $contact->getEmail());


        //$result->bindValue(3, $contact->getDate()->format('Y-m-d'));
        $result->execute();
    }
    public function getContactById(Auteur $auteur){

        $sql = 'SELECT contact_id, nom, soc_id FROM contact
            WHERE contact_id = ?';
        $result =  $this->prepare($sql);
        $result->execute([$auteur->getContactId()]);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Contact::class);
        return $result->fetch();
    }
    public function updateContact(Contact $contact_update){

        $sql = 'UPDATE contact SET nom = ?, prenom = ? WHERE contact_id = ?';
        $result = $this->prepare($sql);
        $result->execute([$contact_update->getNom(), $contact_update->getPrenom(), $contact_update->getId()]);
    }

}





