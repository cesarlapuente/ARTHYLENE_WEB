<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 31/05/2017
 * Time: 14:19
 */

namespace App\Backend\Modules\Produit;


use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Photo;
use Entity\Presentation;
use Entity\Produit;

class ProduitController extends BackController
{

    public function executeShow(HTTPRequest $request)
    {
        $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('nom'), $request->getData('variete'));

        if (empty($produit)) {
            $this->app->httpResponse()->redirect404();
        }

        $this->page->addVar('title', $produit->getNomProduit());
        $this->page->addVar('produit', $produit);
    }

    public function executeIndex(HTTPRequest $request)

    {
        $this->page->addVar('title', 'Gestion des Produit');

        $manager = $this->managers->getManagerOf('Produit');

        $this->page->addVar('listeProduit', $manager->getList());
        $this->page->addVar('nombreProduit', $manager->count());
    }

    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('nom')) {
            $this->processForm($request);
        }

        $this->page->addVar('title', 'Ajout d\'un produit');
    }

    public function processForm(HTTPRequest $request)
    {
        $produit = new Produit([
            'nomProduit' => preg_replace('#[ ]+#', '_', $request->postData('nom')),
            'varieteProduit' => preg_replace('#[ ]+#', '_', $request->postData('variete'))
        ]);
        $presentation = new Presentation([
            'contenu' => $request->postData('presentation'),
            'idPhoto' => ''
        ]);
        $photo = new Photo([
            'photo' => ''
        ]);
        // L'identifiant de la news est transmis si on veut la modifier.
        if ($request->postExists('modif')) {
            $produit->setModif($request->postData('modif'));
            $produit->setIdProduit(1);
        }

        $alreadyIn = $this->managers->getManagerOf('Produit')->alreadyIn($produit);

        if ($produit->isValid() && !$alreadyIn) {
            $this->managers->getManagerOf('Produit')->save($produit, $presentation, $photo);

            $this->app->getUser()->setFlash($produit->isNew() ? 'Le produit a bien été ajouté !' : 'Le produit a bien été modifié !');
            $this->app->httpResponse()->redirect('.');
        } else {
            $this->page->addVar('erreurs', $produit->erreurs());
        }

        $this->page->addVar('produit', $produit);


    }

    public function executeDelete(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Produit')->delete($request->getData('nom'), $request->getData('variete'));
        $this->app->getUser()->setFlash('La produit a bien été supprimée !');

        $this->app->httpResponse()->redirect('.');
    }

    public function executeUpdate(HTTPRequest $request)
    {
        if ($request->postExists('nom')) {
            $this->processForm($request);
        } else {
            $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('nom'), $request->getData('variete'));
            $produit->setIdProduit(1);
            $presentation = $this->managers->getManagerOf('Presentation')->getUnique($produit->getIdPresentation());
            $this->page->addVar('produit', $produit);
            $this->page->addVar('presentation', $presentation);
        }

        $this->page->addVar('title', 'Modification d\'un produit');
    }
}