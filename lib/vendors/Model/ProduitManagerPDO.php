<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 29/05/2017
 * Time: 10:47
 */

namespace Model;


use Entity\Photo;
use Entity\Presentation;
use Entity\Produit;
use PDO;

class ProduitManagerPDO extends ProduitManager
{
    /**
     * Méthode retournant une liste de produits demandée.
     * @return array La liste des produits. Chaque entrée est une instance de Produit.
     */
    public function getList()
    {
        $sql = 'SELECT DISTINCT nomProduit, varieteProduit FROM produit ORDER BY nomProduit, varieteProduit';

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');

        $listeProduits = $requete->fetchAll();

        $requete->closeCursor();

        return $listeProduits;
    }

    /**
     * Méthode renvoyant le nombre de produit total.
     * @return int
     */
    public function count()
    {
        return $this->dao->query('SELECT COUNT(DISTINCT varieteProduit) FROM produit')->fetchColumn();
    }

    /**
     * Méthode permettant de supprimer un produit.
     * @param $id int L'identifiant du produit à supprimer
     * @return void
     */
    public function delete($nom, $variete)
    {
        $produit = $this->getUnique($nom, $variete);
        foreach ($produit->getListeMaturite() as $m) {
            $requete = $this->dao->prepare('DELETE FROM maturite WHERE idMaturite = :id ');
            $requete->execute(array(
                'id' => $m->getIdMaturite()
            ));
        }
        foreach ($produit->getListeEtat() as $e) {
            $requete = $this->dao->prepare('DELETE FROM etat WHERE idEtat = :id ');
            $requete->execute(array(
                'id' => $e->getIdEtat()
            ));
        }
        $requete = $this->dao->prepare('DELETE FROM produit WHERE varieteProduit = :id AND nomProduit = :nom');
        $requete->execute(array(
            'nom' => $nom,
            'id' => $variete
        ));
    }

    /**
     * Méthode retournant la page du produit
     * @param $id int L'identifiant du produit à récupérer
     * @return Produit Le produit demandée
     */
    public function getUnique($nom, $variete)
    {
        $requete = $this->dao->prepare('SELECT * FROM produit WHERE nomProduit = :nom AND varieteProduit = :variete ORDER BY niveauMaturite, niveauEtat ');
        $requete->bindValue(':nom', $nom);
        $requete->bindValue(':variete', $variete);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');
        $listeMaturite = array();
        $listeEtat = array();

        $liste = $requete->fetchAll();
        foreach ($liste as $p) {
            if (!empty($p->getIdMaturite())) {
                $requeteMaturite = $this->dao->prepare('SELECT * FROM maturite WHERE idMaturite = :maturite');
                $requeteMaturite->execute(array('maturite' => $p->getIdMaturite()));
                $requeteMaturite->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Maturite');
                $maturite = $requeteMaturite->fetch();
                $maturite->setNiveau($p->getNiveauMaturite());
                array_push($listeMaturite, $maturite);
            }
            if (!empty($p->getIdPresentation())) {
                $requetePresentation = $this->dao->prepare('SELECT * FROM presentation WHERE idPresentation = :presentation');
                $requetePresentation->execute(array(
                    'presentation' => $p->getIdPresentation()
                ));
                $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Presentation');
                $presentation = $requetePresentation->fetch();
                $produit = $p;
            }
            if (!empty($p->getIdEtat())) {
                $requeteEtat = $this->dao->prepare('SELECT * FROM etat WHERE idEtat = :etat');
                $requeteEtat->execute(array('etat' => $p->getIdEtat()));
                $requeteEtat->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Etat');
                $etat = $requeteEtat->fetch();
                $etat->setNiveau($p->getNiveauEtat());
                array_push($listeEtat, $etat);
            }
        }


        $produit->setListeMaturite($listeMaturite);
        $produit->setListeEtat($listeEtat);

        return $produit;
    }

