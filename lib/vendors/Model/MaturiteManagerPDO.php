<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 18:03
 */

namespace Model;


use Entity\Maturite;

class MaturiteManagerPDO extends MaturiteManager
{

    /**
     * Méthode retournant une fiche Maturite précise.
     * @param $id int L'identifiant de la news à récupérer
     * @return Maturite La fiche maturite demandée
     */
    public function getUnique($id)
    {
        // TODO: Implement getUnique() method.
    }
}