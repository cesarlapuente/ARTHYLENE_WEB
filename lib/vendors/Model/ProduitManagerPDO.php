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
use Entity\BeneficeSante;
use Entity\Caracteristique;
use Entity\Conseil;
use Entity\Marketing;

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
            'nom' => urldecode($nom),
            'id' => urldecode($variete)
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
        $requete->bindValue(':nom', urldecode($nom));
        $requete->bindValue(':variete', urldecode($variete));
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Produit');
        $listeMaturite = array();
        $listeEtat = array();

        $listeBeneficeSante = array();
        $listeCaracteristique = array();
        $listeConseil = array();
        $listeMarketing = array();

        $liste = $requete->fetchAll();
        foreach ($liste as $p) {
            if (!empty($p->getIdMaturite())) 
            {
                $requeteMaturite = $this->dao->prepare('SELECT * FROM maturite WHERE idMaturite = :maturite');
                $requeteMaturite->execute(array('maturite' => urldecode($p->getIdMaturite())));
                $requeteMaturite->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Maturite');
                $maturite = $requeteMaturite->fetch();
                $maturite->setNiveau($p->getNiveauMaturite());
                array_push($listeMaturite, $maturite);
            }
            if (!empty($p->getIdPresentation())) 
            {
                $requetePresentation = $this->dao->prepare('SELECT * FROM presentation WHERE idPresentation = :presentation');
                $requetePresentation->execute(array(
                    'presentation' => $p->getIdPresentation()
                ));
                $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Presentation');
                $presentation = $requetePresentation->fetch();
                $produit = $p;
            }
            if (!empty($p->getIdEtat())) 
            {
                $requeteEtat = $this->dao->prepare('SELECT * FROM etat WHERE idEtat = :etat');
                $requeteEtat->execute(array('etat' => $p->getIdEtat()));
                $requeteEtat->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Etat');
                $etat = $requeteEtat->fetch();
                $etat->setNiveau($p->getNiveauEtat());
                array_push($listeEtat, $etat);
            }

            //update
            if (!empty($p->getIdBeneficeSante()))
            {
                $requeteBeneficeSate = $this->dao->prepare('SELECT * FROM beneficeSante WHERE idBeneficeSante = :idBeneficeSante');
                $requeteBeneficeSate->execute(array('idBeneficeSante' => $p->getIdBeneficeSante()));
                $requeteBeneficeSate->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\BeneficeSante');
                $beneficeSante = $requeteBeneficeSate->fetch();
                $beneficeSante->setIdBeneficeSante($p->getIdBeneficeSante());
                array_push($listeBeneficeSante, $beneficeSante);
            }
            if (!empty($p->getIdCaracteristique()))
            {
                $requeteCaracteristique = $this->dao->prepare('SELECT * FROM caracteristique WHERE idCaracteristique = :idCaracteristique');
                $requeteCaracteristique->execute(array('idCaracteristique' => $p->getIdCaracteristique()));
                $requeteCaracteristique->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Caracteristique');
                $caracteristique = $requeteCaracteristique->fetch();
                $caracteristique->setIdCaracteristique($p->getIdCaracteristique());
                array_push($listeCaracteristique, $caracteristique);
            }
            if (!empty($p->getIdConseil()))
            {
                $requeteConseil = $this->dao->prepare('SELECT * FROM conseil WHERE idConseil = :idConseil');
                $requeteConseil->execute(array('idConseil' => $p->getIdConseil()));
                $requeteConseil->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Conseil');
                $conseil = $requeteConseil->fetch();
                $conseil->setIdConseil($p->getIdConseil());
                array_push($listeConseil, $conseil);
            }
            if (!empty($p->getIdMarketing()))
            {
                $requeteMarketing = $this->dao->prepare('SELECT * FROM marketing WHERE idMarketing = :idMarketing');
                $requeteMarketing->execute(array('idMarketing' => $p->getIdMarketing()));
                $requeteMarketing->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Marketing');
                $marketing = $requeteMarketing->fetch();
                $marketing->setIdMarketing($p->getIdMarketing());
                array_push($listeMarketing, $marketing);
            }
        }

        $produit->setListeMaturite($listeMaturite);
        $produit->setListeEtat($listeEtat);

        $produit->setListeBeneficeSante($listeBeneficeSante);
        $produit->setListeCaracteristique($listeCaracteristique);
        $produit->setListeConseil($listeConseil);
        $produit->setListeMarketing($listeMarketing);

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
            'nom' => urldecode($produit->getNomProduit()),
            'variete' => urldecode($produit->getVarieteProduit())
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
            'nom' => urldecode($produit->getNomProduit()),
            'variete' => urldecode($produit->getVarieteProduit()),
            'niveau' => urldecode($produit->getNiveauMaturite())
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
            'nom' => urldecode($produit->getNomProduit()),
            'variete' => urldecode($produit->getVarieteProduit()),
            'niveau' => urldecode($produit->getNiveauEtat())
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

    protected function add(Produit $produit, Presentation $presentation, Photo $photo, BeneficeSante $BeneficeSante, Caracteristique $caracteristique, Conseil $conseil, Marketing $marketing)
    {
        $requete = $this->dao->prepare('INSERT INTO presentation SET idProduit = :id,contenu = :contenu, idPhoto = :idPhoto');
        $requete->execute(array(
            'id' => 0,
            'contenu' => urldecode($presentation->getContenu()),
            'idPhoto' => 1
        ));

        $idPresentation = $this->dao->lastInsertId();

        $requete = $this->dao->prepare('INSERT INTO produit SET nomProduit = :nom, varieteProduit = :variete, idPresentation = :idPresentation');
        $requete->execute(array(
            'nom' => urldecode($produit->getNomProduit()),
            'variete' => urldecode($produit->getVarieteProduit()),
            'idPresentation' => $idPresentation
        ));

        $requete = $this->dao->prepare('UPDATE presentation SET idProduit = :id WHERE idPresentation = :idPresentation');
        $requete->execute(array(
            'id' => $this->dao->lastInsertId(),
            'idPresentation' => $idPresentation
        ));

        $requete = $this->dao->prepare('INSERT INTO beneficesante SET idBeneficeSante = :idBeneficeSante, benefice1 = :benefice1, benefice2 = :benefice2, benefice3 = :benefice3, benefice4 = :benefice4, benefice5 = :benefice5, benefice6 = :benefice6');
        $requete->execute(array(
            'idBeneficeSante' => $BeneficeSante->getIdBeneficeSante(),
            'benefice1' => urldecode($BeneficeSante->getBenefice1()),
            'benefice2' => urldecode($BeneficeSante->getBenefice2()),
            'benefice3' => urldecode($BeneficeSante->getBenefice3()),
            'benefice4' => urldecode($BeneficeSante->getBenefice4()),
            'benefice5' => urldecode($BeneficeSante->getBenefice5()),
            'benefice6' => urldecode($BeneficeSante->getBenefice6())
        ));

        $requete = $this->dao->prepare('INSERT INTO caracteristique SET idCaracteristique = :idCaracteristique, idProduit = :idProduit, famille = :famille, espece = :espece, origine = :origine, forme = :forme, taillePoids = :taillePoids, couleurTexture = :couleurTexture, saveur = :saveur, principauxProducteurs = :principauxProducteurs');
        $requete->execute(array(
            'idProduit' => $caracteristique->getIdProduit(),
            'famille' => urldecode($caracteristique->getFamille()),
            'espece' => urldecode($caracteristique->getEspece()),
            'origine' => urldecode($caracteristique->getOrigine()),
            'forme' => urldecode($caracteristique->getForme()),
            'taillePoids' => urldecode($caracteristique->getTaillePoids()),
            'couleurTexture' => urldecode($caracteristique->getCouleurTexture()),
            'saveur' => urldecode($caracteristique->getSaveur()),
            'principauxProducteurs' => urldecode($caracteristique->getPrincipauxProducteurs())
        ));

        $requete = $this->dao->prepare('INSERT INTO conseil SET idConseil = :idConseil, conseil1 = :conseil1, conseil2 = :conseil2, conseil3 = :conseil3, conseil4 = :conseil4 conseil5 = :conseil5, conseil6 = :conseil6');
        $requete->execute(array(
            'idConseil' => $conseil->getIdConseil(),
            'conseil1' => urldecode($conseil->getConseil1()),
            'conseil2' => urldecode($conseil->getConseil2()),
            'conseil3' => urldecode($conseil->getConseil3()),
            'conseil4' => urldecode($conseil->getConseil4()),
            'conseil5' => urldecode($conseil->getConseil5()),
            'conseil6' => urldecode($conseil->getConseil6())
        ));

        $requete = $this->dao->prepare('INSERT INTO marketing SET idMarketing = :idMarketing, marketing1 = :marketing1, marketing2 = :marketing2');
        $requete->execute(array(
            'idMarketing' => $marketing->getIdMarketing(),
            'marketing1' => urldecode($marketing->getMarketing1()),
            'marketing2' => urldecode($marketing->getMarketing2())
        ));
    }

    /**
     * Méthode permettant de modifier un produit.
     * @param $produit Produit le produit à modifier
     * @return void
     */
    protected function modify(Produit $produit, Presentation $presentation, Photo $photo, BeneficeSante $beneficeSante, Caracteristique $caracteristique, Conseil $conseil, Marketing $marketing)
    {
        $requete = $this->dao->prepare('UPDATE produit SET nomProduit = :nom, varieteProduit = :variete WHERE varieteProduit = :modif');
        $requete->execute(array(
            'nom' => urldecode($produit->getNomProduit()),
            'variete' => urldecode($produit->getVarieteProduit()),
            'modif' => urldecode($produit->getModif())
        ));

        $requete = $this->dao->prepare('UPDATE presentation SET contenu = :contenu, idPhoto = :idPhoto WHERE idPresentation = :idPresentation');
        $requete->execute(array(
            'contenu' => urldecode($presentation->getContenu()),
            'idPhoto' => 1,
            'idPresentation' => $presentation->getIdPresentation()
        ));

        $requete = $this->dao->prepare('UPDATE produit SET idBeneficeSante = :idBeneficeSante, idCaracteristique = :idCaracteristique, idConseil = :idConseil, idMarketing = :idMarketing  WHERE nomProduit = :nom AND varieteProduit = :variete');
        $requete->execute(array(
            'nom' => urldecode($produit->getNomProduit()),
            'variete' => urldecode($produit->getVarieteProduit()),
            'idBeneficeSante' => $beneficeSante->getIdBeneficeSante(),
            'idCaracteristique' => $caracteristique->getIdCaracteristique(),
            'idConseil' => $conseil->getIdConseil(),
            'idMarketing' => $marketing->getIdMarketing()
        ));


        $requete = $this->dao->prepare('UPDATE beneficesante SET benefice1 = :benefice1, benefice2 = :benefice2, benefice3 = :benefice3, benefice4 = :benefice4, benefice5 = :benefice5, benefice6 = :benefice6 WHERE idBeneficeSante = :idBeneficeSante');
        $requete->execute(array(
            'idBeneficeSante' => $beneficeSante->getIdBeneficeSante(),
            'benefice1' => urldecode($beneficeSante->getBenefice1()),
            'benefice2' => urldecode($beneficeSante->getBenefice2()),
            'benefice3' => urldecode($beneficeSante->getBenefice3()),
            'benefice4' => urldecode($beneficeSante->getBenefice4()),
            'benefice5' => urldecode($beneficeSante->getBenefice5()),
            'benefice6' => urldecode($beneficeSante->getBenefice6())
        ));


        $requete = $this->dao->prepare('UPDATE caracteristique SET famille = :famille, espece = :espece, origine = :origine, forme = :forme, taillePoids = :taillePoids, couleurTexture = :couleurTexture, saveur = :saveur, principauxProducteurs = :principauxProducteurs WHERE idCaracteristique = :idCaracteristique');
        $requete->execute(array(
            'idCaracteristique' => $caracteristique->getIdCaracteristique(),
            'famille' => urldecode($caracteristique->getFamille()),
            'espece' => urldecode($caracteristique->getEspece()),
            'origine' => urldecode($caracteristique->getOrigine()),
            'forme' => urldecode($caracteristique->getForme()),
            'taillePoids' => urldecode($caracteristique->getTaillePoids()),
            'couleurTexture' => urldecode($caracteristique->getCouleurTexture()),
            'saveur' => urldecode($caracteristique->getSaveur()),
            'principauxProducteurs' => urldecode($caracteristique->getPrincipauxProducteurs())
        ));

        $requete = $this->dao->prepare('UPDATE conseil SET conseil1 = :conseil1, conseil2 = :conseil2, conseil3 = :conseil3, conseil4 = :conseil4, conseil5 = :conseil5, conseil6 = :conseil6 WHERE idConseil = :idConseil');
        $requete->execute(array(
            'idConseil' => $conseil->getIdConseil(),
            'conseil1' => urldecode($conseil->getConseil1()),
            'conseil2' => urldecode($conseil->getConseil2()),
            'conseil3' => urldecode($conseil->getConseil3()),
            'conseil4' => urldecode($conseil->getConseil4()),
            'conseil5' => urldecode($conseil->getConseil5()),
            'conseil6' => urldecode($conseil->getConseil6())
        ));

        $requete = $this->dao->prepare('UPDATE marketing SET marketing1 = :marketing1, marketing2 = :marketing2 WHERE idMarketing = :idMarketing');
        $requete->execute(array(
            'idMarketing' => $marketing->getIdMarketing(),
            'marketing1' => urldecode($marketing->getMarketing1()),
            'marketing2' => urldecode($marketing->getMarketing2())
        ));
    }
}