<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 19/06/2017
 * Time: 10:42
 */

namespace Model;


use Entity\Etiquette;
use Entity\Photo;

class EtiquetteManagerPDO extends EtiquetteManager
{

    /**
     * Méthode retournant une etiquette précise.
     * @param $id int L'identifiant de l'etiquette à récupérer
     * @return Etiquette L'etiquette demandée
     */
    public function getUnique($id)
    {

        $requete = $this->dao->prepare('SELECT * FROM etiquette WHERE idEtiquette = :id');
        $requete->execute(array(
            'id' => $id
        ));
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Etiquette');
        return $requete->fetch();
    }

    /**
     * Méthode permettant de supprimer une etiquette.
     * @param $id int L'identifiant de l'etiquette à supprimer
     * @return void
     */
    public function delete($id)
    {
        $requete = $this->dao->prepare('DELETE FROM etiquette WHERE idEtiquette = :id ');
        $requete->execute(array(
            'id' => $id
        ));
    }

    /**
     * Méthode retournant une liste d'etiquette demandée.
     * @return array La liste des etiquettes. Chaque entrée est une instance de Etiquette.
     */
    public function getList()
    {
        $sql = 'SELECT * FROM etiquette';

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\etiquette');

        $listeEtiquette = $requete->fetchAll();

        $requete->closeCursor();

        return $listeEtiquette;
    }

    /**
     * Méthode renvoyant le nombre d'etiquettes total.
     * @return int
     */
    public function count()
    {
        return $this->dao->query('SELECT COUNT(idEtiquette) FROM etiquette')->fetchColumn();
    }

    public function alreadyIn(Etiquette $etiquette)
    {
        $requette = $this->dao->prepare('SELECT * FROM etiquette WHERE code = :code ');
        $requette->execute(array(
            'code' => $etiquette->getCode()
        ));

        if ($requette->fetch()) {
            return true;
        }

        return false;
    }

    /**
     * Méthode permettant d'ajouter une etiquette.
     * @return void
     */
    protected function add(Etiquette $etiquette, Photo $photo)
    {
        echo $etiquette->getCode() . " " . $etiquette->getNomProduit() . " " . $etiquette->getVarieteProduit() . " " . $etiquette->getOrdreEte() . " " . $etiquette->getOrdreAutomne()
            . " " . $etiquette->getOrdreHiver() . " " . $etiquette->getOrdrePrintemps() . " " . $etiquette->getNombreDeCouche() . " " . $etiquette->getMaturiteMin()
            . " " . $etiquette->getMaturiteMax() . " " . $etiquette->getEmplacementChariot();

        $requete = $this->dao->prepare('INSERT INTO etiquette SET code = :code, nomProduit = :nom,
        varieteProduit = :variete, ordreEte = :ete, ordreAutomne = :automne, ordreHiver = :hiver, ordrePrintemps = :printemps,
        nombreDeCouche = :couche, maturiteMin = :matmin, maturiteMax = :matmax, emplacementChariot = :chariot');
        $requete->execute(array(
            'code' => $etiquette->getCode(),
            'nom' => $etiquette->getNomProduit(),
            'variete' => $etiquette->getVarieteProduit(),
            'ete' => $etiquette->getOrdreEte(),
            'automne' => $etiquette->getOrdreAutomne(),
            'hiver' => $etiquette->getOrdreHiver(),
            'printemps' => $etiquette->getOrdrePrintemps(),
            'couche' => $etiquette->getNombreDeCouche(),
            'matmin' => $etiquette->getMaturiteMin(),
            'matmax' => $etiquette->getMaturiteMax(),
            'chariot' => $etiquette->getEmplacementChariot()
        ));
    }

    /**
     * Méthode permettant de modifier une etiquette.
     * @param $etiquette Etiquette l'etiquette à modifier
     * @return void
     */
    protected function modify(Etiquette $etiquette, Photo $photo)
    {
        $requete = $this->dao->prepare('UPDATE etiquette SET code = :code, nomProduit = :nom,
        varieteProduit = :variete, ordreEte = :ete, ordreAutomne = :automne, ordreHiver = :hiver, ordrePrintemps = :printemps,
        nombreDeCouche = :couche, maturiteMin = :matmin, maturiteMax = :matmax, emplacementChariot = :chariot WHERE 
        idEtiquette = :id');
        $requete->execute(array(
            'code' => $etiquette->getCode(),
            'nom' => $etiquette->getNomProduit(),
            'variete' => $etiquette->getVarieteProduit(),
            'ete' => $etiquette->getOrdreEte(),
            'automne' => $etiquette->getOrdreAutomne(),
            'hiver' => $etiquette->getOrdreHiver(),
            'printemps' => $etiquette->getOrdrePrintemps(),
            'couche' => $etiquette->getNombreDeCouche(),
            'matmin' => $etiquette->getMaturiteMin(),
            'matmax' => $etiquette->getMaturiteMax(),
            'chariot' => $etiquette->getEmplacementChariot(),
            'id' => $etiquette->getIdEtiquette()
        ));
    }
}