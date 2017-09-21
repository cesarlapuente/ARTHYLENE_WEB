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
use PDO;

class EtatManagerPDO extends EtatManager
{

    /**
     * Méthode retournant une fiche etat précis.
     * @param $id int L'identifiant de la fiche à récupérer
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
     * Méthode permettant de supprimer une fiche.
     * @param $id int L'identifiant de la fiche à supprimer
     * @return void
     */
    public function delete($id)
    {
        $requete = $this->dao->prepare('DELETE FROM etat WHERE idEtat = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }

    public function GetAll()
    {
        $requete = $this->dao->query('SELECT * FROM etat');
        if ($etat = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $etat;
        }

        return null;
    }

    /**
     * Méthode permettant d'ajouter une fiche.
     * @return void
     */
    protected function add(Etat $etat, Produit $produit, Photo $photo)
    {
        $requete = $this->dao->prepare('INSERT INTO etat SET contenu = :contenu, idPhoto = :photo, textePopup = :popup');
        $requete->execute(array(
            'contenu' => urldecode($etat->getContenu()),
            'photo' => urldecode($etat->getIdPhoto()),
            'popup' => urldecode($etat->getTextePopup())
        ));

        $idEtat = $this->dao->lastInsertId();

        $requete = $this->dao->prepare('INSERT INTO produit SET nomProduit = :nom, varieteProduit = :var, niveauEtat = :niveau, idEtat = :id, idPresentation = :presentation');
        $requete->execute(array(
            'nom' => urldecode($produit->getNomProduit()),
            'var' => urldecode($produit->getVarieteProduit()),
            'niveau' => $produit->getNiveauEtat(),
            'id' => $idEtat,
            'presentation' => $produit->getIdPresentation()
        ));

        $requete = $this->dao->prepare('UPDATE etat SET idProduit = :id WHERE idEtat = :idEtat');
        $requete->execute(array(
            'id' => $this->dao->lastInsertId(),
            'idEtat' => $idEtat
        ));

        //actualise les différentes fiches, peut être renplacé par un trigger
        $requete = $this->dao->prepare('SELECT * FROM produit WHERE nomProduit = :nom AND varieteProduit =:var');
        $requete->execute(array(
            'nom' => urldecode($produit->getNomProduit()),
            'var' => urldecode($produit->getVarieteProduit())
        ));

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');
        foreach ($requete->fetchAll() as $produitNew) 
        {
            if ($produitNew->getIdCaracteristique() != NULL) 
            {
                $reqCaracteristique = $this->dao->prepare('UPDATE produit SET idCaracteristique =:idCaracteristique WHERE nomProduit = :nom AND varieteProduit =:var');
                $reqCaracteristique->execute(array(
                    'idCaracteristique' => $produitNew->getIdCaracteristique(),
                    'nom' => urldecode($produit->getNomProduit()),
                    'var' => urldecode($produit->getVarieteProduit())
                ));
            }

            if ($produitNew->getIdBeneficeSante() != NULL) 
            {
                $reqBeneficeSante = $this->dao->prepare('UPDATE produit SET idBeneficeSante =:idBeneficeSante WHERE nomProduit = :nom AND varieteProduit =:var');
                $reqBeneficeSante->execute(array(
                    'idBeneficeSante' => $produitNew->getIdBeneficeSante(),
                    'nom' => urldecode($produit->getNomProduit()),
                    'var' => urldecode($produit->getVarieteProduit())
                ));
            }

            if ($produitNew->getIdConseil() != NULL) 
            {
                $reqConseil = $this->dao->prepare('UPDATE produit SET idConseil =:idConseil WHERE nomProduit = :nom AND varieteProduit =:var');
                $reqConseil->execute(array(
                    'idConseil' => $produitNew->getIdConseil(),
                    'nom' => urldecode($produit->getNomProduit()),
                    'var' => urldecode($produit->getVarieteProduit())
                ));
            }

            if ($produitNew->getIdMarketing() != NULL) 
            {
                $reqMarketing = $this->dao->prepare('UPDATE produit SET idMarketing =:idMarketing WHERE nomProduit = :nom AND varieteProduit =:var');
                $reqMarketing->execute(array(
                    'idMarketing' => $produitNew->getIdMarketing(),
                    'nom' => urldecode($produit->getNomProduit()),
                    'var' => urldecode($produit->getVarieteProduit())
                ));
            }
        }
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
            'contenu' => urldecode($etat->getContenu()),
            'photo' => $photo->getIdPhoto(),
            'popup' => urldecode($etat->getTextePopup()),
            'id' => $etat->getIdEtat()
        ));

        $requete = $this->dao->prepare('UPDATE produit SET niveauEtat = :niveau WHERE idProduit = :id');
        $requete->execute(array(
            'niveau' => $produit->getNiveauEtat(),
            'id' => $etat->getIdProduit()
        ));
    }
}