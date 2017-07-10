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

    protected $idPhoto;
    protected $photo;

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