<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 08/04/2018
 * Time: 09:47
 */

namespace Modele;

use Lib\EntiteManager;
use \PDO;

class ComligneManager extends EntiteManager
{
    public function addCommandeLigne(Commande $commande, Article $article)
    {
        $sql = 'INSERT INTO commandeligne(qte, libelle, designation, remise, typeRemise, prix, typePrix, sTotalLigne, statut, dateCreation, com_id, article_id) VALUES(?, ?, NULL, NULL, NULL, ?, NULL, ?, NULL, NOW(), ?, ?)';

        $result = $this->prepare($sql);
        $result->execute([$commande->getLibelle(), $commande->getDateCom()->format('Y-m-d H:i:s'),$contact->getSocId()]);
        //$article->setSlug($article->getTitre(),$this->getBdd()->lastInsertId());

    }
}