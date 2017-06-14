<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 01/06/2017
 * Time: 16:52
 */

namespace Model;


use ArthyleneFramework\Manager;
use Entity\Presentation;

abstract class PresentationManager extends Manager
{
    /**
     * Méthode retournant une fiche Presentation précise.
     * @param $id int L'identifiant de la presentation à récupérer
     * @return Presentation La fiche maturite demandée
     */
    abstract public function getUnique($id);
}