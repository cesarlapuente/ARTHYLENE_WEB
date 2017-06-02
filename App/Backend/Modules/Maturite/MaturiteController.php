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

    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('contenu')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout d\'une fiche de maturité');
        $this->page->addVar('var', $request->getData('variete'));
        $this->page->addVar('nom', $request->getData('produit'));


        $this->page->addVar('sousTitre', $request->getData('produit') . " " . $request->getData('variete') . ' : Ajout d\'une fiche de maturité');
    }

    public function processForm(HTTPRequest $request)
    {
        //echo "process ".$request->postData('variete')." ".$request->postData('nomP')."--";;
        $maturite = new Maturite([
            'idProduit' => intval($request->postData('idP')),
            'contenu' => $request->postData('contenu'),
            'textePopup' => $request->postData('popup'),
            'idPhoto' => 1,
            'maturiteIdeale' => ($request->postData('ideale')) ? 1 : 0
        ]);

        if ($request->postExists('id')) {
            $maturite->setIdMaturite($request->postData('id'));
        }

        $produit = new Produit([
            'idMaturite' => intval($request->postData('id'), 10),
            'nomProduit' => $request->postData('nomP'),
            'varieteProduit' => $request->postData('variete'),
            'niveauMaturite' => intval($request->postData('niveauM'), 10)
        ]);

        echo "----" . $produit->getIdProduit() . "---";
        $photo = new Photo([
            'photo' => ''
        ]);
        // L'identifiant de la news est transmis si on veut la modifier.
        if ($request->postExists('id')) {

        }

        if ($maturite->isValid()) {
            $this->managers->getManagerOf('Maturite')->save($maturite, $produit, $photo, $request->postData('variete'));

            $this->app->getUser()->setFlash($maturite->isNew() ? 'La fiche a bien été ajoutée !' : 'La fiche a bien été modifiée !');
        } else {
            $this->page->addVar('erreurs', $maturite->erreurs());
        }

        $this->page->addVar('produit', $maturite);

        $this->app->httpResponse()->redirect('produit-update-' . $produit->getVarieteProduit() . ".html");
    }

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