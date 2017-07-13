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

    public function equals(Photo $photo)
    {
        return $photo->getName() == $this->getName() && $photo->getType() == $this->getType()
            && $photo->getSize() == $this->getSize();
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
        return empty($this->getPhoto());
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