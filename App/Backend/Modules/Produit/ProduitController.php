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
use Entity\Produit;

class ProduitController extends BackController
{
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
            'nomProduit' => $request->postData('nom'),
            'varieteProduit' => $request->postData('variete')
        ]);
        // L'identifiant de la news est transmis si on veut la modifier.
        if ($request->postExists('modif')) {
            $produit->setModif($request->postData('modif'));
        }

        if ($produit->isValid()) {
            $this->managers->getManagerOf('Produit')->save($produit);

            $this->app->getUser()->setFlash($produit->isNew() ? 'Le produit a bien été ajouté !' : 'Le produit a bien été modifié !');
        } else {
            $this->page->addVar('erreurs', $produit->erreurs());
        }

        $this->page->addVar('produit', $produit);
    }

    public function executeUpdate(HTTPRequest $request)
    {
        if ($request->postExists('nom')) {
            $this->processForm($request);
        } else {
            $this->page->addVar('produit', $this->managers->getManagerOf('Produit')->getUnique($request->getData('id')));
        }

        $this->page->addVar('title', 'Modification d\'un produit');
    }
}