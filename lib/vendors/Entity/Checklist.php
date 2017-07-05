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
    protected $title;
    protected $content;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        if (empty($title)) {
            $this->erreurs[] = self::TITLE_EMPTY;
        }
        if (!is_string($title)) {
            $this->erreurs[] = self::TITLE_INVALIDE;
        }
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        if (!empty($content) && !is_string($content)) {
            $this->erreurs[] = self::CONTENT_INVALIDE;
        }
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getisImportant()
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