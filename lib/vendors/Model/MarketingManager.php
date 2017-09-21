<?php

namespace Model;


use ArthyleneFramework\Manager;
use Entity\Marketing;

abstract class MarketingManager extends Manager
{
    /**
     * Méthode retournant une fiche marketing précise.
     * @param $id int L'identifiant du marketing à récupérer
     * @return marketing La fiche marketing demandée
     */
    abstract public function getUnique($id);

    abstract public function GetAll();

    abstract public function deleteUnique($id);

    public function save(Marketing $marketing)
    {
        $this->add($marketing);
    }
    abstract protected function add(Marketing $marketing);
}