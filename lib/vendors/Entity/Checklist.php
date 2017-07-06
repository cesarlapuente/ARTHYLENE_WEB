<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 05/07/2017
 * Time: 16:47
 */

namespace Entity;


use ArthyleneFramework\Entity;


class Checklist extends Entity
{

    const TITLE_EMPTY = 0;
    const TITLE_INVALIDE = 1;
    const CONTENT_INVALIDE = 2;

    protected $id;
    protected $titre;
    protected $contenu;
    protected $isImportant;
    protected $idPhoto;

    public function isNew()
    {
        return empty($this->getId());
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function isValid()
    {
        return empty($this->erreurs());
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        if (empty($titre)) {
            $this->erreurs[] = self::TITLE_EMPTY;
        }
        if (!is_string($titre)) {
            $this->erreurs[] = self::TITLE_INVALIDE;
        }
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        if (!empty($contenu) && !is_string($contenu)) {
            $this->erreurs[] = self::CONTENT_INVALIDE;
        }
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getIsImportant()
    {
        return $this->isImportant;
    }

    /**
     * @param mixed $isImportant
     */
    public function setIsImportant($isImportant)
    {
        $this->isImportant = $isImportant;
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

}