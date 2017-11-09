<?php

namespace Model;


use Entity\Audio;
use PDO;

class AudioManagerPDO extends AudioManager
{

    /**
     * Méthode retournant un audio précis.
     * @param $id int L'identifiant de l'audio à récupérer
     * @return Audio L'audio etat demandée
     */
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM audio WHERE idAudio = :id');
        $requete->execute(array(
            'id' => $id
        ));
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Audio');
        return $requete->fetch();
    }

    /**
     * Méthode permettant de supprimer une audio.
     * @param $id int L'identifiant de l'audio à supprimer
     * @return void
     */
    public function delete($id)
    {
        $requete = $this->dao->prepare('DELETE FROM audio WHERE idAudio = :id ');
        $requete->execute(array(
            'id' => $id
        ));
    }

    /**
     * Methode for api
     * @return mixed
     */
    public function getAll()
    {
        $requete = $this->dao->query('SELECT * FROM audio');
        if ($items = $requete->fetchAll(PDO::FETCH_ASSOC)) {
            return $items;
        }

        return null;
    }

    /**
     * Méthode permettant d'ajouter un audio.
     * @return void
     */
    protected function add(Audio $audio)
    {
        $requete = $this->dao->prepare('INSERT INTO audio SET audio = :audio');
        $requete->execute(array(
            'audio' => urldecode($audio->getAudio())
        ));
    }

    /**
     * Méthode permettant de modifier un audio;
     * @param $audio Audio l'audio à modifier
     * @return void
     */
    protected function modify(Audio $audio)
    {
        $requete = $this->dao->prepare('UPDATE audio SET audio = :audio WHERE idAudio ==:id');
        $requete->execute(array(
            'audio' => urldecode($audio->getAudio()),
            'id' => $audio->getIdAudio()
        ));
    }
}