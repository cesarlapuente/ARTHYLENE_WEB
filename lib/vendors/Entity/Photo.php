<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 01/06/2017
 * Time: 16:13
 */

namespace Entity;


use ArthyleneFramework\Entity;

class Photo extends Entity
{

    const EXTENSIONS = array('jpg', 'jpeg', 'png');
    const INVALIDE = 0;
    const SIZE = 1;
    const FORMAT = 2;
    const PICTURE_EMPTY = 3;

    protected $idPhoto;
    protected $photo;
    protected $chemin;

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
    public function getIdPhoto()
    {
        return $this->idPhoto;
    }

    /**
     * @param mixed $idPhoto
     */
    public function setIdPhoto($idPhoto)
    {
        $this->idPhoto = $idPhoto;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setErreur($erreur)
    {
        $this->erreur[] = $erreur;
    }

}