<?php

namespace Model;


use ArthyleneFramework\Manager;
use Entity\Caracteristique;

abstract class CaracteristiqueManager extends Manager
{
    /**
     * Méthode retournant une fiche caracteristique précise.
     * @param $id int L'identifiant de la presentation à récupérer
     * @return Caracteristique La fiche maturite demandée
     */
    abstract public function getUnique($id);

    abstract public function GetAll();

    abstract public function deleteUnique($id);

    public function save(Caracteristique $caracteristique)
    {
        $this->add($caracteristique);
    }
    abstract protected function add(Caracteristique $caracteristique);
}