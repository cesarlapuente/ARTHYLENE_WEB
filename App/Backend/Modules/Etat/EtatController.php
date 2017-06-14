<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 01/06/2017
 * Time: 17:43
 */

namespace App\Backend\Modules\Etat;


use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Etat;
use Entity\Photo;
use Entity\Produit;

class EtatController extends BackController
{
    protected $nomProduit;
    protected $varieteProduit;


    /**
     * Show
     *
     * @param HTTPRequest $request
     */
    public function executeShow(HTTPRequest $request)
    {
        $etat = $this->managers->getManagerOf('Etat')->getUnique($request->getData('id'));
        if (empty($etat)) {
            $this->app->httpResponse()->redirect404();
        }
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($etat->getIdProduit());

        $this->page->addVar('etat', $etat);
        $this->page->addVar('produit', $produit);
    }

    /**
     * Insert
     *
     * @param HTTPRequest $request
     */
    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('contenu')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout d\'une fiche d\'etat');
        $this->page->addVar('variete', $request->getData('variete'));
        $this->page->addVar('nom', $request->getData('produit'));

        $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('produit'), $request->getData('variete'));
        $this->page->addVar('prod', $produit);

        $this->page->addVar('sousTitre', $request->getData('produit') . " " . $request->getData('variete') . ' : Ajout d\'une fiche d\'etat');
    }

    /**
     * Form
     *
     * @param HTTPRequest $request
     */
    public function processForm(HTTPRequest $request)
    {
        if ($request->postExists('id')) {
            $etat = new Etat([
                'idEtat' => intval($request->postData('id')),
                'idProduit' => intval($request->postData('idProduit')),
                'contenu' => $request->postData('contenu'),
                'textePopup' => $request->postData('popup'),
                'idPhoto' => 1
            ]);

            $produit = $this->managers->getManagerOf('Produit')->getUniqueId($etat->getIdProduit());
            $produit->setNiveauEtat(intval($request->postData('niveauE'), 10));

            $photo = new Photo([
                'photo' => ''
            ]);
        } else {
            $etat = new Etat([
                'contenu' => $request->postData('contenu'),
                'textePopup' => $request->postData('popup'),
                'idPhoto' => 1,
            ]);

            $produit = new Produit([
                'nomProduit' => $request->postData('nomProduit'),
                'varieteProduit' => $request->postData('variete'),
                'niveauEtat' => intval($request->postData('niveauE'), 10),
                'idPresentation' => intval($request->postData('idPresentation'), 10)
            ]);

            $photo = new Photo([
                'photo' => ''
            ]);
        }

        if ($request->postData('ancienNiveau') == $produit->getNiveauMaturite()) {
            $alreadyIn = false;
        } else {
            $alreadyIn = $this->managers->getManagerOf('Produit')->MaturiteAlreadyIn($produit);
        }

        if ($alreadyIn) {
            $this->app->getUser()->setFlash('Cette fiche existe déja !');
        } else if ($etat->isValid() && $produit->isValid()) {
            $this->managers->getManagerOf('Etat')->save($etat, $produit, $photo);
            $this->app->getUser()->setFlash($etat->isNew() ? 'La fiche a bien été ajoutée !' : 'La fiche a bien été modifiée !');
            $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");
        }
        $this->page->addVar('erreursEtat', $etat->erreurs());
        $this->page->addVar('erreurs', $produit->erreurs());
        $this->page->addVar('etat', $etat);
        $this->page->addVar('produit', $produit);
    }

    /**
     * Update
     *
     * @param HTTPRequest $request
     */
    public function executeUpdate(HTTPRequest $request)
    {
        if ($request->postExists('contenu')) {
            $this->processForm($request);
        }
        $etat = $this->managers->getManagerOf('Etat')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($etat->getIdProduit());

        $this->page->addVar('title', 'Mise à jour d\'une fiche de maturité');
        $this->page->addVar('etat', $etat);
        $this->page->addVar('produit', $produit);

        $this->page->addVar('sousTitre', $request->getData('produit') . " " . $request->getData('variete') . ' : Ajout d\'une fiche d\'etat');
    }

    /**
     * Delete
     *
     * @param HTTPRequest $request
     */
    public function executeDelete(HTTPRequest $request)
    {
        $etat = $this->managers->getManagerOf('Etat')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($etat->getIdProduit());

        $this->managers->getManagerOf('Etat')->delete($request->getData('id'));
        $this->managers->getManagerOf('Produit')->deleteUnique($produit->getIdProduit());
        $this->app->getUser()->setFlash('La fiche a bien été supprimée !');

        $this->app->httpResponse()->redirect('produit-update-' . $produit->getNomProduit() . "-" . $produit->getVarieteProduit() . ".html");
    }
}