    public function getUniqueId($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM produit WHERE idProduit = :id');
        $requete->execute(array(
            'id' => $id
        ));
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');
        if ($produit = $requete->fetch()) {
            return $produit;
        }

        return null;
    }

    public function deleteUnique($id)
    {
        $requete = $this->dao->prepare('DELETE FROM produit WHERE idProduit = :id');
        $requete->execute(array(
            'id' => $id
        ));
    }

    public function alreadyIn(Produit $produit)
    {
        $requette = $this->dao->prepare('SELECT * FROM produit WHERE nomProduit = :nom AND varieteProduit = :variete');
        $requette->execute(array(
            'nom' => $produit->getNomProduit(),
            'variete' => $produit->getVarieteProduit()
        ));

        if ($requette->fetch()) {
            return true;
        }

        return false;
    }

    public function MaturiteAlreadyIn(Produit $produit)
    {
        $requette = $this->dao->prepare('SELECT * FROM produit WHERE nomProduit = :nom AND varieteProduit = :variete AND niveauMaturite = :niveau');
        $requette->execute(array(
            'nom' => $produit->getNomProduit(),
            'variete' => $produit->getVarieteProduit(),
            'niveau' => $produit->getNiveauMaturite()
        ));

        if ($requette->fetch()) {
            return true;
        }

        return false;
    }

    public function EtatAlreadyIn(Produit $produit)
    {
        $requette = $this->dao->prepare('SELECT * FROM produit WHERE nomProduit = :nom AND varieteProduit = :variete AND niveauEtat = :niveau');
        $requette->execute(array(
            'nom' => $produit->getNomProduit(),
            'variete' => $produit->getVarieteProduit(),
            'niveau' => $produit->getNiveauEtat()
        ));

        if ($requette->fetch()) {
            return true;
        }

        return false;
    }

    public function GetAll()
    {
        $requete = $this->dao->query('SELECT * FROM produit');
        if ($produit = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $produit;
        }

        return null;
    }

    protected function add(Produit $produit, Presentation $presentation, Photo $photo)
    {
        $requete = $this->dao->prepare('INSERT INTO presentation SET idProduit = :id,contenu = :contenu, idPhoto = :idPhoto');
        $requete->execute(array(
            'id' => 0,
            'contenu' => $presentation->getContenu(),
            'idPhoto' => 1
        ));

        $idPresentation = $this->dao->lastInsertId();

        $requete = $this->dao->prepare('INSERT INTO produit SET nomProduit = :nom, varieteProduit = :variete, idPresentation = :idPresentation');
        $requete->execute(array(
            'nom' => $produit->getNomProduit(),
            'variete' => $produit->getVarieteProduit(),
            'idPresentation' => $idPresentation
        ));

        $requete = $this->dao->prepare('UPDATE presentation SET idProduit = :id WHERE idPresentation = :idPresentation');
        $requete->execute(array(
            'id' => $this->dao->lastInsertId(),
            'idPresentation' => $idPresentation
        ));

    }

    /**
     * Méthode permettant de modifier un produit.
     * @param $produit Produit le produit à modifier
     * @return void
     */
    protected function modify(Produit $produit, Presentation $presentation, Photo $photo)
    {
        $requete = $this->dao->prepare('UPDATE produit SET nomProduit = :nom, varieteProduit = :variete WHERE varieteProduit = :modif');

        $requete->execute(array(
            'nom' => $produit->getNomProduit(),
            'variete' => $produit->getVarieteProduit(),
            'modif' => $produit->getModif()
        ));

        $requete = $this->dao->prepare('UPDATE presentation SET contenu = :contenu, idPhoto = :idPhoto WHERE idPresentation = :idPresentation');
        $requete->execute(array(
            'contenu' => $presentation->getContenu(),
            'idPhoto' => 1,
            'idPresentation' => $presentation->getIdPresentation()
        ));

    }
}