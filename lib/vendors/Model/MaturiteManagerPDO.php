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
use PDO;

class MaturiteManagerPDO extends MaturiteManager
{

    /**
     * Méthode retournant une fiche Maturite précise.
     * @param $id int L'identifiant de la fiche à récupérer
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

    public function GetAll()
    {
        $requete = $this->dao->query('SELECT * FROM maturite');
        if ($maturite = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $maturite;
        }

        return null;
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
            'contenu' => urldecode($maturite->getContenu()),
            'photo' => $maturite->getIdPhoto(),
            'ideale' => urldecode($maturite->getMaturiteIdeale()),
            'popup' => urldecode($maturite->getTextePopup())
        ));

        $idMaturite = $this->dao->lastInsertId();

        $requete = $this->dao->prepare('INSERT INTO produit SET nomProduit = :nom, varieteProduit = :var, niveauMaturite = :niveau, idMaturite = :id, idPresentation = :presentation');
        $requete->execute(array(
            'nom' => urldecode($produit->getNomProduit()),
            'var' => urldecode($produit->getVarieteProduit()),
            'niveau' => urldecode($produit->getNiveauMaturite()),
            'id' => $idMaturite,
            'presentation' => urldecode($produit->getIdPresentation())
        ));

        $requete = $this->dao->prepare('UPDATE maturite SET idProduit = :id WHERE idMaturite = :idMaturite');
        $requete->execute(array(
            'id' => $this->dao->lastInsertId(),
            'idMaturite' => $idMaturite
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
     * @param $maturite Maturite le produit à modifier
     * @return void
     */
    protected function modify(Maturite $maturite, Produit $produit, Photo $photo)
    {
        $requete = $this->dao->prepare('UPDATE maturite SET contenu = :contenu, idPhoto = :photo,
                                          maturiteIdeale = :ideale, textePopup = :popup WHERE idMaturite = :id');
        $requete->execute(array(
            'contenu' => urldecode($maturite->getContenu()),
            'photo' => $photo->getIdPhoto(),
            'ideale' => urldecode($maturite->getMaturiteIdeale()),
            'popup' => urldecode($maturite->getTextePopup()),
            'id' => $maturite->getIdMaturite()
        ));

        $requete = $this->dao->prepare('UPDATE produit SET niveauMaturite = :niveau WHERE idProduit = :id');
        $requete->execute(array(
            'niveau' => urldecode($produit->getNiveauMaturite()),
            'id' => $maturite->getIdProduit()
        ));

    }
}