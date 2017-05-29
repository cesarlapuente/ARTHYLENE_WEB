<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 27/05/2017
 * Time: 00:34
 */

namespace Entity;

use ArthyleneFramework\Entity;

class Produit extends Entity
{
    protected $idProduit;
    protected $nomProduit;
    protected $varieteProduit;
    protected $niveauMaturite;
    protected $idMaturite;
    protected $niveauEtat;
    protected $idEtat;
    protected $idPresentation;

    /*public function __construct($nom, $variete, $niveauMaturite, $idMaturite, $niveauEtat, $idEtat, $idPresentation)
    {
        $this->setNomProduit($nom);
        $this->setVarieteProduit($variete);
        $this->setNiveauMaturite($niveauMaturite);
        $this->setIdMaturite($idMaturite);
        $this->setNiveauEtat($niveauEtat);
        $this->setIdEtat($idEtat);
        $this->setIdPresentation($idPresentation);
    }*/

    /*public function __construct(array $donnees)

    {

        foreach ($donnees as $key => $value)

        {

            // On récupère le nom du setter correspondant à l'attribut.

            $method = 'set'.ucfirst($key);



            // Si le setter correspondant existe.

            if (method_exists($this, $method))

            {

                // On appelle le setter.

                $this->$method($value);

            }

        }

    }*/

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param mixed $idProduit
     */
    public function setIdProduit($idProduit)
    {
        if (!is_int($idProduit)) {
            trigger_error('l\'id doit être un nombre entier', E_USER_WARNING);
            return;
        }
        $this->idProduit = $idProduit;
    }

    /**
     * @return mixed
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * @param mixed $nomProduit
     */
    public function setNomProduit($nomProduit)
    {
        if (!is_string($nomProduit)) {
            trigger_error('du texte est requis uniquement', E_USER_WARNING);
        }
        $this->nomProduit = $nomProduit;
    }

    /**
     * @return mixed
     */
    public function getVarieteProduit()
    {
        return $this->varieteProduit;
    }

    /**
     * @param mixed $varieteProduit
     */
    public function setVarieteProduit($varieteProduit)
    {
        if (!is_string($varieteProduit)) {
            trigger_error('du texte est requis uniquement', E_USER_WARNING);
        }
        $this->varieteProduit = $varieteProduit;
    }

    /**
     * @return mixed
     */
    public function getNiveauMaturite()
    {
        return $this->niveauMaturite;
    }

    /**
     * @param mixed $niveauMaturite
     */
    public function setNiveauMaturite($niveauMaturite)
    {
        if (!is_int($niveauMaturite) && !is_null($niveauMaturite)) {
            trigger_error('l\'id doit être un nombre entier', E_USER_WARNING);
            return;
        }
        if (($niveauMaturite < -1 || $niveauMaturite > 7) && !is_null($niveauMaturite)) {
            trigger_error('le niveau doit être compris entre -1 et 7', E_USER_WARNING);
        }
        $this->niveauMaturite = $niveauMaturite;
    }

    /**
     * @return mixed
     */
    public function getIdMaturite()
    {
        return $this->idMaturite;
    }

    /**
     * @param mixed $idMaturite
     */
    public function setIdMaturite($idMaturite)
    {
        if (!is_int($idMaturite) && !is_null($idMaturite)) {
            trigger_error('l\'id doit être un nombre entier', E_USER_WARNING);
            return;
        }
        $this->idMaturite = $idMaturite;
    }

    /**
     * @return mixed
     */
    public function getNiveauEtat()
    {
        return $this->niveauEtat;
    }

    /**
     * @param mixed $niveauEtat
     */
    public function setNiveauEtat($niveauEtat)
    {
        if (!is_int($niveauEtat) && !is_null($niveauEtat)) {
            trigger_error('l\'id doit être un nombre entier', E_USER_WARNING);
            return;
        }
        if (($niveauEtat < -1 || $niveauEtat > 7) && !is_null($niveauEtat)) {
            trigger_error('le niveau doit être compris entre -1 et 7', E_USER_WARNING);
        }
        $this->niveauEtat = $niveauEtat;
    }

    /**
     * @return mixed
     */
    public function getIdEtat()
    {
        return $this->idEtat;
    }

    /**
     * @param mixed $idEtat
     */
    public function setIdEtat($idEtat)
    {
        if (!is_int($idEtat && !is_null($idEtat))) {
            trigger_error('l\'id doit être un nombre entier', E_USER_WARNING);
            return;
        }
        $this->idEtat = $idEtat;
    }

    /**
     * @return mixed
     */
    public function getIdPresentation()
    {
        return $this->idPresentation;
    }

    /**
     * @param mixed $idPresentation
     */
    public function setIdPresentation($idPresentation)
    {
        if (!is_int($idPresentation) && !is_null($idPresentation)) {
            trigger_error('l\'id doit être un nombre entier', E_USER_WARNING);
            return;
        }
        $this->idPresentation = $idPresentation;
    }


}