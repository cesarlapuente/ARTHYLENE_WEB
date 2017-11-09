<?php


namespace Entity;


use ArthyleneFramework\Entity;

class Audio extends Entity
{

    const EXTENSIONS = array('mp3', 'wav');
    const INVALIDE = 0;
    const SIZE = 1;
    const FORMAT = 2;
    const AUDIO_EMPTY = 3;

    protected $idAudio;
    protected $audio;
    protected $chemin;
    protected $name;
    protected $type;
    protected $size;

    /**
     * @return mixed
     */
    public function getChemin()
    {
        return $this->chemin;
    }

    /**
     * @param mixed $chemin
     */
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    }

    public function isValid()
    {
        return (empty($this->erreurs));
    }

    /**
     * @return mixed
     */
    public function getIdAudio()
    {
        return $this->idAudio;
    }

    /**
     * @param mixed $idAudio
     */
    public function setIdAudio($idAudio)
    {
        $this->idAudio = $idAudio;
    }

    public function equals(Audio $audio)
    {
        return $audio->getName() == $this->getName() && $audio->getType() == $this->getType()
            && $audio->getSize() == $this->getSize();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    public function isEmpty()
    {
        return empty($this->getAudio());
    }

    /**
     * @return mixed
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * @param mixed $audio
     */
    public function setAudio($audio)
    {
        $this->audio = $audio;
    }

    public function setErreur($erreur)
    {
        $this->erreur[] = $erreur;
    }

}