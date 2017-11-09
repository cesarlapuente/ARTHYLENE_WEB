<?php

namespace Model;


use Entity\Audio;
use PDO;

class AudioManagerPDO extends AudioManager
{

    /**
     * M�thode retournant un audio pr�cis.
     * @param $id int L'identifiant de l'audio � r�cup�rer
     * @return Audio L'audio etat demand�e
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
     * M�thode permettant de supprimer une audio.
     * @param $id int L'identifiant de l'audio � supprimer
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
     * M�thode permettant d'ajouter un audio.
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
     * M�thode permettant de modifier un audio;
     * @param $audio Audio l'audio � modifier
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