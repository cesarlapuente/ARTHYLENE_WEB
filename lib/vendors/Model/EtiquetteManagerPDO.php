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
        // TODO: Implement getUnique() method.
    }

    /**
     * Méthode permettant de supprimer une etiquette.
     * @param $id int L'identifiant de l'etiquette à supprimer
     * @return void
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
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
        // TODO: Implement modify() method.
    }
}