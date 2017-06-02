<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 01/06/2017
 * Time: 17:43
 */

namespace App\Backend\Modules\Maturite;


use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Maturite;
use Entity\Photo;
use Entity\Produit;

class MaturiteController extends BackController
{
    protected $nomProduit;
    protected $varieteProduit;

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
        $this->page->addVar('title', 'Ajout d\'une fiche de maturité');
        $this->page->addVar('variete', $request->getData('variete'));
        $this->page->addVar('nom', $request->getData('produit'));

        $this->page->addVar('sousTitre', $request->getData('produit') . " " . $request->getData('variete') . ' : Ajout d\'une fiche de maturité');
    }

    /**
     * Form
     *
     * @param HTTPRequest $request
     */

    public function processForm(HTTPRequest $request)
    {
        if ($request->postExists('id')) {
            $maturite = new Maturite([
                'idMaturite' => intval($request->postData('id')),
                'idProduit' => intval($request->postData('idProduit')),
                'contenu' => $request->postData('contenu'),
                'textePopup' => $request->postData('popup'),
                'idPhoto' => 1,
                'maturiteIdeale' => ($request->postData('ideale')) ? 1 : 0
            ]);

            $produit = $this->managers->getManagerOf('Produit')->getUniqueId($maturite->getIdProduit());
            $produit->setNiveauMaturite(intval($request->postData('niveauM'), 10));

            $photo = new Photo([
                'photo' => ''
            ]);
        } else {
            echo "ajout";
            $maturite = new Maturite([
                'contenu' => $request->postData('contenu'),
                'textePopup' => $request->postData('popup'),
                'idPhoto' => 1,
                'maturiteIdeale' => ($request->postData('ideale')) ? 1 : 0
            ]);

            $produit = new Produit([
                'nomProduit' => $request->postData('nomProduit'),
                'varieteProduit' => $request->postData('variete'),
                'niveauMaturite' => intval($request->postData('niveauM'), 10),
                'maturiteIdeale' => ($request->postData('ideale')) ? 1 : 0
            ]);

            $photo = new Photo([
                'photo' => ''
            ]);

        }

        if ($maturite->isValid()) {
            $this->managers->getManagerOf('Maturite')->save($maturite, $produit, $photo);

            $this->app->getUser()->setFlash($maturite->isNew() ? 'La fiche a bien été ajoutée !' : 'La fiche a bien été modifiée !');
        } else {
            $this->page->addVar('erreurs', $maturite->erreurs());
        }

        $this->app->httpResponse()->redirect('produit-update-' . $produit->getVarieteProduit() . ".html");

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
        $maturite = $this->managers->getManagerOf('Maturite')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($maturite->getIdProduit());

        echo $produit->getNomProduit() . " " . $produit->getVarieteProduit();

        $this->page->addVar('title', 'Mise à jour d\'une fiche de maturité');
        $this->page->addVar('maturite', $maturite);
        $this->page->addVar('produit', $produit);


        $this->page->addVar('sousTitre', $request->getData('produit') . " " . $request->getData('variete') . ' : Ajout d\'une fiche de maturité');
    }

    /**
     * Delete
     *
     * @param HTTPRequest $request
     */

    public function executeDelete(HTTPRequest $request)
    {
        $maturite = $this->managers->getManagerOf('Maturite')->getUnique($request->getData('id'));
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($maturite->getIdProduit());

        $this->managers->getManagerOf('Maturite')->delete($request->getData('id'));
        $this->managers->getManagerOf('Produit')->deleteUnique($produit->getIdProduit());
        $this->app->getUser()->setFlash('La fiche a bien été supprimée !');

        $this->app->httpResponse()->redirect('produit-update-' . $produit->getVarieteProduit() . ".html");
    }
}