<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 19/06/2017
 * Time: 09:57
 */

namespace App\Backend\Modules\Etiquette;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Etiquette;
use Entity\Photo;

class EtiquetteController extends BackController
{

    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Gestion des etiquettes');

        $manager = $this->managers->getManagerOf('Etiquette');

        $this->page->addVar('listeEtiquette', $manager->getList());
        $this->page->addVar('nombreEtiquette', $manager->count());
    }

    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('nom')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout d\'une etiquette');
        $this->page->addVar('insert', 1);
    }

    public function processForm(HTTPRequest $request)
    {
        $etiquette = new Etiquette([
            'nomProduit' => preg_replace('#[ ]+#', '_', $request->postData('nom')),
            'varieteProduit' => preg_replace('#[ ]+#', '_', $request->postData('variete')),
            'code' => $request->postData('code'),
            'ordreEte' => $request->postData('ete'),
            'ordreAutomne' => $request->postData('automne'),
            'ordreHiver' => $request->postData('hiver'),
            'ordrePrintemps' => $request->postData('printemps'),
            'nombreDeCouche' => $request->postData('couche'),
            'maturiteMin' => $request->postData('matMin'),
            'maturiteMax' => $request->postData('matMax'),
            'emplacementChariot' => $request->postData('chariot')
        ]);
        $photo = new Photo([
            'photo' => ''
        ]);

        if ($request->postExists('id')) {
            $etiquette->setIdEtiquette($request->postData('id'));
        }


        /*if ($request->postExists('modif')
            && $produit->getNomProduit() == $request->postData('modifName')
            && $produit->getVarieteProduit() == $request->postData('modif')
        ) {
            $alreadyIn = false;
        } else {
            $alreadyIn = $this->managers->getManagerOf('Produit')->alreadyIn($produit);
        }

        if ($alreadyIn) {
            $this->app->getUser()->setFlash('Ce produit existe déja !');
            $produit->setNomProduit($request->getData('nom'));
            $produit->setVarieteProduit($request->getData('variete'));
        } else if ($produit->isValid() && !$alreadyIn && $presentation->isValid()) {
            $this->managers->getManagerOf('Produit')->save($produit, $presentation, $photo);

            $this->app->getUser()->setFlash($produit->isNew() ? 'Le produit a bien été ajouté !' : 'Le produit a bien été modifié !');
            $this->app->httpResponse()->redirect('.');
        } else {
            $this->page->addVar('erreurs', $produit->erreurs());
            $this->page->addVar('erreursPresentation', $presentation->erreurs());
        }*/

        if ($etiquette->isValid()) {
            $this->managers->getManagerOf('Etiquette')->save($etiquette, $photo);
            $this->app->getUser()->setFlash($etiquette->isNew() ? 'Le produit a bien été ajouté !' : 'Le produit a bien été modifié !');
            $this->app->httpResponse()->redirect('/admin/label.html');
        }

        $this->page->addVar('etiquette', $etiquette);
    }

    public function executeShow(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Gestion des etiquettes');
        $etiquette = $this->managers->getManagerOf('Etiquette')->getUnique($request->getData('id'));
        $this->page->addVar('etiquette', $etiquette);

    }

    public function executeDelete(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Etiquette')->delete($request->getData('id'));
        $this->app->getUser()->setFlash('L\'étiquette a bien été supprimée !');

        $this->app->httpResponse()->redirect('/admin/label.html');
    }

    public function executeUpdate(HTTPRequest $request)
    {

        $this->page->addVar('title', 'Mise à jour d\'une etiquette');

        if ($request->postExists('nom')) {
            $this->processForm($request);
        }
        $etiquette = $this->managers->getManagerOf('Etiquette')->getUnique($request->getData('id'));
        $this->page->addVar('etiquette', $etiquette);

    }

}