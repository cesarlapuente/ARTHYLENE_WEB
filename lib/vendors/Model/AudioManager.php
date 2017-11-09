<?php

namespace Model;

use ArthyleneFramework\Manager;
use Entity\Audio;

abstract class AudioManager extends Manager
{
    /**
     * Méthode retournant un audio précis.
     * @param $id int L'identifiant de l'audio à récupérer
     * @return Audio l'audio etat demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant d'enregistrer un audio.
     * @param
     * @return void
     */
    public function save(Audio $audio)
    {
        if ($audio->isValid()) {
            $audio->isNew() ? $this->add($audio) : $this->modify($audio);
        } else {
            throw new \RuntimeException('L audio doit être validé pour être enregistrée');
        }
    }

    /**
     * Méthode permettant d'ajouter un audio.
     * @return void
     */
    abstract protected function add(Audio $audio);

    /**
     * Méthode permettant de modifier un audio.
     * @param $audio Audio l'audio à modifier
     * @return void
     */
    abstract protected function modify(Audio $audio);

    /**
     * Méthode permettant de supprimer une audio.
     * @param $id int L'identifiant de l'audio à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Methode for api
     * @return mixed
     */
    abstract public function GetAll();
}