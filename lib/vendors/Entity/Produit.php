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
    const MATURITE_MIN = 0;
    const MATURITE_MAX = 7;

    const NOM_PRODUIT_INVALIDE = 1;
    const NOM_PRODUIT_EMPTY = 2;
    const VARIETE_PRODUT_INVALIDE = 3;
    const VARIETE_PRODUIT_EMPTY = 4;
    const MATURITE_INVALIDE = 5;
    const MATURITE_EMPTY = 6;

    protected $idProduit;
    protected $nomProduit;
    protected $varieteProduit;
    protected $niveauMaturite;
    protected $idMaturite;
    protected $niveauEtat;
    protected $idEtat;
    protected $idPresentation;
    protected $listeMaturite;
    protected $maturiteIdeale;
    protected $listeEtat;
    protected $presentation;
    protected $modif;

    public function isNew()
    {
        return empty($this->getIdProduit());
    }

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
    public function getVarieteProduit()
    {
        return $this->varieteProduit;
    }

    /**
     * @param mixed $varieteProduit
     */
    public function setVarieteProduit($varieteProduit)
    {
        if (empty($varieteProduit)) {
            $this->erreurs[] = self::VARIETE_PRODUIT_EMPTY;
        }
        if (!is_string($varieteProduit)) {
            $this->erreurs[] = self::VARIETE_PRODUT_INVALIDE;
        }
        $this->varieteProduit = $varieteProduit;
    }

    public function isValid()
    {
        return (!(empty($this->nomProduit) || empty($this->varieteProduit)) && empty($this->erreurs()));
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
        if (empty($nomProduit)) {
            $this->erreurs[] = self::NOM_PRODUIT_EMPTY;
        }
        if (!is_string($nomProduit)) {
            $this->erreurs[] = self::NOM_PRODUIT_INVALIDE;
        }
        $this->nomProduit = $nomProduit;
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
        if (empty($niveauMaturite)) {
            $this->erreurs[] = self::MATURITE_EMPTY;
        }
        if (($niveauMaturite < self::MATURITE_MIN || $niveauMaturite > self::MATURITE_MAX) && !is_null($niveauMaturite)) {
            $this->erreurs[] = self::MATURITE_INVALIDE;
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

    /**
     * @return mixed
     */
    public function getListeMaturite()
    {
        return $this->listeMaturite;
    }

    /**
     * @param mixed $listeMaturite
     */
    public function setListeMaturite($listeMaturite)
    {
        $this->listeMaturite = $listeMaturite;
    }

    /**
     * @return mixed
     */
    public function getMaturiteIdeale()
    {
        return $this->maturiteIdeale;
    }

    /**
     * @param mixed $maturiteIdeale
     */
    public function setMaturiteIdeale($maturiteIdeale)
    {
        $this->maturiteIdeale = $maturiteIdeale;
    }

    /**
     * @return mixed
     */
    public function getListeEtat()
    {
        return $this->listeEtat;
    }

    /**
     * @param mixed $listeEtat
     */
    public function setListeEtat($listeEtat)
    {
        $this->listeEtat = $listeEtat;
    }

    /**
     * @return mixed
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * @param mixed $presentation
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;
    }

    /**
     * @return mixed
     */
    public function getModif()
    {
        return $this->modif;
    }

    /**
     * @param mixed $modif
     */
    public function setModif($modif)
    {
        $this->modif = $modif;
    }

}