<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 31/05/2017
 * Time: 11:53
 */

namespace Model;


use Entity\Etat;
use Entity\Photo;
use Entity\Produit;

class EtatManagerPDO extends EtatManager
{

    /**
     * Méthode retournant une fiche etat précis.
     * @param $id int L'identifiant de la news à récupérer
     * @return Etat La fiche etat demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM etat WHERE idEtat = :id');
        $requete->bindValue(':id', $id);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Etat');
        if ($etat = $requete->fetch()) {
            if ($etat->getIdPhoto() != NULL) {
                $reqPhoto = $this->dao->prepare('SELECT Photo FROM photo WHERE idPhoto = :id');
                $requete->bindValue(':id', $etat->getIdPhoto());
                $requete->execute();
                $etat->setPhoto($reqPhoto->fetch());
            }
            return $etat;
        }
    }

    /**
     * Méthode permettant de supprimer un produit.
     * @param $id int L'identifiant du produit à supprimer
     * @return void
     */
    public function delete($id)
    {
        $requete = $this->dao->prepare('DELETE FROM etat WHERE idEtat = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }

    /**
     * Méthode permettant d'ajouter une news.
     * @param $etat Produit La maturite à ajouter
     * @return void
     */
    protected function add(Etat $etat, Produit $produit, Photo $photo)
    {
        $requete = $this->dao->prepare('INSERT INTO etat SET contenu = :contenu, idPhoto = :photo, textePopup = :popup');
        $requete->execute(array(
            'contenu' => $etat->getContenu(),
            'photo' => $etat->getIdPhoto(),
            'popup' => $etat->getTextePopup()
        ));

        $idEtat = $this->dao->lastInsertId();

        $requete = $this->dao->prepare('INSERT INTO produit SET nomProduit = :nom, varieteProduit = :var, niveauEtat = :niveau, idEtat = :id, idPresentation = :presentation');
        $requete->execute(array(
            'nom' => $produit->getNomProduit(),
            'var' => $produit->getVarieteProduit(),
            'niveau' => $produit->getNiveauEtat(),
            'id' => $idEtat,
            'presentation' => $produit->getIdPresentation()
        ));

        $requete = $this->dao->prepare('UPDATE etat SET idProduit = :id WHERE idEtat = :idEtat');
        $requete->execute(array(
            'id' => $this->dao->lastInsertId(),
            'idEtat' => $idEtat
        ));
    }

    /**
     * Méthode permettant de modifier un produit.
     * @param $etat Etat le produit à modifier
     * @return void
     */
    protected function modify(Etat $etat, Produit $produit, Photo $photo)
    {
        $requete = $this->dao->prepare('UPDATE etat SET contenu = :contenu, idPhoto = :photo, textePopup = :popup WHERE idEtat = :id');
        $requete->execute(array(
            'contenu' => $etat->getContenu(),
            'photo' => $photo->getIdPhoto(),
            'popup' => $etat->getTextePopup(),
            'id' => $etat->getIdEtat()
        ));

        $requete = $this->dao->prepare('UPDATE produit SET niveauEtat = :niveau WHERE idProduit = :id');
        $requete->execute(array(
            'niveau' => $produit->getNiveauEtat(),
            'id' => $etat->getIdProduit()
        ));
    }
}