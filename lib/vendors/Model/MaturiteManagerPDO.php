<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 18:03
 */

namespace Model;


use Entity\Maturite;
use Entity\Photo;
use Entity\Produit;

class MaturiteManagerPDO extends MaturiteManager
{

    /**
     * Méthode retournant une fiche Maturite précise.
     * @param $id int L'identifiant de la news à récupérer
     * @return Maturite La fiche maturite demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM maturite WHERE idMaturite = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Maturite');
        if ($maturite = $requete->fetch()) {
            if ($maturite->getIdPhoto() != NULL) {
                $reqPhoto = $this->dao->prepare('SELECT Photo FROM photo WHERE idPhoto = :id');
                $requete->bindValue(':id', $maturite->getIdPhoto());
                $requete->execute();
                $maturite->setPhoto($reqPhoto->fetch());
            }
            return $maturite;
        }
    }

    /**
     * Méthode permettant de supprimer un produit.
     * @param $id int L'identifiant du produit à supprimer
     * @return void
     */
    public function delete($id)
    {
        $requete = $this->dao->prepare('DELETE FROM maturite WHERE idMaturite = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }

    public function changeMaturiteIdeale(Produit $produit)
    {

    }

    /**
     * Méthode permettant d'ajouter une maturite.
     * @param $maturite Produit La maturite à ajouter
     * @return void
     */
    protected function add(Maturite $maturite, Produit $produit, Photo $photo)
    {
        $requete = $this->dao->prepare('INSERT INTO maturite SET contenu = :contenu, idPhoto = :photo, maturiteIdeale = :ideale, textePopup = :popup');
        $requete->execute(array(
            'contenu' => $maturite->getContenu(),
            'photo' => $maturite->getIdPhoto(),
            'ideale' => $maturite->getMaturiteIdeale(),
            'popup' => $maturite->getTextePopup()
        ));

        $idMaturite = $this->dao->lastInsertId();

        $requete = $this->dao->prepare('INSERT INTO produit SET nomProduit = :nom, varieteProduit = :var, niveauMaturite = :niveau, idMaturite = :id, idPresentation = :presentation');
        $requete->execute(array(
            'nom' => $produit->getNomProduit(),
            'var' => $produit->getVarieteProduit(),
            'niveau' => $produit->getNiveauMaturite(),
            'id' => $idMaturite,
            'presentation' => $produit->getIdPresentation()
        ));

        $requete = $this->dao->prepare('UPDATE maturite SET idProduit = :id WHERE idMaturite = :idMaturite');
        $requete->execute(array(
            'id' => $this->dao->lastInsertId(),
            'idMaturite' => $idMaturite
        ));

    }

    /**
     * Méthode permettant de modifier un produit.
     * @param $maturite Maturite le produit à modifier
     * @return void
     */
    protected function modify(Maturite $maturite, Produit $produit, Photo $photo)
    {
        $requete = $this->dao->prepare('UPDATE maturite SET contenu = :contenu, idPhoto = :photo,
                                          maturiteIdeale = :ideale, textePopup = :popup WHERE idMaturite = :id');
        $requete->execute(array(
            'contenu' => $maturite->getContenu(),
            'photo' => $photo->getIdPhoto(),
            'ideale' => $maturite->getMaturiteIdeale(),
            'popup' => $maturite->getTextePopup(),
            'id' => $maturite->getIdMaturite()
        ));

        $requete = $this->dao->prepare('UPDATE produit SET niveauMaturite = :niveau WHERE idProduit = :id');
        $requete->execute(array(
            'niveau' => $produit->getNiveauMaturite(),
            'id' => $maturite->getIdProduit()
        ));

    }
}